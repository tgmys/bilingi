<?php 
session_start();
include_once 'header.php';
require_once './database.php';
$id_us=$_SESSION['id_uz'];
$user= $db->query("select * from uzytkownicy where id_uz='$id_us';");
$user=$user->fetch(PDO::FETCH_ASSOC);
?> 

<body >

<div class="container">

<!-- #MENU USERA -->	

 <nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><?php echo $user['imie'] ," ", $user['nazwisko'] ;  ?></a>
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
	   
 <div class="row">
	<h1>wiersz 1
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
	
