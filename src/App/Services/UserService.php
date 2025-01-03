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
        $this->db->query(
            "INSERT INTO users(username, password, email) VALUES(:login, :password, :email)",
            [
                'login' => $formData['login'],
                'password' => $formData['password'],
                'email' => $formData['email']
            ]
        );
    }
}
