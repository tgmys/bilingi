<?php include './header.php'; ?>

<body>
    
    <div class="container">
        

        <?php $page = 'n_telefon'; include_once './menuadmina.php'; 
 include_once './database.php';
 
        $u_abo=$db ->query ("select id_uz, imie, nazwisko from uzytkownicy;");
	$u_ab = $db->query ("select id_tel, imie, nazwisko, numer_telefonu from uzytkownicy left join nr_tel on nr_tel.id_uz=uzytkownicy.id_uz");					
		?>
        <div class="container page-header">
            <h1>Dodanie telefonu</h1>
        </div>		
 
        <form method="post" action="n_telefon.php">
            
            <div class="form-group col-md-8">
                <label for="Nr telefonu">Nr telefonu</label>
                <input type="text" class="form-control" id="nr_telefonu" name="nr_telefonu" aria-describedby="podpowiedz" placeholder="Wpisz nr telefonu">
                <small id="nazwisko" class="form-text text-muted">W powyższym polu wpisujesz nowy numer telefonu abonenta.</small>
            </div>
            <div class="form-group col-md-8">
				<label for="abonent">Abonent</label>
                                <select id="abonent" name="abonent" class="form-control">
					<?php
						foreach ($u_abo as $row)
						{
	echo '<option value='. $row['id_uz'].' >'.$row['id_uz'].' '. $row['imie'].' '.$row['nazwisko'].'</option>';
							
						}
					?>
				</select>
			</div>
			
			<div class="form-group col-md-8">
				<button type="submit" class="btn btn-primary">Dodaj</button>
			</div>
			
        </form>
        <br /><br />
        
        <div class="container page-header col-md-12">
            <h1>Usunięcie telefonu</h1>
        </div>	
        <form method="post" action="u_tel.php">

            <div class="form-group col-md-8">
				<label for="abonenttel">Abonent z numerem telefonu</label>
                                <select id="abonenttel" name="abonenttel" class="form-control">
					<?php
						foreach ($u_ab as $row)
						{
	echo '<option value='.$row["id_tel"].'>'.$row["imie"].' '.$row["nazwisko"].' '.$row["numer_telefonu"].'</option>';			
		
							
						}
					?>
				</select>
			</div>
			
			<div class="form-group col-md-8">
				<button type="submit" class="btn btn-primary">Usuń</button>
			</div>
			
        </form>


        <!-- #PRZETWARZANIE FORMULARZA I WYPISANIE WPROWADZONYCH DANYCH -->	


        <?php
      //  print_r($_POST);
      echo $_POST['nr_telefonu'];
        if (!empty($_POST['nr_telefonu']) && !empty($_POST['abonent'])) 
	{echo $_POST['nr_telefonu'];
             $q= $db->query("insert into nr_tel(id_uz,numer_telefonu) values($_POST[abonent],$_POST[nr_telefonu]);");
           
            $_POST = []; //czyszczenie tablicy POST by nie powielać tych samych danych
        } 
        ?>	
        
    </div>
</body>




