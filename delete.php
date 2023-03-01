<?php
ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ("rest/dao/FinanceDao.class.php");

$id = $_REQUEST['id'];

$dao = new FinanceDao();
$dao->delete($id);
echo "deleted $id" ;
?>