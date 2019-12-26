<?php include_once 'header.php'; ?> 

<body >

    <div class="container">
        <?php
        $page = 'u_abonent';
        include_once 'menuadmina.php';
        include_once './database.php';
        
		require_once './database.php';
        $u_abo=$db ->query ("select id_uz, imie, nazwisko from uzytkownicy;");
						
		?>
        <div class="page-header">
            <h1>Panel administratora - usuń abonenta
        </div>		

        <!-- #BODY POCZĄTEK -->	
        <form method="post" action="u_abonent.php">

            <div class="form-group col-md-8">
				<label for="abonent">Abonent</label>
				<select id="abonent" class="form-control">
					<?php
						foreach ($u_abo as $row)
						{
	echo '<option value='. $row['id_uz'].' >'.$row['id_uz'].' '. $row['imie'].' '.$row['nazwisko'].'</option>';
							
						}
					?>
				</select>
			</div>
			
			<div class="form-group col-md-8">
				<button type="submit" class="btn btn-primary">Wyślij</button>
			</div>
			
        </form>
        <br /><br />
        <!-- #KONIEC FORMULARZA -->



        <!-- #PRZETWARZANIE FORMULARZA I WYPISANIE WPROWADZONYCH DANYCH -->	


        <?php
        print_r($_POST);
        if (!empty($_POST['id_uz'])) 
		{

            //require_once './database.php';
            //$db ->query ("insert into uzytkownicy(imie,nazwisko,haslo) values('$id','$data','$godzina','$czas','$rozmowa','$nr_telefonu');");
					
            echo '<table class="table table-bordered">';
            echo '<thead>
			<tr>
				<th>Imię</th>
				<th>Nazwisko</th>
				
			</tr>
		  </thead>';

            echo '<tbody>
			<tr>
				<td>' . $_POST['imie'] . '</td> 
				<td>' . $_POST['nazwisko'] . '</td>
				
				
			</tr>
         </tbody>
		</table>';
            $_POST = []; //czyszczenie tablicy POST by nie powielać tych samych danych
        } else {
            echo '<h3> Usuń abonenta </h3>';
        }
        ?>	
        
        	

    </div>

</body>

