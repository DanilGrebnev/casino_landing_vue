<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

try {
    $prizes = require __DIR__ . '/config/prizes.php';

    // Удаляем информацию о весах для фронтенда
    $formattedPrizes = array_map(function($prize) {
        return [
            'label' => $prize['label'],
            'value' => $prize['value'],
        ];
    }, $prizes);

    echo json_encode($formattedPrizes);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error']);
}