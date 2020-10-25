<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title><?= $judul ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/style/style.css') ?>">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4d5ceea0e4.js" crossorigin="anonymous"></script>
</head>

<body>
	<nav>
          <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="<?php echo base_url('guest/KeHalamanDepan')?>">
                          <img src="<?php echo base_url('assets/images/logoisecret.png')?>" alt="">
                        </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('guest/KeHalamanDepan')?>">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('guest/Konfirmasi')?>">Konfirmasi</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/keHalamanLogin');?>">Login</a>
                          </li>
                      </ul>
                    </div>
                </div>
            </div>
          </div>
        </nav>