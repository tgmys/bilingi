<?php

session_start();
require_once './database.php'; 
if(!isset($_SESSION['zalogowany']))
{
    session_regenerate_id();
    
    $_SESSION['zalogowany'] = FALSE;
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['email']) && isset($_POST['pass'])){
   
 
   $st = $db->prepare("select * from uzytkownicy where email = ? and haslo =?;");
            $em=$_POST['email'];
        $pas=$_POST['pass'];           
        $st->bindParam(1, $em);
        $st->bindParam(2, $pas);
        
        $st->execute();
        $tmp = $st->fetch(PDO::FETCH_ASSOC);
       
     
        if(count($tmp['id_uz']) > 0){
         //  require_once './obsluga_sesji.php';
           unset($_SESSION['blad']);
           $_SESSION['co']=$tmp;
            $_SESSION['id_uz']=$tmp['id_uz'];
            $id_us=$tmp['id_uz'];
            $num=$db->query("select id_tel from  nr_tel  where id_uz='$id_us';
");
             $num = $num->fetch(PDO::FETCH_ASSOC);
             $_SESSION['id_tel']=$num['id_tel'];
             $_SESSION['zalogowany'] = TRUE;
             header('Location: user_3.php?action='.$num['id_tel']);
            // exit();
        }else {
           
            $_SESSION['blad']= '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
    header('Location: index3.php');
        exit();
        }
        
}}
elseif( isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == TRUE)
{
    if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
{
    die('Proba przejecia sesji udaremniona!');
}
else{
  header('Location: user_3.php?action='.$_SESSION['id_tel']); ///user3
exit();
}
}
else {
    header('Location: index3.php');     /////////////////////
    exit();
    
}
