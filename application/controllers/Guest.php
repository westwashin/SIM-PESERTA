<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function keHalamanDepan(){
		$data['judul'] = 'Halaman Depan';

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}	

	public function Daftar(){
		$data['judul'] = 'Formulir Data Diri';

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/data_diri');
		$this->load->view('guest/template/footer');
		
	}

	public function Success(){
		$data['judul'] = 'Success';

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/success');
		$this->load->view('guest/template/footer');
		
	}

	public function Error(){
		$data['judul'] = '404 Not Found';

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/error');
		$this->load->view('guest/template/footer');
		
	}

	public function keHalamanKonfirmasi(){
		$data['judul'] = 'Halaman Konfirmasi';

		if(isset($_GET['kode'])):
			$kode = $_GET['kode'];
			$data['kode'] = $this->M_Guest->getPembayaranWhere($kode)->row();
			$data['detail'] = $this->M_Guest->cekKonfirmasi($data['kode']->kode)->result();
		endif;

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_konfirmasi');
		$this->load->view('guest/template/footer');
	}

	public function Konfirmasi(){
		$data['judul'] = 'Konfirmasi';

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_konfirmasi');
		$this->load->view('guest/template/footer');
	}

	public function pesanTiket(){

					
		
		$a = rand(0,1000);
		$kode2 = 'PKM'.$a;
		$status = "0";

		

		// input Data Pemesan
		$data = array(
			'kode' => $kode2,
			'nama' => $this->input->post('Nama'),
			'nim' => $this->input->post('nim'), 
			'email' => $this->input->post('email'), 
			'no_hp' => $this->input->post('Nomor'), 
			'jurusan' => $this->input->post('Jurusan'),
			'insta' => $this->input->post('Instansi'),
			'status' => $status,
		);

		$this->M_Guest->insertPemesan($data);

		$config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'isecretunnes@gmail.com',  // Email gmail
            'smtp_pass'   => 's3cr3t123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $kode = $this->input->post('email');

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('isecretunnes@gmail.com', 'I-Secret UNNES');

        // Email penerima
        $this->email->to("$kode"); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file

        // Subject email
        $this->email->subject('Link Konfirmasi Pembayaran PKM 5 Bidang');

        // Isi email
        $this->email->message("Ini adalah Kode Booking anda<br><br> Klik <strong>$kode2</strong> untuk konfirmasi pembayaran.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
			$this->session->set_flashdata('success',"success");
			redirect("guest/Success");
        } else {
			$this->session->set_flashdata('error', "error");
			redirect("guest/Success");
        }
		
	}

	public function keHalamanPembayaran(){
		$data['judul'] = 'Konfirmasi Pembayaran';


		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/pembayaran');
		$this->load->view('guest/template/footer');
	}

	public function cekKonfirmasi(){
		$kode = $this->input->post('kode');

		redirect("guest/keHalamanKonfirmasi?kode=".$kode);

	}

	public function PilihGerbong(){
		$kodenya = $this->input->post('kode');
		$nama = $this->input->post('nama');

		$kode = $this->M_Guest->getPembayaranWhere($kodenya)->row();

		// Deklarasi
		$gerbong = $this->input->post('gerbong');
		$bagian = $this->input->post('bagian');
		$kursi = $this->input->post('kursi');

		$data = array(
			'gerbong'	=> $gerbong,
			'bagian'	=> $bagian,
			'kursi'		=> $kursi,
		);

		// Validasi Kursi
		$tiket = $this->M_Guest->getTiketWhere($kode->no_tiket)->row();
		$cek = $this->M_Guest->validasiGerbong($gerbong,$bagian,$kursi,$tiket->id_jadwal)->num_rows();

		if($cek > 0){ // Jika ada
			$this->session->set_flashdata('alert','Maaf Gerbong, Bagian, dan Kursi sudah tidak tersedia ');
			redirect('konfirmasi?kode='.$kodenya);
		}else{ // Jika tidak ada
			$update = $this->M_Guest->PilihGerbong($data, $kode->no_tiket, $nama );
		}


		// Update Kursi
		$tiket = $this->M_Guest->getTiketWhere($kode->no_tiket)->row();
		$update = $this->M_Guest->updateKursi($kursi);

		if($update){
			redirect('konfirmasi?kode='.$kodenya);
		}else{
			echo "Gagal";
		}
		

	}

	public function kirimKonfirmasi(){
		// Uploading Gambar
		$config['upload_path']          = './assets/bukti/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048; // 2MB

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
			$data = $this->upload->data();
			$fileName = $data['file_name'];
			
			$no = $this->input->post('kode');
			$this->M_Guest->insertBukti($fileName, $no );

			$this->session->set_flashdata("pesan","Berhasil Mengirim Bukti! Silahkan Cek Kembali 12 Jam Kemudian. Untuk Mengecek Pembayaran Anda");
			redirect("guest/keHalamanKonfirmasi");
		}
	}

	public function print(){
		$data['judul'] = 'Print';

		$no_tiket = $this->input->post('no_tiket');

		$data['detail'] = $this->M_Guest->getPrint($no_tiket)->row();
		$data['jml_penumpang'] = $this->M_Guest->cekKonfirmasi($no_tiket)->num_rows();

		$this->load->view('guest/template/header', $data);
		$this->load->view('print',$data);
		$this->load->view('guest/template/footer', $data);
	}
}
