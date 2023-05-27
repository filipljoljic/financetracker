<?php
require_once "BaseDao.class.php";

class ExpenseCategoryDao extends BaseDao {

    public function __construct(){
        parent::__construct("expense_categories");
    }
}
?>