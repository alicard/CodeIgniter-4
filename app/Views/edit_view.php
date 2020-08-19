<div class="container">
  <div class="row">
    <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 bg-white from-wrapper">
      <div class="container">
        <h3><?= $user['nmUser']?></h3>
        <hr>
        <?php if (session()->get('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <form class="" action="" method="post">
          <div class="row">
            <input type="hidden" name="idBengkel" id="idBengkel" value="<?= $user['idUser'] ?>">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="nmUser">Username</label>
               <input type="text" class="form-control" name="nmUser" id="nmUser" value="<?= $user['nmUser'] ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email address</label>
               <input type="text" class="form-control" readonly id="email" value="<?= $user['email'] ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" id="password" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="password_confirm">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
            </div>
          </div>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>