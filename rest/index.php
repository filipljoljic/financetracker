<?php
ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ("../vendor/autoload.php");
require_once ("dao/FinanceDao.class.php");

Flight::register('financeDao','FinanceDao');

/* METHODS */
Flight::route('GET /finances', function(){
    Flight::json(Flight::financeDao()->get_all());
});

// single finances
Flight::route('GET /finances/@id', function($id){
    Flight::json(Flight::financeDao()->get_by_id($id));
});

//Add finances
Flight::route('POST /finances', function(){
    Flight::json(Flight::financeDao()->add(Flight::request()->data->getData()));
    
});

//Delete finances
Flight::route('DELETE /finances/@id', function($id){
    Flight::financeDao()->delete($id);
    Flight::json(["message"=>"deleted"]);
});

//Update finances
Flight::route('PUT /finances/@id', function($id){
    $data = Flight::request()->data->getData();
    $data['id'] = $id;
    Flight::json(Flight::financeDao()->update($data));
});


Flight::route('/', function(){
    echo 'Hello';
});


Flight::start();

?>  