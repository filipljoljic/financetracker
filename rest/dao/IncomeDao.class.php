<?php
require_once "BaseDao.class.php";

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

    public function getIncomeById($id) {
        return parent::get_by_id($id);
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