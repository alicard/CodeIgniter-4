<div class="container">
  <div class="row justify-content-center">
    <div class="content">
      <div class="container">
      <form action="/method/find_matrix" method="post">
        <div class="form-group row col">
          <h4 class="col">Cari similarity</h4>
        </div>
        <div class="form-group row col">
          <label for="inputEmail3" class="col">Nama Bengkel 1</label>
          <div class="col-md-7">
            <select name="itemX" class="form-control product_category">
              <option value="">-Select-</option>
              <?php foreach($bengkel as $row):?>
                <option value="<?= $row['idBengkel'];?>"><?= $row['nmBengkel'];?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-group row col">
          <label for="inputEmail3" class="col">Nama Bengkel 2</label>
          <div class="col-md-7">
            <select name="itemY" class="form-control product_category">
              <option value="">-Select-</option>
              <?php foreach($bengkel as $row):?>
                <option value="<?= $row['idBengkel'];?>"><?= $row['nmBengkel'];?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-group row col">
          <div class="col">
            <button type="sumbit" name="submit" class="btn btn-primary">Hitung</button>
          </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>