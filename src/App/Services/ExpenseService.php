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
            "SELECT name, id FROM expenses_category_assigned_to_users WHERE user_id = :user_id",
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
            "SELECT name, id FROM payment_methods_assigned_to_users WHERE user_id = :user_id",
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

    public function getUserExpenses($firstDayMonth, $lastDayMonth)
    {
        $params = [
            'user_id' => $_SESSION['user'],
            'first_day_month' => $firstDayMonth,
            'last_day_month' => $lastDayMonth
        ];

        $expenses = $this->db->query(
            "SELECT expenses.id, expenses.amount, expenses.date_of_expense, expenses.expense_comment, expenses_category_assigned_to_users.name AS 'category' FROM expenses
            INNER JOIN expenses_category_assigned_to_users ON expenses_category_assigned_to_users.user_id = expenses.user_id
            WHERE expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.id 
            AND expenses.user_id = :user_id 
            AND expenses.date_of_expense BETWEEN :first_day_month AND :last_day_month",
            $params
        )->findAll();

        return $expenses;
    }

    public function getUserExpense(string $id)
    {
        return $this->db->query(
            "SELECT expenses.id, expenses.amount, expenses.date_of_expense, expenses.expense_comment, expenses_category_assigned_to_users.name AS 'category', payment_methods_assigned_to_users.name AS 'payment' FROM expenses
            INNER JOIN expenses_category_assigned_to_users ON expenses_category_assigned_to_users.user_id = expenses.user_id
            INNER JOIN payment_methods_assigned_to_users ON payment_methods_assigned_to_users.user_id = expenses.user_id
            WHERE expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.id 
            AND expenses.payment_method_assigned_to_user_id = payment_methods_assigned_to_users.id
            AND expenses.user_id = :user_id 
            AND expenses.id = :id",
            [
                'user_id' => $_SESSION['user'],
                'id' => $id
            ]
        )->find();
    }

    public function update(array $formData, int $id, array $idCategory, array $idPayment)
    {
        $formattedDate = "{$formData['date']} 00:00:00";

        $this->db->query(
            "UPDATE expenses 
            SET expense_category_assigned_to_user_id = :category_id,
            payment_method_assigned_to_user_id = :payment_id,
            amount = :amount,
            date_of_expense = :date,
            expense_comment = :comment
            WHERE id = :id
            AND user_id = :user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user'],
                'category_id' => $idCategory['id'],
                'payment_id' => $idPayment['id'],
                'amount' => $formData['amount'],
                'date' => $formattedDate,
                'comment' => $formData['comment'],
            ]
        );
    }

    public function delete(int $id)
    {
        $this->db->query(
            "DELETE FROM expenses WHERE id = :id AND user_id = :user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function getExpenseSumByCategory($firstDayMonth, $lastDayMonth)
    {
        $rows = $this->db->query(
            "SELECT expenses_category_assigned_to_users.name, SUM(expenses.amount) AS 'expensesSUM' FROM expenses
            INNER JOIN expenses_category_assigned_to_users ON expenses_category_assigned_to_users.user_id = expenses.user_id
            WHERE expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.id 
            AND expenses.date_of_expense BETWEEN :first_day_month AND :last_day_month
            AND expenses.user_id = :user_id
            GROUP BY expenses.expense_category_assigned_to_user_id
            ORDER BY expensesSUM DESC",
            [
                'user_id' => $_SESSION['user'],
                'first_day_month' => $firstDayMonth,
                'last_day_month' => $lastDayMonth
            ]
        )->findAll();

        return $rows;
    }

    public function getExpensesChartData($firstDayMonth, $lastDayMonth)
    {
        $rows = $this->getExpenseSumByCategory($firstDayMonth, $lastDayMonth);

        $dataPoints = array();

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $dataPoints[] = array("label" => $row['name'], "y" => $row['expensesSUM']);
            }
        } else {
            $dataPoints[] = array("label" => 'Zero expanses', "y" => 100);
        }

        return $dataPoints;
    }

    public function updateCategory(array $formData)
    {
        $this->db->query(
            "UPDATE expenses_category_assigned_to_users SET name = :name 
            WHERE user_id = :user_id AND id = :id",
            [
                'id' => $formData['idCategoryExpenses'],
                'user_id' => $_SESSION['user'],
                'name' => $formData['newCategoryExpenses']
            ]
        );
    }

    public function updatePayment(array $formData)
    {
        $this->db->query(
            "UPDATE payment_methods_assigned_to_users SET name = :name 
            WHERE user_id = :user_id AND id = :id",
            [
                'id' => $formData['idPayment'],
                'user_id' => $_SESSION['user'],
                'name' => $formData['newPaymentMethod']
            ]
        );
    }

    public function addExpenseCategory(array $formData)
    {
        $this->db->query(
            "INSERT INTO expenses_category_assigned_to_users(user_id, name) VALUES(:user_id, :name)",
            [
                'user_id' => $_SESSION['user'],
                'name' => $formData['addExpenseCategory']
            ]
        );
    }

    public function addPayment(array $formData)
    {
        $this->db->query(
            "INSERT INTO payment_methods_assigned_to_users(user_id, name) VALUES(:user_id, :name)",
            [
                'user_id' => $_SESSION['user'],
                'name' => $formData['addPaymentMethod']
            ]
        );
    }

    public function deleteExpenseCategory(array $formData)
    {
        $this->db->query(
            "DELETE FROM expenses_category_assigned_to_users WHERE id = :id AND user_id = :user_id",
            [
                'id' => $formData['deleteExpenseCategory'],
                'user_id' => $_SESSION['user']
            ]
        );
    }
}
