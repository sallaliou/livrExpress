<?php
/**
 * LivrExpress — Seed de données de démonstration
 * Exécutez une seule fois : http://localhost/landingPage/seed_demo.php
 */

$dataDir = __DIR__ . '/data';
$file = $dataDir . '/submissions.json';

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

$demoOrders = [
    [
        'id'         => 'cmd_demo_001',
        'name'       => 'Aminata Diallo',
        'phone'      => '+221 77 123 45 67',
        'message'    => 'Bonjour, je souhaite envoyer un colis de documents importants du Plateau vers Parcelles Assainies U26. Livraison express SVP.',
        'status'     => 'livree',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
        'updated_at' => date('Y-m-d H:i:s', strtotime('-2 days +3 hours')),
    ],
    [
        'id'         => 'cmd_demo_002',
        'name'       => 'Moussa Ndiaye',
        'phone'      => '+221 76 234 56 78',
        'message'    => 'J\'ai besoin d\'un livreur pour récupérer 3 plats chez moi (Almadies) et les livrer à Sacré-Cœur 3. C\'est pour un client VIP.',
        'status'     => 'en_cours',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-5 hours')),
    ],
    [
        'id'         => 'cmd_demo_003',
        'name'       => 'Fatou Sow',
        'phone'      => '+221 78 345 67 89',
        'message'    => 'Abonnement Business : je gère une boutique en ligne de prêt-à-porter. J\'ai environ 20 livraisons par jour sur tout Dakar et banlieue.',
        'status'     => 'nouvelle',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-1 hour')),
    ],
    [
        'id'         => 'cmd_demo_004',
        'name'       => 'Ibrahima Fall',
        'phone'      => '+221 70 456 78 90',
        'message'    => 'Besoin de livrer un gâteau d\'anniversaire de Ouakam vers les Mamelles. Fragile, à manipuler avec soin !',
        'status'     => 'nouvelle',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-30 minutes')),
    ],
    [
        'id'         => 'cmd_demo_005',
        'name'       => 'Aissatou Ba',
        'phone'      => '+221 77 567 89 01',
        'message'    => 'Je voudrais faire livrer des courses du marché Sandaga à mon domicile à Liberté 6. Budget standard.',
        'status'     => 'en_cours',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-3 hours')),
    ],
    [
        'id'         => 'cmd_demo_006',
        'name'       => 'Ousmane Diop',
        'phone'      => '+221 76 678 90 12',
        'message'    => 'Livraison urgente d\'un dossier médical de l\'hôpital Principal vers la clinique de la Madeleine. Très urgent.',
        'status'     => 'livree',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
        'updated_at' => date('Y-m-d H:i:s', strtotime('-1 day +1 hour')),
    ],
    [
        'id'         => 'cmd_demo_007',
        'name'       => 'Mariama Sylla',
        'phone'      => '+221 78 789 01 23',
        'message'    => 'Annulation de ma commande précédente, j\'ai trouvé quelqu\'un pour récupérer le colis. Désolée pour le dérangement.',
        'status'     => 'annulee',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-4 days')),
        'updated_at' => date('Y-m-d H:i:s', strtotime('-4 days +2 hours')),
    ],
    [
        'id'         => 'cmd_demo_008',
        'name'       => 'Cheikh Mbaye',
        'phone'      => '+221 70 890 12 34',
        'message'    => 'Livraison de 5 cartons de marchandise de Colobane vers Thiaroye. Poids total environ 15 kg. Offre Business.',
        'status'     => 'nouvelle',
        'ip'         => '127.0.0.1',
        'user_agent' => 'Mozilla/5.0 (Demo)',
        'created_at' => date('Y-m-d H:i:s', strtotime('-10 minutes')),
    ],
];

// Merge with existing data if any
$existing = [];
if (file_exists($file)) {
    $existing = json_decode(file_get_contents($file), true) ?: [];
}

// Remove old demo entries to avoid duplicates
$existing = array_filter($existing, fn($s) => !str_starts_with($s['id'], 'cmd_demo_'));

// Add demo data
$merged = array_merge(array_values($existing), $demoOrders);

file_put_contents($file, json_encode($merged, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header('Content-Type: text/html; charset=utf-8');
echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Seed OK</title>';
echo '<script src="https://cdn.tailwindcss.com"></script></head>';
echo '<body class="min-h-screen bg-gray-50 flex items-center justify-center font-sans">';
echo '<div class="text-center bg-white rounded-2xl shadow-lg p-10 max-w-md">';
echo '<div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"><span class="text-3xl">✅</span></div>';
echo '<h1 class="text-2xl font-bold text-gray-900 mb-2">Données de démo ajoutées !</h1>';
echo '<p class="text-gray-500 mb-6">' . count($demoOrders) . ' commandes de démonstration ont été créées.</p>';
echo '<a href="admin.php" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-colors">Voir le tableau de bord →</a>';
echo '</div></body></html>';
