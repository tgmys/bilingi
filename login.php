<?php

require_once './database.php';
//require_once './index.html';
/*
    $tmp = $strt->fetch(PDO::FETCH_ASSOC);
    var_dump($tmp);
    $strt->closeCursor();
*/


//$sr= $db ->query("select* from uzytkownicy")  ;
//var_dump($sr);

$em=$_POST['email'];
$pas=$_POST['pass'];

if (isset($_POST['email']) && isset($_POST['pass'])){
   // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $st = $db->prepare("select * from uzytkownicy where email = ? and haslo =?;");
                       
        $st->bindParam(1, $em);
        $st->bindParam(2, $pas);
        
        $st->execute();
        $tmp = $st->fetchAll();
      
        var_dump($tmp);
        
        if(count($tmp) > 0){
            echo "User verified, Access granted.";
        } else {
            echo "Incorrect username or password";
        }
} else {
    header('Location: index.html');
    exit();
    
}

?>

