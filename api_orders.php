<?php
/**
 * LivrExpress — API pour la gestion des commandes
 * Gère les actions : mise à jour de statut, suppression
 */

header('Content-Type: application/json; charset=utf-8');

// Fichier de données
$dataDir = __DIR__ . '/data';
$submissionFile = $dataDir . '/submissions.json';

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

// Charger les commandes
function loadSubmissions(string $file): array {
    if (!file_exists($file)) return [];
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : [];
}

// Sauvegarder les commandes
function saveSubmissions(string $file, array $data): void {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// ==========================================
// Router
// ==========================================
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {

    // --- Liste des commandes (GET) ---
    case 'list':
        $submissions = loadSubmissions($submissionFile);
        // Trier par date décroissante (plus récentes en premier)
        usort($submissions, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        // Pagination
        $page  = max(1, intval($_GET['page'] ?? 1));
        $limit = max(1, min(50, intval($_GET['limit'] ?? 10)));
        $total = count($submissions);
        $offset = ($page - 1) * $limit;
        $paged = array_slice($submissions, $offset, $limit);

        echo json_encode([
            'success'      => true,
            'data'         => $paged,
            'total'        => $total,
            'page'         => $page,
            'limit'        => $limit,
            'total_pages'  => ceil($total / $limit),
        ]);
        break;

    // --- Mise à jour du statut (POST) ---
    case 'update_status':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
            exit;
        }

        $id     = trim($_POST['id'] ?? '');
        $status = trim($_POST['status'] ?? '');

        $validStatuses = ['nouvelle', 'en_cours', 'livree', 'annulee'];
        if (empty($id) || !in_array($status, $validStatuses)) {
            echo json_encode(['success' => false, 'message' => 'Paramètres invalides.']);
            exit;
        }

        $submissions = loadSubmissions($submissionFile);
        $found = false;
        foreach ($submissions as &$sub) {
            if ($sub['id'] === $id) {
                $sub['status'] = $status;
                $sub['updated_at'] = date('Y-m-d H:i:s');
                $found = true;
                break;
            }
        }
        unset($sub);

        if (!$found) {
            echo json_encode(['success' => false, 'message' => 'Commande introuvable.']);
            exit;
        }

        saveSubmissions($submissionFile, $submissions);
        echo json_encode(['success' => true, 'message' => 'Statut mis à jour.']);
        break;

    // --- Suppression (POST) ---
    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
            exit;
        }

        $id = trim($_POST['id'] ?? '');
        if (empty($id)) {
            echo json_encode(['success' => false, 'message' => 'ID requis.']);
            exit;
        }

        $submissions = loadSubmissions($submissionFile);
        $original = count($submissions);
        $submissions = array_values(array_filter($submissions, fn($s) => $s['id'] !== $id));

        if (count($submissions) === $original) {
            echo json_encode(['success' => false, 'message' => 'Commande introuvable.']);
            exit;
        }

        saveSubmissions($submissionFile, $submissions);
        echo json_encode(['success' => true, 'message' => 'Commande supprimée.']);
        break;

    // --- Statistiques (GET) ---
    case 'stats':
        $submissions = loadSubmissions($submissionFile);
        $stats = [
            'total'    => count($submissions),
            'nouvelle' => 0,
            'en_cours' => 0,
            'livree'   => 0,
            'annulee'  => 0,
        ];
        foreach ($submissions as $sub) {
            $s = $sub['status'] ?? 'nouvelle';
            if (isset($stats[$s])) $stats[$s]++;
        }

        // Commandes aujourd'hui
        $today = date('Y-m-d');
        $stats['today'] = count(array_filter($submissions, function ($s) use ($today) {
            return str_starts_with($s['created_at'] ?? '', $today);
        }));

        echo json_encode(['success' => true, 'data' => $stats]);
        break;

    default:
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Action inconnue.']);
        break;
}
