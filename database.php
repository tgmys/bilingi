<?php

$config= require_once 'config.php';

try {
    
      $db= new PDO($config['host'], $config['user'], $config['password']);
      echo "string";
      
} catch (Exception $ex) {
    exit('Database error');
    
}
?>

