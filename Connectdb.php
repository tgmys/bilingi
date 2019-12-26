<?php //include './header.php'; ?>
<?php  include './database.php';

  
        $dam='2018-03-27';
        $bili=$db->query("select kierunek_polaczenia, data, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu tr , nr_tel.numer_telefonu as rt "
        . "from  nr_tel left join polaczenia on nr_tel.id_tel=polaczenia.id_tel  where id_uz=1;");
        $bili=$bili->fetch(PDO::FETCH_ASSOC);
        $bili122=$db->query("select kierunek_polaczenia, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu tr , nr_tel.numer_telefonu as rt "
        . "from  nr_tel left join polaczenia on nr_tel.id_tel=polaczenia.id_tel  where id_uz=1 and data=".$bili['data'].";");
        $bili11=mktime($bili122->fetch(PDO::FETCH_ASSOC));
        mktime($bili11);
      //  select kierunek_polaczenia, data from  nr_tel left join polaczenia on nr_tel.id_tel=polaczenia.id_tel?> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
<link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<H1> Test list rozwijanych  </H1>
<br /> <br />
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
	  <th>Pokaż</th>
    </tr>
  </thead>
  <tbody>
	<p>
	<?php
        $dam='2018-03-27';
        $bili=$db->query("select kierunek_polaczenia, data, godzina_polaczenia, czas_trwania_polaczenia, polaczenia.numer_telefonu tr , nr_tel.numer_telefonu as rt "
        . "from  nr_tel left join polaczenia on nr_tel.id_tel=polaczenia.id_tel  where id_uz=1 and data=2018-03-27;");
      //  select kierunek_polaczenia, data from  nr_tel left join polaczenia on nr_tel.id_tel=polaczenia.id_tel  where id_uz=1 and data='2018-03-27';
foreach ($bili122 as $row12){
    echo '<tr>
			<th scope="row">'.$row12['data'].'</th>
			
        
        </tr>';
}
	for ($i=1; $i<10; $i++)
	{
		
  	echo '<tr>
			<th scope="row">'.$i.'</th>
			<td>Mark</td>
			<td>Otto</td>
			<td>@mdo</td>
			<td><a class="btn btn-primary" data-toggle="collapse" href="#ukryta-tresc'.$i.'" aria-expanded="false" aria-controls="ukryta-tresc'.$i.'">
		Zobacz/ukryj
		</a></td>
    </tr>'; 
	
	echo '<tr> <td>
		<div class="collapse" id="ukryta-tresc'.$i.'">
		<div class="card card-body">
			To jest treść ukryta o numerze: '.$i.'.
		</div>
		</div>
	</td></tr>';
	}
	?>
	</p>
	
</tbody>
</table>
</div>
</div>



</DIV>  
</DIV>
</BODY>
</HTML>

