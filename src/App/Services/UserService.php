<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{
    public function __construct(private Database $db) {}

    public function isEmailTaker(string $email)
    {
        $emailCount = $this->db->query(
            "SELECT COUNT(*) FROM users WHERE email = :email",
            [
                'email' => $email
            ]
        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => ['Adres e-mail już istnieje']]);
        }
    }

    public function create(array $formData)
    {
        $password = password_hash($formData['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $this->db->query(
            "INSERT INTO users(username, password, email) VALUES(:login, :password, :email)",
            [
                'login' => $formData['login'],
                'password' => $password,
                'email' => $formData['email']
            ]
        );

        session_regenerate_id();

        $_SESSION['user'] = $this->db->id();
    }

    public function copyDefaultsToUsers()
    {
        $table_users = array("incomes_category_assigned_to_users", "payment_methods_assigned_to_users", "expenses_category_assigned_to_users");
        $table_default = array("incomes_category_default", "payment_methods_default", "expenses_category_default");

        for ($i = 0; $i < count($table_default); $i++) {
            $this->db->query(
                "INSERT INTO {$table_users[$i]} (user_id, name) SELECT :user_id, name FROM {$table_default[$i]}",
                [
                    'user_id' => $_SESSION['user']
                ]
            );
        }
    }

    public function login(array $formData)
    {
        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $formData['email']
        ])->find();

        $passwordMatch = password_verify($formData['password'], $user['password'] ?? '');

        if (!$user || !$passwordMatch) {
            throw new ValidationException(['password' => ['Nieprawidłowe hasło lub adres e-mail']]);
        }

        session_regenerate_id();

        $_SESSION['user'] = $user['id'];
    }

    public function logout()
    {
        // unset($_SESSION['user']);
        session_destroy();

        // session_regenerate_id();
        $params = session_get_cookie_params();
        setcookie(
            'PHPSESSID',
            '',
            time() - 3600,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    public function handleRememberMe(array $formData)
    {
        if (!empty($formData['rememberMe'])) {
            setcookie('email', $formData['email'], time() + 3600 * 24 * 7);
            setcookie('password', $formData['password'], time() + 3600 * 24 * 7);
        } else {
            setcookie('email', $formData['email'], 30);
            setcookie('password', $formData['password'], 30);
        }
    }
}
