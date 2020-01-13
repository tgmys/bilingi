<?php

$config= require_once 'config.php';

try {
   $options = [
    \PDO::ATTR_CASE => \PDO::CASE_LOWER,
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];
      $db= new PDO($config['host'], $config['user'], $config['password'],$options);
      
      return  $db;
      
} catch (Exception $ex) {
    echo $ex;
    exit('Database error');
    
}

?>

