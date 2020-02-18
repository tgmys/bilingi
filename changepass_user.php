<?php include './header.php';;?>

<body>


    <div class="container">
        <?php include './menuuser.php';
        ?>
        </br>    </br>
        <div class="col-md-4">

             <form method="post" action="changepass_user.php">
                <div class="form-group ">
                    <label for="bhas">Bieżące hasło</label>
                    <input type="password" class="form-control" id="bhas" name="bhas" >
                </div>

                <div class=" form-group  ">
                    <label for="nhas">Nowe hasło</label>
                    <input type="password" class="form-control" id="nhas" name="nhas" >
                </div>

                <div class="form-group">
                    <label for="pnhas">Powtorzenie nowego hasło</label>
                    <input type="password" class="form-control" id="pnhas" name="pnhas" >
                </div>
                <button type="submit" class="btn btn-primary">Zmień hasło</button></form>
        </div>
    

    <?php
   if (!empty($_POST['bhas'])&& !empty($_POST['nhas']) && !empty($_POST['pnhas'])) {
     
        $s = $db->prepare("select id_uz from uzytkownicy where id_uz=$id_us and haslo =?;");
        $pass = hash('sha512', $_POST['bhas']);
        $s->bindParam(1, $pass);
        $s->execute();
        $tmp = $s->fetch(PDO::FETCH_ASSOC);
        
        
        if ($_POST['nhas'] == $_POST['pnhas'] && count($tmp['id_uz'])>0)
       {
            echo 'hyth';
          $st = $db->prepare("update uzytkownicy set haslo = ? where id_uz=$id_us");
 
        $st->bindParam(1, $$_POST['nhas']);
        $st->execute();
   }

    }
    ?>
        </div>
</body>  
