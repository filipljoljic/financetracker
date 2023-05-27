<?php
require_once "BaseDao.class.php";
require_once __DIR__."/../Config.class.php";

class IncomeDao extends BaseDao {
    
    public function __construct(){
        parent::__construct("income");
    }

    public function get_income_by_user_id($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE user_id=:user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getIncomeByIDandUserID($user_id, $income_id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " JOIN users ON income.user_id = users.id
                                        WHERE income.id = :income_id
                                        AND users.id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':income_id', $income_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addIncome($income) {
        return parent::add($income);
    }

    public function updateIncome($income, $id) {
        return parent::update($income, $id);
    }

    public function deleteIncome($id) {
        return parent::delete($id);
    }
}
?>
