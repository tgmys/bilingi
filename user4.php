<head>
    <style>
        #se{
            display: inline-block;

            height: 40px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">	
        <?php
        $page = 'w_pliku';
        include_once './menuuser.php';
        require_once './database.php';
        ?>	
        <div class="page-header">
            <h2>Wybierz numer telefonu i miesiąc </h2>
        </div>		
        <nav class="row navbar  navbar-light" style="background-color: #FFFAFA;">
            <div class="container">
                <ul class="nav navbar-nav ">

                    <li class="active">
                        <h4> Numer telefonu : </h4>
                    </li>
                    <li  >
                        <form class="form-inline" role="form" method="POST" action="user4.php"> 
                            <?php
                            echo'<select id="se" name="nr_telefonu">';

                            $statement = $db->query("select id_tel,numer_telefonu from nr_tel where id_uz ='$id_us'");

                            foreach ($statement as $wiersz) {
                                echo '<option value =' . $wiersz['id_tel'] . '>' . $wiersz['numer_telefonu'] . '</option>';
                                //  $tel=$wiersz['numer_telefonu'];
                            }
                            echo '</select>';
                            ?> 
                    </li>
                    <li>
                        <h4> Dla miesiąca : </h4>                 
                    </li>
                    <li>
                        <?php
                        echo'<select id="se" name="data">';

                        $statement1 = $db->query("select distinct extract(year from data) rok, extract(month from data) miesiac from polaczenia join polacz on polacz.id_bili=polaczenia.id_bili join nr_tel on nr_tel.id_tel=polacz.id_tel where id_uz='$id_us';");

                        foreach ($statement1 as $wiersz) {
                            echo '<option>' . $wiersz['rok'] . '-' . $wiersz['miesiac'] . '</option>';
                            //  $tel=$wiersz['numer_telefonu'];$l = explode("+", $linia);
                        }
                        echo '</select>';
                        ?> 

                    </li>
                    <li>

                        <input class="btn btn-primary" type="submit" name="Przyp" Value="Bilingi"><br /><br /></FORM>
                    </li>
                </ul>


            </div>
        </nav>							


        <?php if (isset($_POST["nr_telefonu"])) { ?>
            <div class="row">
                <?php
                 $l = explode("-", $_POST['data']);
                           $bili = $db->query("select extract(year from data) rok, extract(month from data) miesiac, kierunek_polaczenia, data, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu tr , nr_tel.numer_telefonu as rt"
                                . " from nr_tel left join polacz on nr_tel.id_tel=polacz.id_tel join "
                                . "polaczenia on polacz.id_bili = polaczenia.id_bili where nr_tel.id_uz='$id_us' and nr_tel.id_tel='$_POST[nr_telefonu]' and extract(year from data)='$l[0]' and extract(month from data)='$l[1]'  ;
");
                $bilie = $bili;          
                $przy=0;
                $wych=0;
                foreach ($bili as $row2) {
                    if ($row2['kierunek_polaczenia']=="PRZY")
                        $przy++;
                    elseif ($row2['kierunek_polaczenia']=="WYCH") {
                        $wych++;
                    }
                }
                ?>
                <h3>Liczba połączeń wychodzących: <?php echo "$wych"; ?></h3>
                <h3>Liczba połączeń przychodzących: <?php echo "$przy"; ?></h3>
                
                <table class="table table-bordered table-striped">



                    <thead>
                        <tr>

                            <th>kierunek_polaczenia</th>
                            <th>data</th>
                            <th>godzina_polaczenia </th>
                            <th>czas_trwania_polaczenia </th>
                            <th>numer telefonu </th>

                        </tr>
                    </thead>

                    <tbody>
                    <p>
                        <?php
                               $bili = $db->query("select extract(year from data) rok, extract(month from data) miesiac, kierunek_polaczenia, data, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu tr , nr_tel.numer_telefonu as rt"
                                . " from nr_tel left join polacz on nr_tel.id_tel=polacz.id_tel join "
                                . "polaczenia on polacz.id_bili = polaczenia.id_bili where nr_tel.id_uz='$id_us' and nr_tel.id_tel='$_POST[nr_telefonu]' and extract(year from data)='$l[0]' and extract(month from data)='$l[1]' ;
");
                       
                        foreach ($bili as $row2) {
                            echo '<tr>                  
				<td>' . $row2['kierunek_polaczenia'] . '</td> 
				<td>' . $row2['data'] . '</td>
				<td>' . $row2['godzina_polaczenia'] . '</td>
                                <td>' . $row2['czas_trwania_polaczenia'] . '</td>
				<td>' . $row2['tr'] . '</td>';
                        }
                        ?>
                    </p>
                    </tbody>
                </table>

            </div>	<?php } ?>



    </div>
