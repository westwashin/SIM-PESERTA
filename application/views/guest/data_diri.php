<section class="section-jumbotron text-center">
        <div class="container py-5">
            <div class="jumbotron jumbotron-image shadow" style="background-image: url('<?php echo base_url('assets/images/bg2.png')?>">
            <h2 class="mb-4">
                Lengkapi Syarat dan Isi Form di bawah
            </h2>
            <p class="mb-4">
                Setelah mengisi, akan di lakukan peninjauan<br>
            </p>
            </div>
        </div>
        </section>

   <section class="section-form-umkm">
   <div class="container py-5">
        <div class="jumbotron jumbotron-image shadow" style="background-image: url('<?php echo base_url('assets/images/bg2.png')?>">
        <form action="<?= base_url('Guest/pesanTiket') ?>" method='POST'>
            <div class="form-row">
                <div class="form-group col-sm-6">
                <label for="Email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                </div>
                <div class="form-group col-md-6">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="Nomor">Nomor HP (WhatsApp)</label>
                <input type="text" class="form-control" name="Nomor" id="Nomor" placeholder="Nomor Hp">
                </div>
                <div class="form-group col-md-6">
                <label for="Alamat">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Jurusan">Jurusan</label>
                    <input type="text" class="form-control" name="Jurusan" id="Jurusan" placeholder="Jurusan">
                    </div>
                <div class="form-group col-md-6">
                    <label for="Instansi">Instansi</label>
                    <input type="text" class="form-control" name="Instansi" id="Instansi" placeholder="Instansi">
                    </div>
            </div>
            <button type="submit" class="btn btn-warning">Daftar</button>
        </form>
        </div>
      </div>
    </section>