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
				<button type="submit" class="btn btn-primary">Wyślij</button>
			</div>
			
        </form>
        <br /><br />

        <?php
        if (!empty($_POST['abonent'])) 
		{
            require_once './database.php';

		 $q= $db->query ("delete from uzytkownicy where uzytkownicy.id_uz ='$_POST[abonent]';");			
           
            $_POST = []; //czyszczenie tablicy POST by nie powielać tych samych danych
        } 
        ?>	
        
        
    </div>

</body>

