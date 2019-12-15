<?php include './header.php'; ?>
<?php   include 'dolo_sp.php'; ?> 
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

