<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Замените на 'https://theai.autos' в продакшене
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Проверяем, что запрос POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed', 'success' => false]);
    exit;
}
 
// Получаем данные из тела запроса
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['email'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid data', 'success' => false]);
    exit;
}

$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid email', 'success' => false]);
    exit;
}

// Определяем тип формы
$isContactForm = isset($data['firstName']) && isset($data['lastName']);
$isLuckyForm = isset($data['bonus']);

// Настройки для отправки письма
$to = 'alex.k@kuki.agency';
$subject = $isContactForm ? 'New Feedback Submission' : 'New Bonus Submission';
$headers = "From: noreply@theai.autos\r\n" .
           "Reply-To: $email\r\n" .
           "Content-Type: text/plain; charset=UTF-8\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Форматируем тело письма
if ($isContactForm) {
    $firstName = htmlspecialchars($data['firstName']);
    $lastName = htmlspecialchars($data['lastName']);
    $message = "New Feedback Submission\n" .
               "====================\n" .
               "First Name: $firstName\n" .
               "Last Name: $lastName\n" .
               "Email: $email\n" .
               "Date: " . date('Y-m-d H:i:s') . "\n" .
               "====================\n";
} elseif ($isLuckyForm) {
    $bonusLabel = htmlspecialchars($data['bonus']['label']);
    $bonusDescription = htmlspecialchars($data['bonus']['description']);
    $message = "New Bonus Submission\n" .
               "====================\n" .
               "Email: $email\n" .
               "Bonus: $bonusLabel\n" .
               "Description: $bonusDescription\n" .
               "Date: " . date('Y-m-d H:i:s') . "\n" .
               "====================\n";
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Unknown form type', 'success' => false]);
    exit;
}

// Отправляем письмо
$mailSent = mail($to, $subject, $message, $headers);

if ($mailSent) {
    http_response_code(200);
    echo json_encode(['message' => 'Submitted successfully', 'success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Failed to send email', 'success' => false, 'error' => error_get_last()]);
}

exit;
?>