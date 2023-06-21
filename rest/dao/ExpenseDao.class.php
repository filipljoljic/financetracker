<?php

require_once "BaseDao.class.php";

class ExpenseDao extends BaseDao
{
    public function __construct()
    {
        parent::__construct("expenses");
    }

    public function get_expense_by_user_id($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExpenseByIDandUserID($user_id, $expense_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " JOIN users ON expenses.user_id = users.id
                                        WHERE expenses.id = :expense_id
                                        AND users.id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':expense_id', $expense_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addExpense($expense)
    {
        return parent::add($expense);
    }

    public function updateExpense($expense, $id)
    {
        return parent::update($expense, $id);
    }

    public function deleteExpense($id)
    {
        return parent::delete($id);
    }
}
