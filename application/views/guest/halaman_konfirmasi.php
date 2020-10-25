


        <div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <?php if($this->session->flashdata('pesan') !== null):?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('pesan') ?>
            </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    Konfirmasi Pembayaran
                </div>
                <div class="card-body">
                    <form action="<?= base_url('guest/cekKonfirmasi') ?>" method="POST">                      
                        
                        <div class="form-group">
                            <label>Kode Booking</label>
                            <input type="text" class="form-control" placeholder="Kode Booking" name="kode">
                        </div>
                        <button class="btn btn-primary">Cek Kode Booking</button>

                    </form>
                </div>
            </div>
            
            <?php if(isset($_GET['kode'])): ?>
            <h4>Kode Booking : <?= $_GET['kode'] ?></h4>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Detail Pembayaran Anda
                </div>
                <div class="card-body">
                    <h1 class="text-center">
                        <?php if($kode->status === '0'): ?>
                            <i class="fa fa-times text-danger"></i> Belum Di Bayar
                        <?php elseif($kode->status === '1'): ?>
                            <i class="fa fa-check text-success"></i> Sudah Di Bayar
                        <?php endif; ?>
                    </h1>
                    <?php  if($this->session->flashdata('alert') !== null): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('alert') ?>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>No Handphone</th>
                                    <th>Email</th>
                                    <th>Jurusan</th>
                                    <th>Instansi</th>
                                    <?php if($kode->status !== '1'): ?>
                                    <?php else: endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($detail as $dt): ?>
                                <tr class="text-center">
                                    <td><?= $dt->nama ?></td>
                                    <td><?= $dt->nim ?></td>
                                    <td><?= $dt->no_hp ?> </td>
                                    <td><?= $dt->email ?></td>
                                    <td><?= $dt->jurusan ?></td>
                                    <td><?= $dt->insta ?></td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if($kode->status === '0'): ?>
                        <p class="text-danger">Silahkan Kirim Bukti Pembayaran Anda pada Kolom di Bawah.</p>
                        <?= form_open_multipart("guest/kirimKonfirmasi"); ?>
                        <input type="hidden" name="kode" value="<?= $kode->kode ?>">

                        <p>Foto Bukti Pembayaran</p>
                        <input id="foto" type="file" name="userfile" class="form-control" required>
                        <br>
                        <p class="d-none" id="pesan"></p>
                        <button id="btn_konfirmasi" type="submit" class="btn btn-block btn-dark">Kirim Bukti Pembayaran</button>
                        <?= form_close(); ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
    


    