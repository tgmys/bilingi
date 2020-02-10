<?php

$hash = hash('sha512', 'kowal') ;
echo $hash;

?>
<html lang="pl" class="no-js">
<head>
<!-- meta character set -->
 <meta charset="UTF-8">
    
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <style type="text/css">
    body 
	{
		padding-top: 70px;
		padding-bottom: 70px;
	}
         
        #se {width: 75px;}
        
  </style>
</head>


<body>
<?php include 'menuadmina.php'; ?>

<div class="container">	
 <div class="row"> 
  <div>
	<H2> Panel administratora  - Przypisywanie bilingów do użytkownika </H2>
	<br />
  </div>
 </div>
 

					
	<?php
		require_once './database.php';
		
		error_reporting(E_ALL ^ E_NOTICE);
		$ile_dobrych = 0;
		$ile_zlych = 0;
		$wiersz = 0;
		$komunikat ='';
		if ( ($_POST['nazwa']) && ($_POST['wybor_abonenta']) )
		{
			$ile1 = count($_POST['nazwa']);
			$ile2 = $_POST['wybor_abonenta'];
			$co= $_POST['nazwa'];
		}
		
	  
	// Nowy wiersz w kontenerze
		echo '<div class="row"> <div>';
	
	
  // Akcja przypisywania zaznaczonych rekordów (unikatowych) do tabeli polacz	//Post tabela z unikatowymi numerów abonenta
          if(isset($_POST['nazwa']) && isset($_POST['wybor_abonenta']) )
  foreach ($_POST['nazwa'] as $p)
  {
      echo "$p";
      
      try
			{
				$add = $db -> 	query	("INSERT INTO polacz
										(id_tel, id_bili)
										VALUES 
										('$ile2', '$pom');
										");
			}
	
			catch (Exception $e)
			{
				$komunikat.= 'Błąd dla bilingu:  ' . $pom . ' <br />';
			}	
			
  }
                
//	if ($ile1 > 0 && $ile2 > 0 ) 
//	{	
//		for ($i=1; $i<=$ile1; $i++)
//		{
//			$pom = $_POST['nazwa'][$i-1];
//			
//			try
//			{
//				$add = $db -> 	query	("INSERT INTO polacz
//										(id_tel, id_bili)
//										VALUES 
//										('$ile2', '$pom');
//										");
//			}
//	
//			catch (Exception $e)
//			{
//				$komunikat.= 'Błąd dla bilingu:  ' . $pom . ' <br />';
//			}	
//			
//		}
//	}
	
  // Tworzenie tabeli pomocniczej - "bilingi[]" - z aktualnymi rekordami id_bili
	$a = 0;
	$lista_bili = $db -> query('select id_bili from polacz;');
	foreach($lista_bili as $b)
	  {
		$bilingi[$a] = $b[0];
		$a++;
      }
  // KONIEC tworzenie tabeli pomocniczej - "bilingi[]" - z rekordami id_bili
  
  //Spr bilingu w tabeli nie_przyp i przepisanie pola do polaczenia i kasacja w nie_przyp
	
	$lista_polaczenia = $db -> query('select  id_bili, data, godzina_polaczenia, czas_trwania_polaczenia, kierunek_polaczenia, numer_telefonu from nie_przyp;');
	
	foreach($lista_polaczenia as $p)
	  {
		//if (in_array($p[1], $bilingi)) 
		{
			try
			{
		
//				$add1 = $db -> query	("INSERT INTO polaczenia
//							(id_bili, data, godzina_polaczenia, czas_trwania_polaczenia, kierunek_polaczenia, numer_telefonu)
//							VALUES 
//							('$p[1]', '$p[2]', '$p[3]', '$p[4]', '$p[5]', '$p[6]');
//							");
//				
//				if($add1)
//				{
//					$kasuj = $db -> query ("DELETE FROM nie_przyp WHERE id_p='$p[0]'");
//				}
			
			}
	
			catch (Exception $e)
			{
				//echo 'Wystąpił wyjątek nr '.$e->getCode().', jego komunikat to:'.$e->getMessage();
				$komunikat.= 'Błąd w wierszu:  ' . $wiersz . '::' . $id_bilingu. ' '. $data. ' '.$godzina. ' ' .$czas. ' '. $rozmowa .' ' .$nr_telefonu.' <br />';
			}
		
		}
      }
	
	
	$lista_polaczenia->closeCursor();
	$lista_bili->closeCursor();
	echo '</div></div class="row">';
  	echo '<div class="row"> </div> <div class="col-lg-2">  </div> <div class="col-lg-2">';

  //Zapytanie do tabeli nie_przyp 
	$lista_nieprzyp = $db -> query('select distinct id_bili from nie_przyp;');

  // Formularz z polem select - dane z tabeli nie_przyp
       
	echo '<form class="form-inline" role="form" method="POST" action="testy.php"> 
		<select id= "se" multiple name="nazwa[]" size="15">';
		
		foreach ($lista_nieprzyp as $linia)
			{ 	
                               $wiersz++;
				echo '<option value='.$linia["id_bili"].'>'.$linia["id_bili"]. '</option>' ;
			}
		echo '</select><br/>';
		
		$lista_nieprzyp->closeCursor();
		
  //Koniec pola select wypisującego dane z tabeli nie_przyp
		
		echo '</div> <div class="col-lg-1">  </div> <div class="col-lg-4">';

	//  tworzenie formularza w którym możnas wybrać abonenta
	
		echo'<select  name="wybor_abonenta" size="5">';
		$statement2 = $db -> query('select id_tel, imie, nazwisko, numer_telefonu from uzytkownicy left join nr_tel on nr_tel.id_uz=uzytkownicy.id_uz;');
		
		foreach($statement2 as $w)
		{
			echo '<option value='.$w["id_tel"].'>'.$w["imie"].' '.$w["nazwisko"].' '.$w["numer_telefonu"].'</option>';			
		}
		echo '</select><br/>';
			
		$statement2->closeCursor();
                echo '<br /><br />';
			echo '<input type="submit" name="Przyp" Value="Przypisz"><br /><br /></FORM>';
		echo '</div></div> <div class="row"> <div>';

	//	KONIEC TEGO FORMULARZA  */	
			
	?>		




			</div>
		</div>	
		</div>
</body>
</html>
	
	