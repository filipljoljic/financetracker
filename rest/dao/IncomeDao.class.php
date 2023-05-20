<?php
require_once "BaseDao.class.php";

class IncomeDao extends BaseDao {

    public function __construct(){
        parent::__construct("income");
    }

    public function get_all(){
        return parent::get_all();
    }
}
?>