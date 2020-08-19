<div class="container">
	<div class="row">
		<div class="col-12">
      		<br>
      		<div class="btn-group btn-group-toggle btnShowHide" data-toggle="buttons">
			  <label class="btn btn-primary btn-sm active">
			    <input type="radio" name="options" id="showMatrix" autocomplete="off" > Show Matrix
			  </label>
			  <label class="btn btn-primary btn-sm active">
			    <input type="radio" name="options" id="hideMatrix" autocomplete="off" checked> Hide
			  </label>
			</div>
			<br>
				<table class="table table-bordered" id="matrix">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Matrix</th>
							<?php for($i=1; $i<=10; $i++){ ?>
							<th scope="col" style="width: 10%"><?= $i ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<tr class="striped-odd">
							<th scope="col" class="table-dark">1</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==1){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?>  

						<?php foreach(array_slice($result['similarity'], 10, 9) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr>  

						<tr class="striped-even">
							<th scope="col" class="table-dark">2</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==2){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==2){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

						<?php foreach(array_slice($result['similarity'], 19, 8) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-odd">
							<th scope="col" class="table-dark">3</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==3){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==3){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?>  

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==3){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 
					
						<?php foreach(array_slice($result['similarity'], 27, 7) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-even">
							<th scope="col" class="table-dark">4</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==4){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==4){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==4){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==4&&$val->idBengkel_2==4){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?>  
							
						<?php foreach(array_slice($result['similarity'], 34, 6) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-odd">
							<th scope="col" class="table-dark">5</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==5){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==5){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==5){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==4&&$val->idBengkel_2==5){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?>
							<?php endforeach;?>  

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==5&&$val->idBengkel_2==5){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

						<?php foreach(array_slice($result['similarity'], 40, 5) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-even">
							<th scope="col" class="table-dark">6</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==6){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==6){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==6){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==4&&$val->idBengkel_2==6){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==5&&$val->idBengkel_2==6){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?>  

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==6&&$val->idBengkel_2==6){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

						<?php foreach(array_slice($result['similarity'], 45, 4) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-odd">
							<th scope="col" class="table-dark">7</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==7){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==7){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==7){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==4&&$val->idBengkel_2==7){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==5&&$val->idBengkel_2==7){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==6&&$val->idBengkel_2==7){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==7&&$val->idBengkel_2==7){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

						<?php foreach(array_slice($result['similarity'], 49, 3) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-even">
							<th scope="col" class="table-dark">8</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==4&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?>
							<?php if($val->idBengkel_1==5&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==6&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==7&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==8&&$val->idBengkel_2==8){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

						<?php foreach(array_slice($result['similarity'], 52, 2) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-odd">
							<th scope="col" class="table-dark">9</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==4&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?>
							<?php if($val->idBengkel_1==5&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==6&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==7&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==8&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==9&&$val->idBengkel_2==9){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

						<?php foreach(array_slice($result['similarity'], 54, 1) as $row):?>
							<td><?php echo round($row->nilaiSimilarity,4); ?></td>
						<?php endforeach;?>  
						</tr> 

						<tr class="striped-even">
							<th scope="col" class="table-dark">10</th>
							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==1&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==2&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==3&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==4&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==5&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==6&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==7&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==8&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php if($val->idBengkel_1==9&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

							<?php foreach($result['similarity'] as $key => $val):?>
							<?php if($val->idBengkel_1==10&&$val->idBengkel_2==10){ ?>
							<td><?= round($val->nilaiSimilarity,4); ?></td>
							<?php } ?> 
							<?php endforeach;?> 

						</tr> 
						   		 
					</tbody>
				</table>  

				<h5 class="tabel-prediction">Neighbor</h5>
				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th scope="col" style="width: 10%">idUser</th>		
							<th scope="col" style="width: 10%">idBengkel</th>	
							<th scope="col" style="width: 10%">nilai</th>	
							<th scope="col" style="width: 10%">idBengkel_1</th>	
							<th scope="col" style="width: 10%">idBengkel_2</th>	
							<th scope="col" style="width: 10%">nilaiSimilarity</th>					
						</tr>
					</thead>
					<tbody>
						<?php foreach($result['neighbor'] as $key => $val): ?>
							<tr>
								<td><?= $val->idUser; ?></td>
								<td><?= $val->idBengkel; ?></td>
								<td><?= $val->nilai; ?></td>
								<td><?= $val->idBengkel_1; ?></td>
								<td><?= $val->idBengkel_2; ?></td>
								<td><?= $val->nilaiSimilarity; ?></td>			
							</tr>
					<?php endforeach; ?>
							

					</tbody>
				</table>
				<p style="margin-left:0.5rem;">Hasil Prediksi : <?= $result['prediction']; ?></p>

				<a href="/method/pcc_method" class="btn btn-primary btn-small" >Kembali ke method</a> 
							
		</div>
	</div>
</div>
<!-- The Modal -->
  <div class="modal fade" id="myModal" data-delay="3">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Perhatian</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body"> 
       	<?= $result['message']; ?>
       	<br>
       	Hasil Prediksi : <?= $result['prediction']; ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
		$("#hideMatrix").click(function(){
		    $("#matrix").hide();
		  });
		$("#matrix").hide();
		  $("#showMatrix").click(function(){
		    $("#matrix").show();
		  });
	});
</script>

<script>
$(document).ready(function(){
		$("#myModal").modal('show');
		setTimeout(function(e){
	    $('#myModal').modal('hide');
	  }, parseInt($('#myModal').attr('data-delay')) * 1000);
	});
</script>