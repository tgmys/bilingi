<!doctype html>
<html lang="pl" class="no-js">
<head>
	<!-- meta character set -->
	<meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css">
		body {
				padding-top: 70px;
				padding-bottom: 70px;
			 }
	</style>
</head>
<body>
 
<div class="container">	
	<div>
					
	<form>	
	<select>	
		<option> tutaj co  </option>
	</select>
	</form>
				
			
<?php
require_once './database.php';

	error_reporting(E_ALL ^ E_NOTICE);
	echo '<pre>';
	print_r($_POST);
	echo '<HR>';
	print_r($_FILES);
	echo '</pre><HR>';
	echo '<form enctype="multipart/form-data" method="post" action="wybor_pliku.php">
			<input type="file" size="32" name="plik_upload" value="">
			<input type="submit" name="WyĹ›lij"><br />';
                        

                            echo'<select name="nr_telefonu">';
 
			$statement = $db -> query('select id_tel,numer_telefonu from nr_tel');
				foreach($statement as $wiersz)
				{
					echo '<option>'.$wiersz['numer_telefonu']. '</option>';
                                        $tel=$wiersz['numer_telefonu'];
					//echo $wiersz['nr_telefonu'].'<br />';
				}
			echo '</select><br/>';
			
	echo '</form>';
        
        
	
	$statement->closeCursor();
        if($_POST['nr_telefonu'])
        {
            $statement1=$db ->query("select id_tel from nr_tel where numer_telefonu='$_POST[nr_telefonu]' ");
            foreach($statement1 as $wiersz)
				{
				 $id= $wiersz['id_tel'];
					//echo $wiersz['nr_telefonu'].'<br />';
				}
        }
        
		 
		 
		 //kopiowanie pliku
		if (!$_FILES['plik_upload'])
		{ echo '<br /> <b>wczytaj plik</b><br />';}
	
		else 
		{		
		$f = $_FILES['plik_upload'];
		if ($f['type'] == 'text/plain' || $f['type'] == 'application/octet-stream')
		{
			//$patch = str_replace('a.php', '', $_SERVER['SCRIPT_FILENAME']);
			copy($f['tmp_name'], $f['name']);
			//rename($f['name'],"dane.txt");
		}
		else
		{
			echo 'Niedozwolony plik';
		}
		
		
		if(isset($f['name']))
		{
			
			echo $f['name'];
			echo '<table border = 1>';
								
				$dane = file($f['name']);
					foreach ($dane as $linia)
					{
						$l = explode("+", $linia);
						
						$rozmowa = substr($l[0],2,4);
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
                                                        
      
                                                        
						echo '<TR><TD>'.$rozmowa.'</TD>';
						if ($rozmowa == "PRZY") { $nr_telefonu = $l[14]; }
						else { $nr_telefonu = $l[4]; }
						echo '<TD>'.$nr_telefonu.'</TD>';
						echo '<TD>'.$data.'</TD>';
						echo '<TD>'.$godzina.'</TD>';
						echo '<TD>'.$czas.'</TD>';
						echo '<TD>'.$id.'</TD>';
						echo '</TR>';
                                                
                                               $db ->query ("insert into polaczenia(id_tel,data,godzina_polaczenia,czas_trwania_polaczenia,kierunek_polaczenia,numer_telefonu) values('$id','$data','$godzina','$czas','$rozmowa','$nr_telefonu');");
					}
			unlink($f['name']);
		}
		}
?>		
<H2> koniec </H2>
		
	
			</div>
		</div>	

</body>
</html>
	
	