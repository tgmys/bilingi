<?php
 include_once './database.php';
  $q= $db->query ("delete from nr_tel where id_tel =$_POST[abonenttel];");			
           
            $_POST = [];
  header('Location: n_telefon.php');


