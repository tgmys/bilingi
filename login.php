<?php
 session_start();
if (isset($_POST['email']) && isset($_POST['pass'])){
   require_once './database.php'; 
      //sprawdzanie poprawnosci logowania
   $st = $db->prepare("select * from uzytkownicy where email = ? and haslo =?;");
   $st1 = $db->prepare("select * from administrator where email = ? and haslo =?;");
            $em=$_POST['email'];
        $pas= hash('sha512', $_POST['pass']);  
     
        $st->bindParam(1, $em);
        $st->bindParam(2, $pas);
        $st1->bindParam(1, $em);
        $st1->bindParam(2, $pas);
        $st->execute();
        $st1->execute();
        unset($_SESSION['blad']);
        $tmp = $st->fetch(PDO::FETCH_ASSOC);
        $tmp1 = $st1->fetch(PDO::FETCH_ASSOC);
        
        session_regenerate_id();
       $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        if(count($tmp1['id']) > 0){
            $_SESSION['id_uz']=$tmp['id_uz'];
            $_SESSION['zalogowany_adm'] = TRUE;
            header('Location: n_abonent.php');
        }
        if(count($tmp['id_uz']) > 0){
                    
            $_SESSION['id_uz']=$tmp['id_uz'];
           
            $num=$db->query("select id_tel from  nr_tel  where id_uz='$_SESSION[id_uz]';");
             $num = $num->fetch(PDO::FETCH_ASSOC);
             $_SESSION['zalogowany'] = TRUE;
             $_SESSION['id_tel']=$num['id_tel'];
             header('Location: user_3.php?action='.$num['id_tel']);
             
        }else {
            unset($_SESSION['ip']);
            $_SESSION['blad']= '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
    header('Location: index.php');
        exit();
        }
        
} else {
    header('Location: index.php');
    exit();
    
}

?>

