<?php

require_once('User.php');

$firstName = 'Иван';
$lastName = 'Максимов';

$users = [
    [
        'firstName' => 'Иван',
        'lastName' => 'Максимов',
        'age' => 20
    ],
    [
        'firstName' => 'Саша',
        'lastName' => 'Иванов',
        'age' => 25
    ]
];

/**
 * Возвращает список пользователей, у которых возвраст совападает с $age.
 * @param array $users
 * @param int $age
 * @return array
 */
function findAge($users, $age)
{
    $result = [];

    foreach ($users as $user) {
        if ($user['age'] === $age) {
            $result[] = $user;
        }
    }

    return $result;
}

$users = [
    new User('Иван', 'Максимов', 20),
    new User('Иван', 'Максимов 1', 30)
];