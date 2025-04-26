<?php

require 'check-login.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$result = checkLogin($email, $password);

header('Content-Type: application/json');

if ($result['success']) {
    echo json_encode(['succes' => true, 'message' => 'welcome']);
} else {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => $result['message']]);
}
