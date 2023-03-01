<?php
require 'vendor/autoload.php';

Flight::route('/', function(){
    echo 'Hello its me Filip';
});

Flight::start();

?>  