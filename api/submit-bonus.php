<?php
header('Access-Control-Allow-Origin: *'); // Замените на ваш домен в продакшене
header('Content-Type: application/json; charset=utf8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

try {
    // Подключение к базе данных (обновите для продакшена)
    $db = new PDO(
        'mysql:host=localhost;dbname=CasinoLanding;charset=utf8mb4',
        'root',
        'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Получаем данные из POST запроса
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data || !isset($data['email'])) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Invalid data'
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    // Проверяем существование email
    $checkStmt = $db->prepare("SELECT COUNT(*) FROM bonuses WHERE email = :email");
    $checkStmt->execute([':email' => $data['email']]);
    $exists = $checkStmt->fetchColumn();

    if ($exists > 0) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'duplicate_email'
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    // Добавляем новую запись
    $stmt = $db->prepare("
        INSERT INTO bonuses (name, email, tg_id, bonus_type, bonus_value, bonus_description, created_at)
        VALUES (:name, :email, :tg_id, :bonus_type, :bonus_value, :bonus_description, NOW())
    ");

    $stmt->execute([
        ':name' => $data['name'] ?? '',
        ':email' => $data['email'],
        ':tg_id' => $data['telegram'] ?? '',
        ':bonus_type' => $data['bonus']['value'] ?? '',
        ':bonus_value' => $data['bonus']['label'] ?? '',
        ':bonus_description' => $data['bonus']['description'] ?? ''
    ]);

    echo json_encode([
        'success' => true,
        'message' => 'Данные успешно сохранены'
    ], JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка сервера: ' . $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
?>