<?php 
//session_start();

include './menuuser.php';
$num=$db->query("select id_tel, numer_telefonu rt from  nr_tel  where id_uz='$id_us';
");

$bili=$db->query("select kierunek_polaczenia, data, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu tr , nr_tel.numer_telefonu as rt" 
       ." from nr_tel left join polacz on nr_tel.id_tel=polacz.id_tel join "
        . "polaczenia on polacz.id_bili = polaczenia.id_bili where nr_tel.id_uz='$id_us' and nr_tel.id_tel='$_GET[action]' ;
");

$dat=$db->query("select data, count(id_p) ilosc from nr_tel join polacz on nr_tel.id_tel = polacz.id_tel join polaczenia on polacz.id_bili = polaczenia.id_bili "
        . "where id_uz='$id_us' and nr_tel.id_tel='$_GET[action]' group by data;");

$tel=$db->query("select numer_telefonu from nr_tel where id_uz='$id_us' and id_tel='$_GET[action]';");

$dat1=$dat->fetch(PDO::FETCH_ASSOC);
$tel1=$tel->fetch(PDO::FETCH_ASSOC);
$tel_ids=$num->fetch(PDO::FETCH_ASSOC);
$tel_id=$tel_ids['id_tel'];

$dat->execute();
$num->execute();
$i=0;
?> 

<body >

<div class="container">
	
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
                echo '<a href="user_3.php?action='.$row1['id_tel'].'"><h4>'.$row1['rt'].'</h4></a><br>';  //numery telefonu usera
                          
                  $num1=$row1['id_tel']; 
                  ?> 
               </li>
              <?php               
              }
              ?>
              
    </ul>
    </div>
</nav>
 
	
<div class="row">
    <h2> Połączenia dla: <?php echo  $tel1['numer_telefonu']; ?></h2>
      <table class="table table-bordered table-striped">
		<thead>
			<tr>
                <th width="10%">#</th>
				<th width="30%">data</th>
				<th width="30%">liczba połączeń </th>
                <th width="30%">pokaz</th>
			</tr>
		</thead>
	  </table>
	
	
  <p>
	<?php 
        $pom=$dat1['data'];
        foreach ($dat as $row2)
	{   $pom=$row2['data'];
		echo '<table class="table table-bordered table-striped">
		
		
		<tbody>
		  <tr>
            <th scope="row" width="10%">'.$i.'</th>
			<td width="30%">'. $row2['data'] .'</td>
            <td width="30%">Lczba połączneń:'.$row2['ilosc'].'</td>
			<td width="30%"><a class="btn btn-primary" data-toggle="collapse" href="#ukryta-tresc'.$i.'" aria-expanded="false" aria-controls="ukryta-tresc'.$i.'">
		Zobacz/ukryj
		</a></td>
			</tr></tbody>
</table>';
             
                
        echo '
				
		<div class="collapse" id="ukryta-tresc'.$i.'">
		<div class="card card-body"> 
		<table class="table table-bordered table-striped">
		  <thead>
			<tr>
               
				<th>kierunek_polaczenia</th>
				
				<th>godzina_polaczenia </th>
                <th>czas_trwania_polaczenia </th>
                <th>numer telefonu </th>
             
			</tr>
		  </thead>
		
		
		';
		
		foreach ($bili as $row3)
		{
            if($pom==$row3['data'])
			{
            
                echo'<tr><th>'.$row3['kierunek_polaczenia'].'</th><th>'.$row3['godzina_polaczenia'].'</th>
                        <th>'.$row3['czas_trwania_polaczenia'].'</th><th>'.$row3['tr'].'</th></tr>';
			}
			else 
			{    
				break;
   			}
		}
		echo '</table></td></tr>
			  </div>
			  </div>';				
	$i++;
	} 
    
               
                        
	
        ?>
            </p>
   </tbody>
</table>
	
</div>	
			


</div>

	
	
			
</div>
			
 
</body>
</html>
	
