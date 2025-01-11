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

    public function getUserIncomes($firstDayMonth, $lastDayMonth)
    {
        $params = [
            'user_id' => $_SESSION['user'],
            'first_day_month' => $firstDayMonth,
            'last_day_month' => $lastDayMonth
        ];

        $incomes = $this->db->query(
            "SELECT incomes.id, incomes.amount, incomes.date_of_income, incomes.income_comment, incomes_category_assigned_to_users.name AS 'category' FROM incomes
            INNER JOIN incomes_category_assigned_to_users ON incomes_category_assigned_to_users.user_id = incomes.user_id
            WHERE incomes.income_category_assigned_to_user_id = incomes_category_assigned_to_users.id 
            AND incomes.user_id = :user_id 
            AND incomes.date_of_income BETWEEN :first_day_month AND :last_day_month",
            $params
        )->findAll();

        return $incomes;
    }
}
