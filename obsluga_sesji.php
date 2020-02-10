<?php

session_start();

if(isset($_SESSION['ip']) && $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
{
    die('Proba przejecia sesji udaremniona!');
}elseif ($_SESSION['zalogowany'] == FALSE ) {
     header('Location: index.php');
     exit();
}
?>
