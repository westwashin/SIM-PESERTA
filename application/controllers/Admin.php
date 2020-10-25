<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

		function __construct()
	{
	parent::__construct();
	$this->load->model('M_Admin', '', TRUE);
	$this->load->helper(array('form', 'url'));
	}

	public function keHalamanLogin(){
		$this->load->view('admin/login');
	}

	public function login(){
		$data = array(
			'username' => $this->input->post('username'), 
			'password' => sha1($this->input->post('password'))
		);


		$cek = $this->M_Admin->cekLogin($data);

		if ($cek > 0) { // Jika $cek > 0
			$sess = array(
				'status' => TRUE,
				'level'  => 'admin'
			);

			// SET USERDATA / SESSION 
			$this->session->set_userdata($sess);

			redirect(base_url('admin/keHalamanKonfirPem'));

		}else{

			redirect(base_url('admin/keHalamanLogin'));

		}

	}

	public function logout(){
		session_destroy();
		redirect(base_url());
	}

	public function keHalamanDashboard(){
		if ($this->session->status === TRUE) {

			$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

			$this->load->view('admin/dashboard', $data);

		}else{
			redirect(base_url('login'));
		}
		
	}

	public function tambah_stasiun(){

		$nama = $this->input->post('stasiun');

		$input = $this->M_Admin->tambah_stasiun($nama);

		redirect(base_url('admin/dashboard'));

	}

	public function hapus_stasiun($id){
		$delete = $this->M_Admin->delete_stasiun($id);

		redirect(base_url('admin/dashboard'));
	}

	public function keHalamanEditStasiun($id){
		$data['data_stasiun'] = $this->M_Admin->getDataEditStasiun($id)->row();

		$this->load->view('admin/edit_stasiun', $data);
	}
	
	public function edit_stasiun(){
		$nama = $this->input->post('nama_stasiun');
		
		$edit = $this->M_Admin->edit_stasiun($nama);
		
		redirect(base_url('admin/dashboard'));
	}
	
	public function keHalamanKelolaGerbong(){
		$data['kursi'] = $this->M_Admin->getKursi()->result();
		$data['jadwal'] = $this->M_Admin->getJadwal()->result();
		
		$this->load->view('admin/kelola_gerbong', $data);
	}
	
	public function keHalamanLaporan(){
		$data['result'] = $this->M_Admin->laporan();
		$data['total'] = $this->M_Admin->sumLaporan();
		//$data['kereta'] = $this->M_Admin->jumlahKereta()->result();
		
		
		$this->load->view('admin/laporan', $data);

	}
	public function printLaporan(){
		$data['judul'] = 'Print';

		$no_tiket = $this->input->post('no_tiket');

		$data['detail'] = $this->M_Guest->printLaporan($no_tiket)->row();
		$data['jml_penumpang'] = $this->M_Guest->cekKonfirmasi($no_tiket)->num_rows();

		$this->load->view('admin/printLaporan',$data);

	}

	public function keHalamanKelolaJadwal(){
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

		$data['jadwal'] = $this->M_Admin->getJadwal()->result();

		$this->load->view('admin/kelola_jadwal', $data);
	}

	public function tambah_jadwal(){
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'), 
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'tgl_berangkat' => $this->input->post('tgl_berangkat'), 
			'tgl_sampai' => $this->input->post('tgl_sampai'), 
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);

		$this->M_Admin->tambah_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

	public function hapusJadwal($id){
		$this->M_Admin->hapusJadwal($id);
		redirect(base_url('admin/dashboard/kelola-jadwal'));
	}

	public function keHalamanEditJadwal($id){
		$data['data_edit'] = $this->M_Admin->getDataEditJadwal($id)->row();
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

		$this->load->view('admin/edit_jadwal', $data);
	}

	public function edit_jadwal(){
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'), 
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'tgl_berangkat' => $this->input->post('tgl_berangkat'), 
			'tgl_sampai' => $this->input->post('tgl_sampai'), 
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);

		$this->M_Admin->edit_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

	public function keHalamanKonfirPem(){
		$data['list']	= $this->M_Admin->getKonfirmasiPembayaran()->result();
		$data['list1']	= $this->M_Admin->getKonfirmasiPembayaran1()->result();


		$this->load->view('admin/konfirmasi_pembayaran', $data);
	}

	public function verifikasiPembayaran($id){
		$update = $this->M_Admin->updatePembayaran($id);
		
		$email2 = $this->M_Admin->surat($id)->row();

		$email1 = $email2->email; 
		



		if($update){
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

 

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('isecretunnes@gmail.com', 'I-Secret UNNES');

        // Email penerima
        $this->email->to("$email1"); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file

        // Subject email
        $this->email->subject('Link Zoom PKM 5 Bidang');

        // Isi email
        $this->email->message("Ini adalah link untuk konfirmasi pembayaran.<br><br> Klik <strong><a href='https://localhost/isecret1/guest/keHalamanKonfirmasi' rel='noopener'>disini</a></strong> untuk konfirmasi pembayaran.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        	$this->session->set_flashdata('pesan','Berhasil Melakukan Verifikasi!');
			redirect('admin/keHalamanKonfirPem');
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
		}else{
			echo "gagal";
		}
	}

	public function prosesBerangkat($id){
		$update = $this->M_Admin->prosesBerangkat($id);

		if($update){
			$this->session->set_flashdata('pesan','Berhasil Mengubah Status Jadwal');
			redirect('admin/dashboard/kelola-jadwal');
		}else{
			echo "Gagal";
		}
	}

	public function tambahKursi(){
		$jumlah = $this->input->post('jumlah');
		$bagian = $this->input->post('bagian');
		$id_jadwal = $this->input->post('jadwal');
		$insert = $this->M_Admin->insertKursi($jumlah, $bagian, $id_jadwal);

		if($insert){
			$this->session->set_flashdata('pesan','Berhasil Menambah '.$jumlah.' Kursi pada Bagian '.$bagian.' di Jadwal '.$jadwal.' ');
			redirect('admin/dashboard/kelola-gerbong');
		}else{
			echo "Gagal";
		}
	}

	// Truncate
	public function hapus_semua($table){
		$truncate = $this->db->truncate($table);

		if($table === 'stasiun'):

			$redirect = 'admin/dashboard';

		elseif($table === 'jadwal'):

			$redirect = 'admin/dashboard/kelola-jadwal';

		elseif($table === 'kursi'):

			$redirect = 'admin/dashboard/kelola-gerbong';

		endif;


		if($truncate){
			$this->session->set_flashdata('pesan','Berhasil Menghapus Data '.$table);
			redirect($redirect);
		}else{
			echo "Gagal";
		}
	}


}
