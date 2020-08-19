<div class="container">
  <div class="row justify-content-center">
    <div class="content">
      <div class="container">
      <form action="/method/item" method="post">
        <div class="form-group row col">
          <h4 class="col">Cari Prediksi</h4>
        </div>
        <div class="form-group row col">
          <label for="inputID" class="col">User ID</label>
          <div class="col-md-7">
            <select name="idUser" class="form-control product_category">
              <option disabled selected="selected" value="<?= session()->get('idUser');?>"><?= session()->get('idUser');?></option>
            </select>
          </div>
        </div>
        <div class="form-group row col">
          <label for="inputName" class="col">Nama Bengkel</label>
          <div class="col-md-7">
            <select name="idBengkel" class="form-control product_category">
              <option value="">-Select-</option>
              <?php foreach($bengkel as $row):?>
                <option value="<?= $row['idBengkel'];?>"><?= $row['nmBengkel'];?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-group row col">
          <label for="inputNeighbor" class="col">Neighbor</label>
          <div class="col-md-7">
            <select name="neighbor" class="form-control product_category">
              <option value="">-Select-</option>
                <option value="2">2</option>
                <option value="5">5</option>
                <option value="7">7</option>
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