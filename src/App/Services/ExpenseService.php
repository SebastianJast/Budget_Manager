<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class ExpenseService
{
    public function __construct(private Database $db) {}
    public function selectCategory()
    {
        $expensesCategories = $this->db->query(
            "SELECT name FROM expenses_category_assigned_to_users WHERE user_id = :user_id",
            [
                'user_id' => $_SESSION['user'],
            ]
        )->findAll();

        return $expensesCategories;
    }

    public function selectIdCategory(array $formData)
    {
        $idCategory = $this->db->query(
            "SELECT id FROM expenses_category_assigned_to_users WHERE name = :category AND user_id = :user_id",
            [
                'category' => $formData['category'],
                'user_id' => $_SESSION['user']
            ]
        )->find();

        return $idCategory;
    }

    public function selectPayment()
    {
        $expensesPayments = $this->db->query(
            "SELECT name FROM payment_methods_assigned_to_users WHERE user_id = :user_id",
            [
                'user_id' => $_SESSION['user'],
            ]
        )->findAll();

        return $expensesPayments;
    }

    public function selectIdPayment(array $formData)
    {
        $idPayment = $this->db->query(
            "SELECT id FROM payment_methods_assigned_to_users WHERE name = :payMethod AND user_id = :user_id",
            [
                'payMethod' => $formData['payMethod'],
                'user_id' => $_SESSION['user']
            ]
        )->find();

        return $idPayment;
    }

    public function create(array $formData, array $idCategory, array $idPayment)
    {
        $formattedDate = "{$formData['date']} 00:00:00";

        $this->db->query(
            "INSERT INTO expenses VALUES (NULL, :user_id, :category_id, :payment_id, :amount, :date, :comment)",
            [
                'user_id' => $_SESSION['user'],
                'category_id' => $idCategory['id'],
                'payment_id' => $idPayment['id'],
                'amount' => $formData['amount'],
                'date' => $formattedDate,
                'comment' => $formData['comment']
            ]
        );
    }
}
