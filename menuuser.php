<?php
include_once 'header.php';
include_once './obsluga_sesji.php';
require_once './database.php';
$id_us=$_SESSION['id_uz'];
$user= $db->query("select imie,nazwisko from uzytkownicy where id_uz='$id_us';");
$user=$user->fetch(PDO::FETCH_ASSOC);
?>
<body>     
 <nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <p class="navbar-brand" ><?php echo $user['imie'],' ',$user['nazwisko']; ?></p>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="changepass_user.php">zmień hasło</a></li>
        <li><a href="logout.php">wyloguj się</a></li>      
    </ul>
      
      <ul class="nav navabar-nav navbar-left">
          <li class="<?php if($page == 'n_abonent'){echo 'active';} ?>"><a href="user_3.php?action=<?php echo $_SESSION['id_tel']; ?>">Raport dzienny</a></li>
          <li class="<?php if($page == 'n_abonent'){echo 'active';} ?>"><a href="user4.php">Raport miesięczny</a></li>
      </ul>
  </div>                                                      
</nav>	
</body>