<?php
/**
 * LivrExpress — Form Processing
 * Handles contact form submissions via AJAX
 */

header('Content-Type: application/json; charset=utf-8');

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Méthode non autorisée.'
    ]);
    exit;
}

// ==========================================
// 1. Retrieve and sanitize form data
// ==========================================
$name    = isset($_POST['name'])    ? trim(htmlspecialchars($_POST['name'],    ENT_QUOTES, 'UTF-8')) : '';
$phone   = isset($_POST['phone'])   ? trim(htmlspecialchars($_POST['phone'],   ENT_QUOTES, 'UTF-8')) : '';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8')) : '';

// ==========================================
// 2. Validation
// ==========================================
$errors = [];

if (empty($name) || mb_strlen($name) < 2) {
    $errors[] = 'Le nom est requis (minimum 2 caractères).';
}

if (empty($phone)) {
    $errors[] = 'Le numéro de téléphone est requis.';
} elseif (!preg_match('/^[\d\s\+\-\(\)]{7,20}$/', $phone)) {
    $errors[] = 'Numéro de téléphone invalide.';
}

if (empty($message) || mb_strlen($message) < 10) {
    $errors[] = 'Le message est requis (minimum 10 caractères).';
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => implode(' ', $errors)
    ]);
    exit;
}

// ==========================================
// 3. Rate limiting (simple, file-based)
// ==========================================
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateLimitFile = __DIR__ . '/data/rate_limit.json';
$rateLimitDir  = __DIR__ . '/data';

if (!is_dir($rateLimitDir)) {
    mkdir($rateLimitDir, 0755, true);
}

$rateData = [];
if (file_exists($rateLimitFile)) {
    $rateData = json_decode(file_get_contents($rateLimitFile), true) ?: [];
}

// Clean old entries (older than 1 hour)
$now = time();
foreach ($rateData as $storedIp => $timestamp) {
    if ($now - $timestamp > 3600) {
        unset($rateData[$storedIp]);
    }
}

// Check if this IP submitted recently (within 60 seconds)
if (isset($rateData[$ip]) && ($now - $rateData[$ip]) < 60) {
    echo json_encode([
        'success' => false,
        'message' => 'Veuillez patienter avant d\'envoyer un autre message.'
    ]);
    exit;
}

// ==========================================
// 4. Store the message
// ==========================================
$submissionFile = __DIR__ . '/data/submissions.json';
$submissions = [];

if (file_exists($submissionFile)) {
    $submissions = json_decode(file_get_contents($submissionFile), true) ?: [];
}

$submissions[] = [
    'id'         => uniqid('cmd_', true),
    'name'       => $name,
    'phone'      => $phone,
    'message'    => $message,
    'status'     => 'nouvelle',
    'ip'         => $ip,
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
    'created_at' => date('Y-m-d H:i:s'),
];

file_put_contents($submissionFile, json_encode($submissions, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Update rate limit
$rateData[$ip] = $now;
file_put_contents($rateLimitFile, json_encode($rateData));

// ==========================================
// 5. Optional: Send email notification
// ==========================================
$to      = 'contact@livrexpress.sn'; // Change to your actual email
$subject = "LivrExpress — Nouveau message de $name";
$body    = "Nouveau message reçu via le site LivrExpress :\n\n"
         . "Nom      : $name\n"
         . "Téléphone: $phone\n"
         . "Message  :\n$message\n\n"
         . "Date     : " . date('d/m/Y H:i') . "\n"
         . "IP       : $ip\n";

$headers = "From: noreply@livrexpress.sn\r\n"
         . "Reply-To: noreply@livrexpress.sn\r\n"
         . "Content-Type: text/plain; charset=UTF-8\r\n";

// Attempt to send (won't fail the response if mail isn't configured)
@mail($to, $subject, $body, $headers);

// ==========================================
// 6. Success response
// ==========================================
echo json_encode([
    'success' => true,
    'message' => 'Merci ! Votre message a bien été envoyé. Nous vous contacterons très bientôt.'
]);
