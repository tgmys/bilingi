


<link rel="stylesheet" href="css/bootstrap.min.css">
<nav class="navbar navbar-inverse  navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav" id="navn">
            <li><a href="panel_admina.php">Panel_administratora</a></li>
            <li class="<?php if($page == 'n_abonent'){echo 'active';} ?>"><a href="n_abonent.php">Nowy abonent</a></li>
            <li class="<?php if($page == 'n_telefon'){echo 'active';} ?>"><a href="n_telefon.php">Nowy telefon</a></li>
            <li class="<?php if($page == 'w_pliku'){echo 'active';} ?>"><a href="wybor_pliku.php">Aktulizacja bilingów</a></li>
        </ul>
    </div>
</nav>	

