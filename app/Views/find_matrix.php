
<div class="container">
	<div class="row">
		<div class="col-12">
			<br>
			<a href="#UserSimilarity" class="btn btn-primary">User Similarity</a> 
			<a href="#MatrixSimilarity" class="btn btn-primary">Matrix Similarity</a> 
			<h2>Rata-rata rating item X dan item Y</h2>

			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col">idUser</th>
						<th scope="col">nmUser</th>
						<?php foreach($column as $row):?>	                
							<th scope="col"><?= $row->nmBengkel;?></th>
						<?php endforeach;?>
					</tr>
				</thead>
				<tbody>

					<?php foreach($item as $row):?>
						<tr>
							<td><?= $row->idUser;?></td>
							<td><?= $row->nmUser;?></td>
							<td class="text-center col-sm-3"><?= $row->itemX;?></td>
							<td class="text-center col-sm-3"><?= $row->itemY;?></td>
						</tr>
					<?php endforeach;?>
					<tr>
						<td>Rata-rata rating :</td>
						<td></td>
						<?php foreach($avgitemx as $row):?>
							<td class="text-center col-sm-3"><?= number_format($row->itemX, 2); ?></td>
						<?php endforeach;?>
						<?php foreach($avgitemy as $row):?>
							<td class="text-center col-sm-3"><?= number_format($row->itemY, 2); ?></td>
						<?php endforeach;?>
					</tr>
				</tbody>
			</table> 

			<h2 id="UserSimilarity">User Similarity</h2>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col">idUser</th>
						<th scope="col">nmUser</th>
						<?php foreach($column as $row):?>	                
							<th scope="col"><?= $row->nmBengkel;?></th>
						<?php endforeach;?>
					</tr>
				</thead>
				<tbody>
					<?php foreach($similarity as $row):?>
						<tr>
							<td><?= $row->idUser;?></td>
							<td><?= $row->nmUser;?></td>
							<td><?= $row->itemX;?></td>	
							<td><?= $row->itemY;?></td>
						</tr>
					<?php endforeach;?>

				</tbody>
			</table>

			<h2 id="MatrixSimilarity">Matrix</h2>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Matrix_XY</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($matrix as $row):?>
						<tr>
							<td><?= $row->Matrix;?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table> 

			<!-- End The Method -->

		</div>
	</div>
</div>

