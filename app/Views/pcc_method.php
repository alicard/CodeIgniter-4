<div class="container">

  <div class="row justify-content-center">
    <div class="col-sm-12 content">

      <div class="title pt-3">
        <h2>Penerapan metode Person Correlation Coefficient</h2>
      </div>
      <div class="artikel">
        <p>Ada dua menu yang dapat diakses oleh user antara lain :</p>
        <ul class="list-unstyled">
          <li><h5>1. Mencari similarity</h5>
            <ul>
              <li class="list-unstyled">Pada metode ini sistem akan menghitung nilai similarity antara item_1 dan item_2.
                <br>Anda bisa mengakses melalui menu navigasi yang berada dipojok kiri atas atau pada modal berikut.
              </li>
            </ul>
          </li>
          <br>
          <li><h5>2. Menghitung hasil prediksi</h5>
            <ul>
              <li class="list-unstyled">Didalam metode ini user diharuskan memilih daftar item yang tersedia untuk dirating. Ada ketentuan yang berlaku dan harus dipahami sebelum melanjutkan, antara lain :
                <ul>
                  <li class="list-unstyled">- User belum memberi rating item yang dipilih</li>
                  <li class="list-unstyled">- Jika user telah merating, maka secara otomatis sistem akan menghapus data item tersebut</li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <h5 class="row justify-content-center pt-3 click-here">Klik button dibawah</h5>
      <div class="row justify-content-center pt-3">
        <button type="button" class="btn btn-primary mr-3 btn-method" data-toggle="modal" data-target="#getSimilarity">Cari Similarity</button>
        <button type="button" class="btn btn-primary ml-3 btn-method" data-toggle="modal" data-target="#getPrediction">Cari Prediksi</button>
      </div>

      <?php foreach($count as $row):?>
        <div class="pt-5">
          <span>Berikut adalah total seluruh rating yang dapat dilihat :</span>
          <br>
          <span>Ditemukan <?= $row->c_idUser;?> rating</span>
        </div>
      <?php endforeach;?>

      <div class="btn-group btn-group-toggle btnShowHide" data-toggle="buttons">
          <span href="#" name="options" id="showRating" autocomplete="off" class="p-1"><i class="fa fa-plus-circle" aria-hidden="true"></i>
          </span>
          <span href="#" name="options" id="hideRating" autocomplete="off" class="p-1"><i class="fa fa-minus-circle" aria-hidden="true"></i>
          </span>
      </div>
      <label>
          <a href="/method/export_r/<?= $filename;?>" class="p-1 btn">Export</a>
      </label>

      <table class="table table-bordered" id="rating">
        <thead class="thead-dark">
          <tr>
            <th scope="col">idUser</th>
            <th scope="col">nmUser</th>
            <th scope="col" class="text-center">idBengkel</th>
            <th scope="col" class="text-center">nilai</th>
          </tr>
        </thead>
        <tbody>
          <!-- Looping select db from Admin.php --> 
          <?php foreach($pcc as $row):?>
            <tr>
              <td><?= $row->idUser;?></td>
              <td><?= $row->nmUser;?></td>
              <td class="text-center"><?= $row->idBengkel;?></td>
              <td class="text-center"><?= $row->nilai;?></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>

    </div>
  </div>
</div>

<!-- Start Silimarity Modal -->
<form action="/method/find_matrix" method="post">
  <div class="modal fade" id="getSimilarity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cari similarity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Item 1</label>
            <select name="itemX" class="form-control product_category">
              <option value="">-Select-</option>
              <?php foreach($bengkel as $row):?>
                <option value="<?= $row['idBengkel'];?>"><?= $row['nmBengkel'];?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group">
            <label>Item 2</label>
            <select name="itemY" class="form-control product_category">
              <option value="">-Select-</option>
              <?php foreach($bengkel as $row):?>
                <option value="<?= $row['idBengkel'];?>"><?= $row['nmBengkel'];?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbit" name="submit" class="btn btn-primary">Hitung</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End -->

<!-- Start Prediction Modal -->
<form action="/method/item" method="post">
  <div class="modal fade" id="getPrediction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih item yang akan diprediksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>ID User</label>
            <select name="idUser" class="form-control product_category">
              <option disabled selected="selected" value="<?= session()->get('idUser');?>"><?= session()->get('idUser');?></option>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Bengkel</label>
            <select name="idBengkel" class="form-control product_category">
              <option value="">-Select-</option>
              <?php foreach($bengkel as $row):?>
                <option value="<?= $row['idBengkel'];?>"><?= $row['nmBengkel'];?></option>
              <?php endforeach;?>
            </select>
          </div>     
          <div class="form-group">
            <label>Neighbor</label>
            <select name="neighbor" class="form-control product_category">
              <option value="">-Select-</option>
              <option value="2">2</option>
              <option value="5">5</option>
              <option value="7">7</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbit" name="submit" class="btn btn-primary">Hitung</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End -->

<script>
  $(document).ready(function(){
    $("#hideRating").click(function(){
      $("#rating").hide();
    });
    $("#rating").hide();
    $("#showRating").click(function(){
      $("#rating").show();
    });
  });
</script>