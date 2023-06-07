<?php

require_once "BaseDao.class.php";

class ExpenseDao extends BaseDao
{
    public function __construct()
    {
        parent::__construct("expenses");
    }
}