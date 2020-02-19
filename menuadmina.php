<?php
include_once './obsluga_sesji_adm.php';
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<nav class="navbar navbar-inverse  navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Administrator</a>
        </div>
        <ul class="nav navbar-nav" id="navn">
      <!--      <li><a href="panel_admina.php">Panel_administratora</a></li> -->
            <li class="<?php if($page == 'n_abonent'){echo 'active';} ?>"><a href="n_abonent.php">Nowy abonent</a></li>
            <li class="<?php if($page == 'u_abonent'){echo 'active';} ?>"><a href="u_abonent.php">Usuń abonenta</a></li>
            <li class="<?php if($page == 'n_telefon'){echo 'active';} ?>"><a href="n_telefon.php">Telefon</a></li>
            <li class="<?php if($page == 'w_pliku'){echo 'active';} ?>"><a href="wybor_pliku2.php">Dodanie bilingów</a></li>
            <li class="<?php if($page == 'przyp'){echo 'active';} ?>"><a href="przypis.php">przypis</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li ><a href="logout.php">wyloguj sie</a></li>
        </ul>
    </div>
</nav>	

