<!doctype html>
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
  </style>
</head>


<body>
<?php include 'menuadmina.php'; ?>

<div class="container">	
 <div class="row"> 
  <div>
	<H2> Aktualizacja bilingów z plików tekstowych </H2>
	<br />
  </div>
 </div>
 

					
	<?php
		require_once './database.php';
		$ile_dobrych = 0;
		$ile_zlych = 0;
		$wiersz = 0;
		$komunikat ='';
		
		error_reporting(E_ALL ^ E_NOTICE);
  
	// Nowy wiersz w kontenerze
	echo '<div class="row"> <div>';
		
	// Formularz do wczytywania pliku
	echo '<form role="form" enctype="multipart/form-data" method="post" action="wybor_pliku2.php">
		
	  <div class="form-group">
		<label for="exampleInputFile">Wybierz plik tekstowy </label><br /><br />
		<input type="file" size="32" name="plik_upload" value="">
		<p class="help-block">  </p>
	  </div>
		<br />
	  <button type="submit" class="btn btn-default">Wyślij!</button>	
	  <br />
    </form>';
  // Koniec formularza wczytywania pliku
	
  // Tworzenie tabeli pomocniczej - "bilingi[]" - z rekordami id_bili
	$a = 0;
	$lista_bili = $db -> query('select id_bili from polacz;');               // nie potrzebne
	foreach($lista_bili as $b)
	  {
		$bilingi[$a] = $b[0];
		$a++;
      }
  // KONIEC tworzenie tabeli pomocniczej - "bilingi[]" - z rekordami id_bili	
        
  echo '</div></div class="row">';
  
  
  echo '<div class="row"> <div>';	
	
	
  // Kopiowanie pliku
	if (!$_FILES['plik_upload'])  { echo '<br /> <b>wczytaj plik</b><br />';}
	else 
	{		
		$f = $_FILES['plik_upload'];
		if ($f['type'] == 'text/plain' || $f['type'] == 'application/octet-stream')
		{
			copy($f['tmp_name'], $f['name']);
			//rename($f['name'],"dane.txt");
	    }
		else
		{
			echo 'Niedozwolony plik';
		}
		
		//Jeśli plik został wczytany
		if(isset($f['name']))
		{
			//echo '<form class="form-inline" role="form" method="POST" action="wpis.php"> 
					
			//	<select multiple name="nazwa[]" size="20">';
								
				$dane = file($f['name']);
					foreach ($dane as $linia)
					{
						$wiersz++;
						
						$l = explode("+", $linia);
						
						$rozmowa = substr($l[0],2,4);
						
						$id_bilingu = $l[5];
						
						$data = $l[6];
						
						 
						
						$pom_godzina = explode(":", $l[8]);
							foreach ($pom_godzina as $linia)
							{
							$godzina = $pom_godzina[1].":".$pom_godzina[3];
                                                        //":".$pom_godzina[2].
							}
						
						$pom_czas = explode(":", $l[10]);
							foreach ($pom_czas as $linia)
							{
                                                            
							$czas = $pom_czas[1].":";
                                                        if($pom_czas[3]==" ")
                                                        {
                                                            $czas.="0";
                                                        }else{
                                                            $czas.=$pom_godzina[3];
                                                        }
                                                       
                                                        //":".$pom_godzina[2].
							}
    	
                                                        
		// echo '<option value='.$id_bilingu.'>'.$rozmowa.' ';
		if ($rozmowa == "PRZY") { $nr_telefonu = $l[14]; }
		else { $nr_telefonu = $l[4]; }
			
		//echo $nr_telefonu.' '.$data.' '.$godzina.' '.$czas.' '.$id_bilingu.'</option>';
			

// Sprawdzanie czy id_bilingu jest w bazie polacz i jeśli jest wpis do tabeli polaczenia
if (in_array($id_bilingu, $bilingi)) 
 {
	try
	{
		
		$add1 = $db -> 	query	("INSERT INTO polaczenia
							(id_bili, data, godzina_polaczenia, CZAS_TRWANIA_POLACZENIA, KIERUNEK_POLACZENIA, NUMER_TELEFONU)
							VALUES 
							('$id_bilingu', '$data', '$godzina', '$czas', '$rozmowa', '$nr_telefonu');
							");
		$ile_dobrych++;		
	}
	
	catch (Exception $e)
	{
		//echo 'Wystąpił wyjątek nr '.$e->getCode().', jego komunikat to:'.$e->getMessage();
		$komunikat.= 'Błąd w wierszu:  ' . $wiersz . '::' . $id_bilingu. ' '. $data. ' '.$godzina. ' ' .$czas. ' '. $rozmowa .' ' .$nr_telefonu.' <br />';
	}
		
 }

else 
 {  
	try
	{
		
		$add2 = $db -> 	query	("INSERT INTO nie_przyp
							(id_bili, data, godzina_polaczenia, CZAS_TRWANIA_POLACZENIA, KIERUNEK_POLACZENIA, NUMER_TELEFONU)
							VALUES 
							('$id_bilingu', '$data', '$godzina', '$czas', '$rozmowa', '$nr_telefonu');
							");
		$ile_zlych++;		
	}
	
	catch (Exception $e)
	{
		//echo 'Wystąpił wyjątek nr '.$e->getCode().', jego komunikat to:'.$e->getMessage();
		$komunikat.= 'Błąd w wierszu:  ' . $wiersz . '::' . $id_bilingu. ' '. $data. ' '.$godzina. ' ' .$czas. ' '. $rozmowa .' ' .$nr_telefonu.' <br />';
	}
	
 }							
						
						
						
						//echo '<TD>'.$nr_telefonu.'</TD>';
 					//echo '<TD>'.$data.'</TD>';
						//echo '<TD>'.$godzina.'</TD>';
						//echo '<TD>'.$czas.'</TD>';
						//echo '<TD>'.$id.'</TD>';
						//echo '<TD>'.$id_bilingu.'</TD>';
						//echo '</TR>';
                                                
                        //$db ->query ("insert into polaczenia(id_tel,data,godzina_polaczenia,czas_trwania_polaczenia,kierunek_polaczenia,numer_telefonu) values('$id','$data','$godzina','$czas','$rozmowa','$nr_telefonu');");
					}
			unlink($f['name']);

			}
			//echo '</select>';
			//echo '</div> <div class="col-lg-1">  </div> <div class="col-lg-4">';


/*
//  tworzenie formularza w którym możnas wybrać abonenta
	
	
	echo'<select name="wybor_abonenta" size="5">';
	   $statement2 = $db -> query('select id_tel, imie, nazwisko, numer_telefonu from uzytkownicy left join nr_tel on nr_tel.id_uz=uzytkownicy.id_uz;');
		foreach($statement2 as $w)
		{
			echo '<option value='.$w["id_tel"].'>'.$w["imie"].' '.$w["nazwisko"].' '.$w["numer_telefonu"].'</option>';
                      
					
		}
		echo '</select><br/>';
			
	$statement2->closeCursor();
			
			
		echo '</div></div> <div class="row"> <div>';	
		echo '<input type="submit" name="Przyp" Value="Przypisz"><br /><br /></FORM>';
	//	KONIEC TEGO FORMULARZA  */	
	
	}
	?>		



<?php 

if ($komunikat!='')
{
	echo '</div></div> <div class="row"> <div>';
	echo $komunikat .'<br /><br />';
}

if ($ile_dobrych>0 || $ile_zlych>0)
{
	echo '<hr>';
	echo 'Wpisano do bazy polaczenia: '.$ile_dobrych. ' Do bazy nieprzypisanych przypisano: ' . $ile_zlych; 

	echo '<hr><br /><br />';
}

?>
		
	
			</div>
		</div>	
		</div>
</body>
</html>
	
	