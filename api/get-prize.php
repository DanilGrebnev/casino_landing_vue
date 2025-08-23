<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

try {
    // Устанавливаем кодировку для корректной работы с UTF-8
    mb_internal_encoding('UTF-8');

    $prizes = require __DIR__ . '/config/prizes.php';

    // Считаем общий вес
    $totalWeight = array_sum(array_column($prizes, 'weight'));

    // Генерируем случайное число от 0 до общего веса
    $random = mt_rand(0, $totalWeight * 100) / 100;

    // Выбираем приз на основе весов
    $currentWeight = 0;
    $selectedPrize = null;

    foreach ($prizes as $prize) {
        $currentWeight += $prize['weight'];
        if ($random <= $currentWeight) {
            $selectedPrize = $prize;
            break;
        }
    }

    // Если вдруг приз не выбран (что маловероятно), берем последний
    if (!$selectedPrize) {
        $selectedPrize = end($prizes);
    }

    // Возвращаем расширенный набор полей, включая description
    $response = [
        'label' => $selectedPrize['label'],
        'value' => $selectedPrize['value'],
        'description' => $selectedPrize['description']
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

} catch (Exception $e) {
    error_log('Prize selection error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'error' => 'Server error'
    ], JSON_UNESCAPED_UNICODE);
}