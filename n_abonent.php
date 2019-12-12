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
                <label for="Nr telefonu">Nr telefonu</label>
                <input type="text" class="form-control" id="nr_telefonu" name="nr_telefonu" aria-describedby="podpowiedz" placeholder="Wpisz nr telefonu">
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
        print_r($_POST);
        if (!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['haslo']) && !empty($_POST['nr_telefonu'])) {

            require_once './database.php';
            $db ->query ("insert into uzytkownicy(imie,nazwisko,haslo) values('$id','$data','$godzina','$czas','$rozmowa','$nr_telefonu');");
					
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

