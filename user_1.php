<?php 
session_start();
include_once 'header.php';
require_once './database.php';
$id_us=$_SESSION['id_uz'];
$user= $db->query("select imie,nazwisko from uzytkownicy");// where id_uz='$id_us';");
$num=$db->query("select data, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu, nr_tel.numer_telefonu from uzytkownicy inner join nr_tel on nr_tel.id_uz=uzytkownicy.id_uz inner join polaczenia on nr_tel.id_tel=polaczenia.id_tel  where uzytkownicy.id_uz='$id_us';
");
$num=$num->fetch(PDO::FETCH_ASSOC);
//$user=$user->fetch(PDO::FETCH_ASSOC);
//$bili=$db->query("select ");
var_dump($num);
?> 

<body >

<div class="container">

<!-- #MENU USERA -->	

 <nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <p class="navbar-brand" ><?php foreach ($user as $row) {echo $row['imie'];}  ?></p>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">wyloguj się</a></li>
    </ul>
  </div>
</nav>	 

<!-- #KONIEC MENU USERA -->	

	
<!-- #BODY -->	
 <div class="page-header">
    <h1>Panel usera </h1>
 </div>		
	
<nav class="row navbar navbar-light">
    <div class="container">
        <h3> Numery telefonów : </h3>
        <ul class="nav navbar-nav navbar-right">
            <?php foreach ($user as $row) 
                {echo '<li> $row["imie"]</li> '; }?>
    </ul>
        foreach ($user as $row) {echo $row['imie'];}
    </div>
</nav>
 <div class="row">
	<h1>
 </div>	
	
 <div class="row">
	<h1>wiersz 2
 </div>	
	
<div class="row">
	<h1> dane z bazy wiersz 3</h1>
	<?php
	$_POST['imie']="Janek";
	$_POST['nazwisko']="Kowalski";
	$_POST['nr_telefonu']="5423415413";
	
	echo '<table class="table table-striped">
		  <thead>
			<tr>
                        
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Nr telefonu </th>
			</tr>
		  </thead>';
	
	echo '<tbody>';
	
for($i=1; $i<10; $i++)
	{
		echo '<tr>
				<td>'. $_POST['imie'] .'</td> 
				<td>'. $_POST['nazwisko'] .'</td>
				<td>'. $_POST['nr_telefonu'] .'</td>
				
			</tr>';
	}
    echo   '</tbody>
		</table>';
	?>
</div>	
			


</div>

	
	
			
</div>
			
 
</body>
</html>
	
