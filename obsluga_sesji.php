<?php

session_start();

if(!isset($_SESSION['zalogowany']))
{
    session_regenerate_id();
    
    $_SESSION['zalogowany'] = FALSE;
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
}

if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
{
    die('Proba przejecia sesji udaremniona!');
}
?>
