<!DOCTYPE html>
<html>
<head>
	<title>Laporan - Admin</title>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/datatables-b4.css') ?>">
</head>
<body>
	<?php include 'include/nav.php'; ?>

	<div class="container-fluid my-4">
        <h3 class="text-center">Laporan</h3>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered datatables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kereta</th>
                                <th>Pendapatan</th>
                                <th>Tanggal</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                            <?php 
                            $no=1;
                            foreach ($result as $row): ?>
                            
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $row->nama_kereta;?></td>
                                <td><?= $row->total_pembayaran;?></td>
                                <td><?= $row->tanggal;?></td>
                                
                            </tr>
                            </tr>
                            
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                    <div class="container">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered datatables">
                        <thead>
                            <tr>
    
                                <th> Total Pendapatan</th>
                                
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                            
                            
                            <tr>
                                <td><?= $total->hasil;?></td>
                            </tr>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                    </div>
            </div>
        </div>
	</div>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/datatables.js') ?>"></script>
	<script src="<?= base_url('assets/js/datatables-b4.js') ?>"></script>
	<?php include 'include/datatables.php'; ?>
</body>
</html>