<?php

$config= require_once 'config.php';

try {
    $options = $d['options'] + [
    \PDO::ATTR_CASE => \PDO::CASE_LOWER
    ];
      $db= new PDO($config['host'], $config['user'], $config['password'],$options);
      
      return  $db;
      
} catch (Exception $ex) {
    echo $ex;
    exit('Database error');
    
}

?>

