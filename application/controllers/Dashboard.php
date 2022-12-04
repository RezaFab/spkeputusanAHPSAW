<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('excel', 'session'));
	}
	public function import_excel()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nisn = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$jk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$tanggalLahir = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$kelas = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jurusan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$th = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$where = array('id_keputusan' => $this->input->post('id_keputusan'));
					$jumlah = $this->MainModel->tampil_jumlah($where, 'alternatif');
					$id_keputusan = $this->input->post('id_keputusan');
					$id_user = $this->session->userdata('id_user');


					$temp_data[] = array(
						'nama_alternatif' => $nama,
						'nisn_alternatif' => $nisn,
						'jk_alternatif' => $jk,
						'tglLahir_alternatif' => $tanggalLahir,
						'kelas_alternatif' => $kelas,
						'jurusan_alternatif' => $jurusan,
						'tahunMasuk_alternatif' => $th,
						'kd_alternatif' => $jumlah + 1,
						'id_keputusan' => $id_keputusan,
						'id_user' => $id_user
					);
				}
			}
			$this->load->model('MainModel');
			$this->MainModel->insert($temp_data);
			redirect(base_url('dashboard/alternatif'));
		} else {
			echo "Tidak ada file yang masuk";
			redirect(base_url('dashboard/alternatif'));
		}
	}
	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['pengguna'] = $this->MainModel->tampilPengguna($where)->result();
			$this->load->view('dashboard', $data);
		} else redirect(base_url('auth'));
	}
	public function keputusan()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['keputusan'] = $this->MainModel->tampilKeputusan($where)->result();
			$this->load->view('keputusan', $data);
		} else redirect(base_url('dashboard'));
	}
	public function user()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['user'] = $this->MainModel->tampilKeputusan($where)->result();
			$this->load->view('user', $data);
		} else redirect(base_url('dashboard'));
	}
	public function aksi_tambah_keputusan()
	{
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'nama_keputusan' => $nama,
			'deskripsi' => $deskripsi,
			'konsis' => 'tidak',
			'status' => 'belum',
			'id_user' => $id_user
		);
		$this->session->set_flashdata('notifsukses', 'Pendukung keputusan baru berhasil ditambahkan!');
		$this->MainModel->input_data($data, 'pendukung_keputusan');
		redirect(base_url('dashboard/keputusan'));
	}
	public function import_alternatif()
	{
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'nama_keputusan' => $nama,
			'deskripsi' => $deskripsi,
			'konsis' => 'tidak',
			'status' => 'belum',
			'id_user' => $id_user
		);
		$this->session->set_flashdata('notifsukses', 'Pendukung keputusan baru berhasil ditambahkan!');
		$this->MainModel->input_data($data, 'pendukung_keputusan');
		redirect(base_url('dashboard/keputusan'));
	}
	public function aksi_hapus_keputusan()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			$where = array('id_keputusan' => $id);
			$this->MainModel->deleteData('pendukung_keputusan', $where);
			redirect(base_url('dashboard/keputusan'));
		} else redirect(base_url('auth'));
	}
	public function edit_keputusan()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			if ($id != null) {
				$where = array('id_keputusan' => $id);
				$data['keputusan'] = $this->MainModel->tampilKeputusan($where)->result();
				$this->load->view('edit_keputusan', $data);
			} else redirect(base_url('dashboard/keputusan'));
		} else redirect(base_url('auth'));
	}
	public function update_keputusan()
	{
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$id_keputusan = $this->input->post('id_keputusan');
		$data = array(
			'nama_keputusan' => $nama,
			'deskripsi' => $deskripsi
		);
		$this->MainModel->updateData($data, 'pendukung_keputusan', array('id_keputusan' => $id_keputusan));
		redirect(base_url('dashboard/keputusan'));
	}
	public function kriteria()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['keputusan'] = $this->MainModel->tampilKeputusan($where)->result();
			$data['kriteria'] = $this->MainModel->tampilKriteria($this->session->userdata('id_user'));
			$this->load->view('kriteria', $data);
		} else redirect(base_url('dashboard'));
	}
	public function aksi_tambah_kriteria()
	{
		$nama = $this->input->post('nama');
		$id_keputusan = $this->input->post('id_keputusan');
		$atribut = $this->input->post('atribut');
		$id_user = $this->session->userdata('id_user');
		$where = array('id_keputusan' => $this->input->post('id_keputusan'));
		$jumlah = $this->MainModel->tampil_jumlah($where, 'kriteria');

		$data = array(
			'nama_kriteria' => $nama,
			'kd_kriteria' => $jumlah + 1,
			'id_keputusan' => $id_keputusan,
			'atribut' => $atribut,
			'id_user' => $id_user
		);
		$this->session->set_flashdata('notifsukses', 'Kriteria baru berhasil ditambahkan!');
		$this->MainModel->input_data($data, 'kriteria');
		redirect(base_url('dashboard/kriteria'));
	}
	public function aksi_hapus_kriteria()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			$where = array('id_kriteria' => $id);
			$this->MainModel->deleteData('kriteria', $where);
			redirect(base_url('dashboard/kriteria'));
		} else redirect(base_url('auth'));
	}
	public function edit_kriteria()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			if ($id != null) {
				$where = array('id_kriteria' => $id);
				$data['kriteria'] = $this->MainModel->tampilOfKriteria($where)->result();
				$this->load->view('edit_kriteria', $data);
			} else redirect(base_url('dashboard/kriteria'));
		} else redirect(base_url('auth'));
	}
	public function update_kriteria()
	{
		$nama = $this->input->post('nama');
		$atribut = $this->input->post('atribut');
		$id_kriteria = $this->input->post('id_kriteria');
		$data = array(
			'nama_kriteria' => $nama,
			'atribut' => $atribut
		);
		$this->MainModel->updateData($data, 'kriteria', array('id_kriteria' => $id_kriteria));
		redirect(base_url('dashboard/kriteria'));
	}
	public function alternatif()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['keputusan'] = $this->MainModel->tampilKeputusan($where)->result();
			$data['alternatif'] = $this->MainModel->tampilAlternatif($this->session->userdata('id_user'));
			$this->load->view('alternatif', $data);
		} else redirect(base_url('dashboard'));
	}
	public function aksi_tambah_alternatif()
	{
		$nama = $this->input->post('nama');
		$nisn = $this->input->post('nisn');
		$jk = $this->input->post('jk');
		$tanggalLahir = $this->input->post('tanggalLahir');
		$Kelas = $this->input->post('Kelas');
		$Jurusan = $this->input->post('Jurusan');
		$th = $this->input->post('th');
		$id_keputusan = $this->input->post('id_keputusan');
		$id_user = $this->session->userdata('id_user');
		$where = array('id_keputusan' => $this->input->post('id_keputusan'));
		$jumlah = $this->MainModel->tampil_jumlah($where, 'alternatif');

		$data = array(
			'nama_alternatif' => $nama,
			'nisn_alternatif' => $nisn,
			'jk_alternatif' => $jk,
			'tglLahir_alternatif' => $tanggalLahir,
			'kelas_alternatif' => $Kelas,
			'jurusan_alternatif' => $Jurusan,
			'tahunMasuk_alternatif' => $th,
			'kd_alternatif' => $jumlah + 1,
			'id_keputusan' => $id_keputusan,
			'id_user' => $id_user
		);
		$this->session->set_flashdata('notifsukses', 'Alternatif baru berhasil ditambahkan!');
		$this->MainModel->input_data($data, 'alternatif');
		redirect(base_url('dashboard/alternatif'));
	}
	public function aksi_hapus_alternatif()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			$where = array('id_alternatif' => $id);
			$this->MainModel->deleteData('alternatif', $where);
			redirect(base_url('dashboard/alternatif'));
		} else redirect(base_url('auth'));
	}
	public function edit_alternatif()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			if ($id != null) {
				$where = array('id_alternatif' => $id);
				$data['alternatif'] = $this->MainModel->tampilOfAlternatif($where)->result();
				$this->load->view('edit_alternatif', $data);
			} else redirect(base_url('dashboard/alternatif'));
		} else redirect(base_url('auth'));
	}
	public function update_alternatif()
	{
		$nama = $this->input->post('nama');
		$nisn = $this->input->post('nisn');
		$jk = $this->input->post('jk');
		$tanggalLahir = $this->input->post('tanggalLahir');
		$Kelas = $this->input->post('Kelas');
		$Jurusan = $this->input->post('Jurusan');
		$th = $this->input->post('th');
		$id_alternatif = $this->input->post('id_alternatif');
		$data = array(
			'nama_alternatif' => $nama,
			'nisn_alternatif' => $nisn, 'jk_alternatif' => $jk,
			'tglLahir_alternatif' => $tanggalLahir,
			'kelas_alternatif' => $Kelas,
			'jurusan_alternatif' => $Jurusan,
			'tahunMasuk_alternatif' => $th,
		);
		$this->MainModel->updateData($data, 'alternatif', array('id_alternatif' => $id_alternatif));
		redirect(base_url('dashboard/alternatif'));
	}
	public function update_profile()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$pass = empty($pass) || is_null($pass) ? '' : md5($pass);
		$email = $this->input->post('email');
		$user = $this->input->post('user');
		$role = $this->input->post('role');
		$id_user = $this->input->post('id_user');
		$data = array(
			'nama_user' => $user,
			'username' => $username,
			'password' => $pass,
			'email' => $email,
			'peran' => $role,
		);
		$data = array_filter($data);
		$this->MainModel->updateData($data, 'user', array('id_user' => $id_user));
		redirect(base_url('auth/keluar'));
	}
	public function hitungkriteria()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['jum_kriteria'] = $this->MainModel->tampil_jumlah($where, 'kriteria');
			$data['jum_alternatif'] = $this->MainModel->tampil_jumlah($where, 'alternatif');
			$data['keputusan'] = $this->MainModel->tampilKeputusan($where)->result();
			$this->load->view('h_kriteria', $data);
		} else redirect(base_url('dashboard'));
	}
	public function input_raspri()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_keputusan' => $this->input->post('id_keputusan'));
			$data['kriteria'] = $this->MainModel->tampilOfKriteria($where)->result();
			$this->load->view('h_raspri', $data);
		} else redirect(base_url('dashboard'));
	}
	public function aksi_hitung_bobot()
	{
		if ($this->session->userdata('status') == 'login') {
			$jumlah = $this->input->post('jumlah_kriteria');
			$id = $this->input->post('id_kriteria');
			//Memasukkan data kedalam array
			$tabel1 = array();
			for ($j = 1; $j <= $jumlah; $j++) {
				for ($i = 1; $i <= $jumlah; $i++) $tabel1[$j][$i] = $_POST['k' . $j . $i];
			}
			//Menginisiasi data ke dalam variabel c sesuai letak (atas ke bawah)
			for ($i = 1; $i <= $jumlah; $i++) {
				$pref = 'c';
				${$pref . $i} = $i;
				${'c' . $i} = array();
				for ($j = 1; $j <= $jumlah; $j++) {
					${'c' . $i}[$j] = $tabel1[$i][$j];
				}
				//Menghitung jumlah variabel c
				$pref = 'sumc';
				${$pref . $i} = $i;
				${'sumc' . $i} = array_sum(${'c' . $i});
			}
			//Menghitung Normalisasi untuk setiap tata letak
			for ($j = 1; $j <= $jumlah; $j++) {
				for ($i = 1; $i <= $jumlah; $i++) {
					$pref = 'nrm';
					${$pref . $j . $i} = $tabel1[$j][$i] / ${'sumc' . $j};
				}
			}
			//Memasukkan data Normalisasi ke dalam variabel d sesuai tata letak
			for ($j = 1; $j <= $jumlah; $j++) {
				$pref = 'd';
				${$pref . $j} = $j;
				${'d' . $j} = array();
				for ($i = 1; $i <= $jumlah; $i++) {
					${'d' . $j}[$i] = ${'nrm' . $j . $i};
				}
			}
			// Mengubah tata letak, memasukkan kedalam tabel baru
			$tabel2 = array();
			for ($j = 1; $j <= $jumlah; $j++) {
				for ($i = 1; $i <= $jumlah; $i++) $tabel2[$j][$i] = ${'d' . $i}[$j];
			}
			// Menghitung jumlah tabel2
			for ($j = 1; $j <= $jumlah; $j++) {
				$pref = 'jumtb2';
				${$pref . $j} = $j;
				${'jumtb2' . $j} = array();
				for ($i = 1; $i <= $jumlah; $i++) {
					${'jumtb2' . $j} = array_sum($tabel2[$j]);
				}
				// Menghitung rata-rata
				$pref = 'rerata';
				${$pref . $j} = $j;
				${'rerata' . $j} = ${'jumtb2' . $j} / $jumlah;
			}
			$rata = array();
			for ($j = 1; $j <= $jumlah; $j++) $rata[$j] = ${'rerata' . $j};
			for ($i = 1; $i <= $jumlah; $i++) {
				$data = array('bobot_kriteria' => $rata[$i]);
				$where = array('kd_kriteria' => $i, 'id_keputusan' => $this->input->post('id_keputusan'));
				$this->MainModel->updateData($data, 'kriteria', $where);
			}
			$data2 = array('status' => 'terisi', 'konsis' => 'konsisten');
			$this->MainModel->updateData($data2, 'pendukung_keputusan', array('id_keputusan' => $this->input->post('id_keputusan')));
			redirect(base_url('dashboard/hitungkriteria'));
		} else redirect(base_url('dashboard'));
	}
	public function hitungalternatif()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['jum_kriteria'] = $this->MainModel->tampil_jumlah($where, 'kriteria');
			$data['jum_alternatif'] = $this->MainModel->tampil_jumlah($where, 'alternatif');
			$data['keputusan'] = $this->MainModel->tampilKeputusan(array('id_user' => $this->session->userdata('id_user'), 'status' => 'terisi'))->result();
			$this->load->view('h_alternatif', $data);
		} else redirect(base_url('dashboard'));
	}
	public function laporan()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_user' => $this->session->userdata('id_user'));
			$data['jum_kriteria'] = $this->MainModel->tampil_jumlah($where, 'kriteria');
			$data['jum_alternatif'] = $this->MainModel->tampil_jumlah($where, 'alternatif');
			$data['keputusan'] = $this->MainModel->tampilKeputusan(array('id_user' => $this->session->userdata('id_user'), 'status' => 'terisi'))->result();
			$this->load->view('laporan', $data);
		} else redirect(base_url('dashboard'));
	}
	public function input_alternatif_kriteria()
	{
		if ($this->session->userdata('status') == 'login') {
			$where = array('id_keputusan' => $this->input->post('id_keputusan'));
			$data['alternatif'] = $this->MainModel->tampilOfAlternatif($where)->result();
			$data['kriteria'] = $this->MainModel->tampilOfKriteria($where)->result();
			$this->load->view('h_inputnilal', $data);
		} else redirect(base_url('dashboard'));
	}
	public function aksi_hitung_alkri()
	{
		if ($this->session->userdata('status') == 'login') {
			$jum_kriteria = $this->MainModel->tampil_jumlah('id_keputusan = ' . $this->input->post('id_keputusan'), 'kriteria');
			$jum_alternatif = $this->MainModel->tampil_jumlah('id_keputusan = ' . $this->input->post('id_keputusan'), 'alternatif');
			$where = array('id_keputusan' => $this->input->post('id_keputusan'));
			$dataKrit = $this->MainModel->tampilOfKriteria($where)->result();
			$dataAlte = $this->MainModel->tampilOfAlternatif($where)->result();
			//Memasukkan data kedalam array
			$matrik1 = array();
			for ($j = 1; $j <= $jum_alternatif; $j++) {
				for ($i = 1; $i <= $jum_kriteria; $i++) $matrik1[$j][$i] = $_POST['a' . $j . $i];
			}
			//Menginisiasi data ke dalam variabel C sesuai letak
			for ($i = 1; $i <= $jum_kriteria; $i++) {
				$pref = 'c';
				${$pref . $i} = $i;
				${'c' . $i} = array();
				for ($j = 1; $j <= $jum_alternatif; $j++) {
					${'c' . $i}[$j] = $matrik1[$j][$i];
				}
				//Menghitung nilai maksimal dan minimal
				$pref = 'max';
				${$pref . $i} = $i;
				${'max' . $i} = max(${'c' . $i});

				$pref = 'min';
				${$pref . $i} = $i;
				${'min' . $i} = min(${'c' . $i});
			}
			//Menghitung Normalisasi untuk setiap tata letak
			for ($j = 1; $j <= $jum_alternatif; $j++) {
				$i = 0;
				foreach ($dataKrit as $dk1) {
					$i++;
					$pref = 'nrm';
					if ($dk1->atribut == 'keuntungan') {
						${$pref . $j . $i} = $matrik1[$j][$i] / ${'max' . $i}; //Rumus normalisasi untuk keuntungan

					} else {
						${$pref . $j . $i} = ${'min' . $i} / $matrik1[$j][$i]; //Rumus normalisasi untuk biaya

					}
				}
			}
			$pref = 'v';
			for ($j = 1; $j <= $jum_alternatif; $j++) {
				$temp = 0;
				$i = 0;
				foreach ($dataKrit as $dk2) {
					$i++;
					$temp = $temp + ($dk2->bobot_kriteria * ${'nrm' . $j . $i}); //Rumus menghitung pembobotan
					${'v' . $j} = $temp;
				}
			}
			$hasil = array();
			for ($j = 1; $j <= $jum_alternatif; $j++) $hasil[$j] = ${'v' . $j};
			for ($i = 1; $i <= $jum_alternatif; $i++) {
				$data = array('nilai_alternatif' => $hasil[$i]);
				$where = array('kd_alternatif' => $i, 'id_keputusan' => $this->input->post('id_keputusan'));
				$this->MainModel->updateData($data, 'alternatif', $where);
			}
			redirect(base_url('dashboard/hitungalternatif'));
		} else redirect(base_url('dashboard'));
	}
	public function detail_alternatif()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			if ($id != null) {
				$where = array('id_keputusan' => $id);
				$data['alternatif'] = $this->MainModel->tampilOfAlternatif($where)->result();
				$this->load->view('detail_alternatif', $data);
			} else redirect(base_url('dashboard/hitungalternatif'));
		} else redirect(base_url('auth'));
	}
	public function detail_kriteria()
	{
		if ($this->session->userdata('status') == 'login') {
			$id = $this->uri->segment(3);
			if ($id != null) {
				$where = array('id_keputusan'	=> $id);
				$data['kriteria'] = $this->MainModel->tampilOfKriteria($where)->result();
				$this->load->view('detail_kriteria', $data);
			} else redirect(base_url('dashboard/hitungkriteria'));
		} else redirect(base_url('auth'));
	}
}
