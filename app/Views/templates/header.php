<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
  $uri = service('uri');
?>
<head>
  <meta charset="utf-8">  
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap|Merienda&display=swap|Poppins:wght@300&display=swap" rel="stylesheet"> 
  <?php if($uri->getSegment(1) === 'similarity'): ?>
  <title>Edit <?= $user['nmUser'];?></title>
  <?php elseif($uri->getSegment(1) === 'users'): ?>
  <title>User <?= $user['nmUser'];?></title>
  <?php else: ?>
  <title>Skripsi</title>
  <?php endif; ?>
</head>
<body>
  <nav id="sidebar" class="sidebar bg-dark">
    <div class="sidebar-header bg-primary">
      <h5>Person Correlation</h5>
    </div>

    <ul class="list-unstyled components">
      <li class="active">
        <a href="<?=base_url()?>/method/similarity">Cari Similarity</a>
      </li>
      <li>
        <a href="<?=base_url()?>/method/prediction/<?= $user['idUser'];?>">Cari Prediksi</a>
      </li>
    </ul>
  </nav>

  <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light" id="navbar">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fas fa-align-left"></i>
    </button>
    
    <div class="container-fluid">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        
        
        <?php if (session()->get('isLoggedIn')): ?>
        <ul class="navbar-nav mr-auto" id="nav-left">
          <li class="nav-item <?= ($uri->getSegment(1) === '' ? 'active' : null) ?>">
            <a class="nav-link"  href="<?=base_url()?>/users/<?= $user['idUser'];?>">Dashboard</a>
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) === 'edit' ? 'active' : null) ?>">
            <a class="nav-link" href="<?=base_url()?>/users/edit/<?= $user['idUser'];?>">Profile</a>
          </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0" id="nav-right">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>/users/logout">Logout</a>
          </li>
        </ul>
        <?php else: ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'login' ? 'active' : null) ?>">
              <a class="nav-link" href="<?=base_url()?>/users/login">Login</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
              <a class="nav-link" href="<?=base_url()?>/users/register">Register</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'pcc_method' ? 'active' : null) ?>">
              <a class="nav-link" href="<?=base_url()?>/method/similarity">Check Similarity</a>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <script>
  $(document).ready(function(){
    $("#sidebarCollapse").click(function(e){
      e.stopPropagation();
      $('#sidebar').toggleClass('show-side-nav');
      e.stopPropagation();
      $('#navbar').toggleClass('show-side-nav');
    });
    
    $('#sidebar').click(function(e){
      e.stopPropagation();
    });

    $('body,html').click(function(e){
       $('#sidebar').removeClass('show-side-nav');
       $('#navbar').removeClass('show-side-nav');
    });
  });
</script>