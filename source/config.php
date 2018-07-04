<?php
require 'environment.php';
$config = array();
if(ENVIRONMENT == 'development'){
    define("BASE_URL", 'http://localhost/php/apostasJa/source/');
    define("SERVER_URL", "/php/apostasJa/source");
    $config['dbname'] = 'apostasja';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
} else{
    define("BASE_URL", '');
    define("SERVER_URL", "");
    $config['dbname'] = '';
    $config['host'] = 'localhost';
    $config['dbuser'] = '';
    $config['dbpass'] = '';
}

global $db;

try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";charset=utf8", $config['dbuser'], $config['dbpass']);
}catch (PDOExeption $e){
    echo "ERRO: ".$e->getMessage();
}