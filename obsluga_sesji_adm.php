<?php

session_start();

if(isset($_SESSION['ip']) && $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
{
    die('Proba przejecia sesji udaremniona!');
}elseif ($_SESSION['zalogowany_adm'] == FALSE ) {
     header('Location: index.php');
     exit();
}
?>

