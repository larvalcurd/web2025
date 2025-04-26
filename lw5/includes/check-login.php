<?php

function checkLogin($email, $password)
{
    $usersFile = 'users.json';

    if (!file_exists($usersFile)) {
        return ['success' => false, 'message' => 'The user file was not found'];
    }

    $jsonData = file_get_contents($usersFile);
    $users = json_decode($jsonData, true);

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            if ($user['password'] === $password) {
                return ['success' => true];
            } else {
                return ['success' => false, 'message' => 'Invalid password'];
            }
        }
    }

    return ['success' => false, 'message' => 'The user was not found'];
}
