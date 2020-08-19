<div class="container">
	<div class="row">
		<div class="col-12">
			<br>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Add">Add New</button>
			<a class="btn btn-primary" href="/method/pcc_method">PCC Method</a>
			<br><br>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Rating</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- Looping select db from Admin.php --> 
					<?php foreach($bengkel as $row):?>
						<tr>
							<td><?= $row['idBengkel'];?></td>
							<td><?= $row['nmBengkel'];?></td>
							<td><?= $row['rtBengkel'];?></td>
							<td>
								<a href="javascript:;" class="btn btn-primary btn-edit" data-id="<?= $row['idBengkel'];?>" data-name="<?= $row['nmBengkel'];?>" data-rating="<?= $row['rtBengkel'];?>">Edit</a>
								<a href="javascript:;" class="btn btn-danger btn-delete" data-id="<?= $row['idBengkel'];?>" data-name="<?= $row['nmBengkel'];?>">Delete</a>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<br>
		</div>
	</div>
</div>

<!-- Add Modal -->
<form action="method/save" method="post">
	<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add New</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-form-label">Nama Bengkel</label>
						<input type="text" class="form-control nmBengkel" name="nmBengkel">
					</div>
					<div class="form-group">
						<label class="col-form-label">Rating</label>
						<input type="text" class="form-control rtBengkel" name="rtBengkel">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="sumbit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End  -->

<!-- Edit Modal  -->
<form action="method/update" method="post">
	<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<input type="hidden" name="idBengkel" class="idBengkel">

					<div class="form-group">
						<label class="col-form-label">Nama Bengkel</label>
						<input type="text" class="form-control nmBengkel" name="nmBengkel" placeholder="Nama Bengkel" value="<?= $row['nmBengkel'];?>">
					</div>
					<div class="form-group">
						<label class="col-form-label">Rating</label>
						<input type="text" class="form-control rtBengkel" name="rtBengkel" placeholder="Rating" value="<?= $row['rtBengkel'];?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="sumbit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End  -->

<!-- Delete Modal -->
<form action="method/delete" method="post">
	<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Do you want to delete <input type="text" readonly="true" name="nmBengkel" class="nmBengkel" value="<?= $row['nmBengkel'];?>"> ?
				</div>
				<div class="modal-footer">
					<input type="hidden" name="idBengkel" class="idBengkel">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End -->

<script>
	$(document).ready(function(){
		
        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const rating = $(this).data('rating');
            // Set data to Form Edit
            $('.idBengkel').val(id);
            $('.nmBengkel').val(name);
            $('.rtBengkel').val(rating);
            // Call Modal Edit
            $('#Edit').modal('show');
        });
        
		// get Delete Product
		$('.btn-delete').on('click',function(){
			const id = $(this).data('id');
			const name = $(this).data('name');
            // Set data to Form Edit
            $('.idBengkel').val(id);
            $('.nmBengkel').val(name);
            // Call Modal Edit
            $('#Delete').modal('show');
        });

	});
</script>