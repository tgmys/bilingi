<?php




//isset($_POST['email']) && isset($_POST['pass'])
if (isset($_POST['email']) && isset($_POST['pass'])){
   require_once './database.php'; 
   // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $st = $db->prepare("select * from uzytkownicy where email = ? and haslo =?;");
            $em=$_POST['email'];
        $pas=$_POST['pass'];           
        $st->bindParam(1, $em);
        $st->bindParam(2, $pas);
        
        $st->execute();
        $tmp = $st->fetch(PDO::FETCH_ASSOC);
      
     
        if(count($tmp['id_uz']) > 0){
           require_once './obsluga_sesji.php';
         
           $_SESSION['co']=$tmp;
            $_SESSION['id_uz']=$tmp['id_uz'];
             header('Location: user.php');
        }else {
    header('Location: index.php');
        exit();}
        
} else {
    header('Location: index.php');
    exit();
    
}

?>

