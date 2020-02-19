<?php include_once 'header.php'; ?> 

<body >

    <div class="container">
        <?php
        $page = 'n_abonent';
        include_once 'menuadmina.php';
        include_once './database.php';
        ?> 	

        <div class="page-header">
            <h1>Panel administratora - dodaj abonenta
        </div>		

        <!-- #BODY POCZĄTEK -->	
        <form method="post" action="n_abonent.php">

            <div class="form-group">
                <label for="imie">Imię</label>
                <input type="text" class="form-control" id="imie" name="imie" aria-describedby="podpowiedz" placeholder="Wpisz Imię">
                <small id="imie" class="form-text text-muted">W powyższym polu wpisujesz imię abonenta.</small>
            </div>

            <div class="form-group">
                <label for="nazwisko">Nazwisko</label>
                <input type="text" class="form-control" id="nazwisko" name="nazwisko" aria-describedby="podpowiedz" placeholder="Wpisz nazwisko">
                <small id="nazwisko" class="form-text text-muted">W powyższym polu wpisujesz nazwisko abonenta.</small>
            </div>
            
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Wpisz email">
            </div>

            <div class="form-group">
                <label for="Nr telefonu">Nr telefonu</label>
                <input type="number" class="form-control" id="nr_telefonu" name="nr_telefonu" aria-describedby="podpowiedz" placeholder="Wpisz nr telefonu">
                <small id="nazwisko" class="form-text text-muted">W powyższym polu wpisujesz numer telefonu abonenta.</small>
            </div>

            <div class="form-group">
                <label for="haslo">Hasło</label>
                <input type="password" class="form-control" id="haslo" name="haslo" placeholder="Wpisz hasło">
            </div>

            <button type="submit" class="btn btn-primary">Wyślij</button>
        </form>
        <br /><br />
        <!-- #KONIEC FORMULARZA -->



        <!-- #PRZETWARZANIE FORMULARZA I WYPISANIE WPROWADZONYCH DANYCH -->	


        <?php
      //  print_r($_POST);
        if (!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['haslo']) && !empty($_POST['nr_telefonu']) && !empty($_POST['email'])) {
            
            require_once './database.php';
            $pas= hash('sha512', $_POST['haslo']);  
            try {
                
            
           $q1= $db ->query ("insert into uzytkownicy(imie,nazwisko,haslo,email) values('$_POST[imie]','$_POST[nazwisko]','$pas','$_POST[email]');");
		$id_uz= $db->query("select id_uz from uzytkownicy where email = '$_POST[email]';");
                $id_uz = $id_uz->fetch(PDO::FETCH_ASSOC);
            $q2=$db->query ("insert into nr_tel(id_uz,numer_telefonu) values('$id_uz[id_uz]','$_POST[nr_telefonu]');"); 
            } catch (Exception $ex) {
                echo 'błąd';   
            }
            echo '<table class="table table-bordered">';
            echo '<thead>
			<tr>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Nr telefonu </th>
			</tr>
		  </thead>';

            echo '<tbody>
			<tr>
				<td>' . $_POST['imie'] . '</td> 
				<td>' . $_POST['nazwisko'] . '</td>
				<td>' . $_POST['nr_telefonu'] . '</td>
				
			</tr>
         </tbody>
		</table>';
            $_POST = []; //czyszczenie tablicy POST by nie powielać tych samych danych
        } else {
            echo '<h3> Dodaj abonenta </h3>';
        }
        ?>	

    </div>

</body>

