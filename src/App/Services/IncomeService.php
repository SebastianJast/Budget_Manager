<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class IncomeService
{
    public function __construct(private Database $db) {}
    public function selectCategory()
    {
        $incomesCategories = $this->db->query(
            "SELECT name FROM incomes_category_assigned_to_users WHERE user_id = :user_id",
            [
                'user_id' => $_SESSION['user'],
            ]
        )->findAll();

        return $incomesCategories;
    }

    public function selectIdCategory(array $formData)
    {
        $idCategory = $this->db->query(
            "SELECT id FROM incomes_category_assigned_to_users WHERE name = :category AND user_id = :user_id",
            [
                'category' => $formData['category'],
                'user_id' => $_SESSION['user']
            ]
        )->find();

        return $idCategory;
    }

    public function create(array $formData, array $idCategory)
    {
        $formattedDate = "{$formData['date']} 00:00:00";

        $this->db->query(
            "INSERT INTO incomes VALUES (NULL, :user_id, :category_id, :amount, :date, :comment)",
            [
                'user_id' => $_SESSION['user'],
                'category_id' => $idCategory['id'],
                'amount' => $formData['amount'],
                'date' => $formattedDate,
                'comment' => $formData['comment']
            ]
        );
    }
}
