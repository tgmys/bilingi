<?php 
session_start();
include_once 'header.php';
require_once './database.php';
$id_us=$_SESSION['id_uz'];
$user= $db->query("select imie,nazwisko from uzytkownicy where id_uz='$id_us';"); 
$num=$db->query("select id_tel, numer_telefonu rt from  nr_tel  where id_uz='$id_us';
");
$bili=$db->query("select kierunek_polaczenia, data, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu tr , nr_tel.numer_telefonu as rt "
        . "from  nr_tel left join polaczenia on nr_tel.id_tel=polaczenia.id_tel  where id_uz='$id_us';
");
//$num=$num->fetch(PDO::FETCH_ASSOC);
$tel_ids=$num->fetch(PDO::FETCH_ASSOC);
$tel_id=$tel_ids['id_tel'];
$user=$user->fetch(PDO::FETCH_ASSOC);
//$bili=$db->query("select ");
//var_dump($num);
$num->execute();
?> 

<body >

<div class="container">

<!-- #MENU USERA -->	

 <nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <p class="navbar-brand" ><?php echo $user['imie'],' ',$user['nazwisko']; ?></p>
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
	
<nav class="row navbar  navbar-light" style="background-color: #FFFAFA;">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
          
            <li class="active">
                <h3> Numery telefonów : </h3>
          <?php 
          $num1=array(); 
          foreach ($num as $row1)
              { 
                  ?>
            <li class="active" >
                <?php
                echo '<a href="user_1.php?action='.$row1['id_tel'].'"><h4>'.$row1['rt'].'</h4></a><br>';
                          
                 // echo $row1['rt'], ' ';
                  
                  $num1=$row1['id_tel']; 
                  ?> 
               </li>
              <?php                var_dump($num1);
              }
              ?>
              
    </ul>
    </div>
</nav>
 <div class="row">
	<h1>
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
                        
				<th>kierunek_polaczenia</th>
				<th>data</th>
				<th>godzina_polaczenia </th>
                                <th>czas_trwania_polaczenia </th>
                                <th>numer telefonu </th>
			</tr>
		  </thead>';
	
	echo '<tbody>';
	
        foreach ($bili as $row2)
	{
		echo '<tr>
				<td>'. $row2['kierunek_polaczenia'] .'</td> 
				<td>'. $row2['data'] .'</td>
				<td>'. $row2['godzina_polaczenia'] .'</td>
                                <td>'. $row2['czas_trwania_polaczenia'] .'</td>
				<td>'. $row2['tr'] .'</td>
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
	
