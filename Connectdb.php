<?php //include './header.php'; ?>
<?php  // include 'dolo_sp.php'; ?> 
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

