<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="<?=base_url()?>js/jquery.js" ></script>
    <script type="text/javascript" src="<?=base_url()?>js/ajax.js" ></script>
    <title>Bengkel List</title>
</head>
<body> 
    <a href="/bengkel/add_new">Add New</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Rating</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
           <?php foreach($bengkel as $row):?>
                <tr>
                    <td><?= $row['nmBengkel'];?></td>
                    <td><?= $row['rtBengkel'];?></td>
                    <td>
                        <a href="/bengkel/edit/<?= $row['idBengkel'];?>">Edit</a>
                        <a href="/bengkel/delete/<?= $row['idBengkel'];?>" onclick="return confirmDelete();">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
      </tbody>
    </table>
    <br>
    <a href="/bengkel/pcc_method">Go to PCC</a>

<script type="text/javascript">
    function confirmDelete() {
        return confirm('Are you sure want to delete this record?');
    }
</script>
</body>
</html>

