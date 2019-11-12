<?php

//$config=require_once 'config.php';
//require_once 'Connectdb.php';
require_once './database.php';
try{
  //  $db= new PDO($config['host'], $config['user'], $config['password']);
    $strt= $db ->query("select imie, nazwisko, haslo from uzytkownicy");
    
    $tmp = $strt->fetch(PDO::FETCH_ASSOC);
    var_dump($tmp);
    $strt->closeCursor();

//echo $strt ->rowCount();
    
   // $takie = $db;
    
} catch (Exception $ex) {
    echo 'sd';
}

//$db=new Connectdb();
//$db= $db ->getConnection();

$sr= $db ->query("select* from uzytkownicy")  ;
var_dump($sr);
/*
$em=$_POST['email'];
$pas=$_POST['pass'];
if($pas=='kowal')
    echo 'ok';
if($em=='jkowal@o2.pl')
    echo 'ok1';


if (isset($_POST['email']) && isset($_POST['pass'])){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
   $st = $db->prepare("select * from uzytkownicy where haslo=?");
        //$st->bindParam(1, $em);
        $st->bindParam(1, $pas);
        
        $st->execute();
        
        if($st->rowCount() > 0){
            echo "User verified, Access granted.";
        } else {
            echo "Incorrect username or password";
        }
} else {
    header('Location: index.html');
    exit();
    
}*/

?>

