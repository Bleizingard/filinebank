<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>

<div class="container">
	<div class="row valign-wrapper center-align">
		<table>
			<thead>
				<th>Date</th>
				<th>Libellé</th>
				<th>Crédit</th>
				<th>Débit</th>
			</thead>
	<?php
	foreach ( $history as $key => $value )
	{
		printf ( "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><tr>", 
				$value->Date, $value->Libelle, $value->Credit, $value->Debit );
	}
	?>
	<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			
			
			<tr>
		
		</table>
	</div>
</div>