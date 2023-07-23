<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanBukuTamuDilan extends CI_Controller {
	function __construct() {
        parent::__construct();
        //if($this->session->userdata('status_login')==FALSE){ redirect('keluar'); }
        //if(!in_array($this->session->userdata('group_id'), $this->session->userdata('kewenangan_bukutamu'))) { redirect('keluar'); }
        $this->load->model('ModelBukuTamuDilan','model');
		//$queryCek = $this->model->get_seleksi('sys_user_online','id',$this->session->userdata('login_id'));
		//if(($queryCek->row()->host_address!=$this->input->ip_address())&&($queryCek->row()->userid!=$this->session->userdata('userid'))&&($queryCek->row()->user_agent!=$this->input->user_agent())) { redirect('keluar'); }
    }

	public function index(){
		$data['id'] = base64_encode($this->encrypt->encode('-1'));
		$this->load->view('header');
		$this->load->view('bukutamudilan/index',$data);
		$this->load->view('footer');	
	}


	public function bukutamudilan_data(){
		$query = $this->model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($query as $row) {
			$no++;
			$UserData = array();
			$UserData[] = "<div align='center'>".$no."</div>";
			$UserData[] = $this->tanggalhelper->convertDayDate($row->tanggal);
			$UserData[] = '<b>'.$row->tujuan_jabatan.'</b><br/>'.$row->tujuan_nama;
			$UserData[] = $row->nama;
			$UserData[] = $row->alamat;
			if(!empty($row->status)){
				$UserData[] = "<div align='center'>".($row->status==1 ? 'Diterima' : 'Tidak')."</div>";
			} else {
				$UserData[] = "";
			}
			$UserData[] = '<div align="center">
					<div class="input-group-btn">
	                	<ul class="dropdown-menu pull-right">
	                    	<li><a href="#" onclick="BukaModalDetil(\''.base64_encode($this->encrypt->encode($row->id)).'\')">Detil</a></li>
							
	                    	<li><a href="#" onclick="BukaModal(\''.base64_encode($this->encrypt->encode($row->id)).'\')">Edit Register</a></li>
							
	                    	<li><a href="#" onclick="BukaModalUpload(\''.base64_encode($this->encrypt->encode($row->id)).'\')">Dokumen Elektronik</a></li>
							
							<li><a href="#" onclick="BukaModalUpload1(\''.base64_encode($this->encrypt->encode($row->id)).'\')">Foto Pengunjung</a></li>
							
							<li><a href="#" onclick="BukaModalUpload(\''.base64_encode($this->encrypt->encode($row->id)).'\')">Foto Id</a></li>
							
	                    	<li><a href="#" onclick="CetakFormulir(\''.base64_encode($this->encrypt->encode($row->id)).'\')">Cetak Formulir</a></li>
	                    </ul>
	                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
	                    <span class="caret"></span>
	                    </button>
	             	</div>
				</div>';
			$data[] = $UserData;
		}

		$json_data = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->model->count_all(),
				"recordsFiltered" => $this->model->count_filtered(),
				"data" => $data,
				);
		echo json_encode($json_data);
	}


	public function bukutamudilan_periode_cetak(){
		$this->form_validation->set_rules('id', 'ID Register', 'trim|required');
		if ($this->form_validation->run() == FALSE){ echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi')); return; }

		if($this->encrypt->decode(base64_decode($this->input->post('id')))!='-1'){ echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi')); return; }
		
		$queryRegister = $this->model->get_data('v_tahun_bukutamu');
		$array_tahun = array();
		$array_tahun['']= "Pilih";
		foreach ($queryRegister->result() as $row){ 
			$arrayTahunRegister[$row->tahun_register] = $row->tahun_register; 
		}

		$arrayBulanRegister = array('' => 'Pilih',
						'01' => 'Januari',
						'02' => 'Februari',
						'03' => 'Maret',
						'04' => 'April',
						'05' => 'Mei',
						'06' => 'Juni',
						'07' => 'Juli',
						'08' => 'Agustus',
						'09' => 'September',
						'10' => 'Oktober',
						'11' => 'November',
						'12' => 'Desember');
		
		$bulan_register = form_dropdown('bulan_register_periode', $arrayBulanRegister,'', 'class="form-control" id="bulan_register_periode"');
		$tahun_register = form_dropdown('tahun_register_periode', $arrayTahunRegister,'', 'class="form-control" id="tahun_register_periode"');

		echo json_encode(array('st'=>1, 'bulan_register'=>$bulan_register, 'tahun_register'=>$tahun_register));
		return;

	}


	public function bukutamudilan_register_cetak(){
		$this->form_validation->set_rules('bulan_register_periode', 'Periode Bulan Register', 'trim|required');
		$this->form_validation->set_rules('tahun_register_periode', 'Periode Tahun Register', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Tidak Berhasil:<br/>'.validation_errors()));
			return;
		}

		$bulan_register_periode= $this->input->post('bulan_register_periode');
		$tahun_register_periode= $this->input->post('tahun_register_periode');

		$periode = $tahun_register_periode.'-'.$bulan_register_periode;

		$bulan_lengkap = strtoupper($this->tanggalhelper->monthNameFull($bulan_register_periode));

		$queryRegister = $this->model->get_register_cetak($periode);
		$dataRegister = "";
		$a = 0;
		foreach ($queryRegister->result() as $row){ $a++;
			$dataRegister .= "<tr>";
			$dataRegister .= "<td><div align='center'>".$a."</div></td>";
			$dataRegister .= "<td>".$row->nomor_register."</td>";
			$dataRegister .= "<td><div align='center'>".$this->tanggalhelper->convertToInputDate($row->tanggal)."</div></td>";
			$dataRegister .= "<td>".$row->nama."</td>";
			$dataRegister .= "<td>".$row->alamat."</td>";
			$dataRegister .= "<td>".$row->keperluan."</td>";
			$dataRegister .= "<td>".$row->tujuan_jabatan."<br/>".$row->tujuan_nama."</td>";
			$dataRegister .= "</tr>"; 
		}
		$register = $dataRegister;

		echo json_encode(array('st'=>1, 'register'=>$register,'bulan'=>$bulan_lengkap, 'tahun'=>$tahun_register_periode ));
	}


	public function bukutamudilan_pencarian(){
		$this->form_validation->set_rules('id', 'ID Register', 'trim|required');
		if ($this->form_validation->run() == FALSE){ echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi')); return; }

		if($this->encrypt->decode(base64_decode($this->input->post('id')))!='-1'){ echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi')); return; }

		$queryJabatan = $this->model->get_data('v_groups');
		$array_jabatan = array();
		$array_jabatan['']= "Pilih";
		foreach ($queryJabatan->result() as $row){ 
			$array_jabatan[$row->group_id] = $row->group_name; 
		}


		$arrayBulanRegister = array('' => 'Pilih',
						'01' => 'Januari',
						'02' => 'Februari',
						'03' => 'Maret',
						'04' => 'April',
						'05' => 'Mei',
						'06' => 'Juni',
						'07' => 'Juli',
						'08' => 'Agustus',
						'09' => 'September',
						'10' => 'Oktober',
						'11' => 'November',
						'12' => 'Desember');


		$queryRegister = $this->model->get_data('v_tahun_bukutamu');
		$array_tahun = array();
		$array_tahun['']= "Pilih";
		foreach ($queryRegister->result() as $row){ 
			$array_tahun[$row->tahun_register] = $row->tahun_register; 
		}

		$bulan_register = form_dropdown('bulan_register_cari', $arrayBulanRegister,'', 'class="form-control" id="bulan_register_cari"');
		$tahun_register = form_dropdown('tahun_register_cari', $array_tahun,'', 'class="form-control" id="tahun_register_cari"');
		$jabatan = form_dropdown('jabatan_cari', $array_jabatan,'', 'class="form-control" id="jabatan_cari"');

		echo json_encode(array('st'=>1,
					'bulan_register'=>$bulan_register,
					'tahun_register'=>$tahun_register,
					'jabatan'=>$jabatan
				));
		return;
	}






	public function bukutamudilan_cetak(){
		$this->form_validation->set_rules('id','', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id')));

		$queryRegister = $this->model->get_seleksi('bukutamu','id',$id);
		$tujuan_jabatan = $queryRegister->row()->tujuan_jabatan.' - '.$queryRegister->row()->tujuan_nama;
		$tanggal = $this->tanggalhelper->convertDayDate($queryRegister->row()->tanggal);
		$nama = $queryRegister->row()->nama;
		$alamat = $queryRegister->row()->alamat;
		$keperluan = $queryRegister->row()->keperluan;
		$nomor_register = $queryRegister->row()->nomor_register;
		$Foto_p1 = '<div align="center"><img src="dokumenfoto/'.$queryRegister->row()->Foto_p.'" width="100" height="145"></div>';

		$queryKonfigurasi1 = $this->model->get_seleksi('sys_config','id','4');
		$queryKonfigurasi2 = $this->model->get_seleksi('sys_config','id','22');
		$queryKonfigurasi3 = $this->model->get_seleksi('sys_config','id','5');
		$namaPengadilan = $queryKonfigurasi1->row()->value;
		$logoPengadilan = $queryKonfigurasi2->row()->value;
		$alamat_pengadilan = $queryKonfigurasi3->row()->value;

		
		echo json_encode(array('st'=>1,
					'namaPengadilan'=>$namaPengadilan,
					'logoPengadilan'=>$logoPengadilan,
					'alamat_pengadilan'=>$alamat_pengadilan,
					'tujuan_jabatan'=>$tujuan_jabatan,
					'tanggal'=>$tanggal,
					'nomor_register'=>$nomor_register,
					'nama'=>$nama,
					'alamat'=>$alamat,
					'Foto_p1'=>$Foto_p1,
					'keperluan'=>$keperluan));
		return;


	}


	public function bukutamudilan_dokumen_simpan(){
		$this->form_validation->set_rules('id_dokumenelektronik','', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Anda Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id_dokumenelektronik')));

		$upload_data = "";
		
		if(!empty($_FILES['dokumen']['name'])){
			$config = array(
				'upload_path' => './docidcard/',
				'allowed_types' => "jpg",
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE,
				'overwrite' => FALSE,
				'remove_spaces' => TRUE,
				'max_size' => "10485760"
			);

			$this->load->library('upload',$config);
            $this->upload->initialize($config);

            $this->upload->do_upload('dokumen');
            $upload_data = $this->upload->data();     		
		}
		$upload_data1 = "";
		if(!empty($_FILES['foto']['name'])){
			$config1 = array(
				'upload_path' => './dokumenfoto/',
				'allowed_types' => "jpg",
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE,
				'overwrite' => FALSE,
				'remove_spaces' => TRUE,
				'max_size' => "10485760"
			);

			$this->load->library('upload',$config1);
            $this->upload->initialize($config1);

            $this->upload->do_upload('foto');
            $upload_data1 = $this->upload->data();     		
		}
		
		$data = array('Foto_p' => $upload_data1['file_name'],'Id_card' => $upload_data['file_name'],'diperbaharui_oleh' => $this->session->userdata('username'),'diperbaharui_tanggal' => date("Y-m-d h:i:s",time()) );
		$querySimpan = $this->model->pembaharuan_data('bukutamu',$data,'id',$id);
		redirect('bukutamu');
	}
	
	//foto
	
	public function bukutamudilan_dokumen_simpan1(){
		$this->form_validation->set_rules('id_1','', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Anda Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id_1')));

		$upload_data = "";
		if(!empty($_FILES['dokumen_1']['name'])){
			$config = array(
				'upload_path' => './dokumenfoto/',
				'allowed_types' => "jpg",
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE,
				'overwrite' => FALSE,
				'remove_spaces' => TRUE,
				'max_size' => "10485760"
			);

			$this->load->library('upload',$config);
            $this->upload->initialize($config);

            $this->upload->do_upload('dokumen');
            $upload_data = $this->upload->data();     		
		}

		$data = array('dokumen' => $upload_data['file_name'],'diperbaharui_oleh' => $this->session->userdata('username'),'diperbaharui_tanggal' => date("Y-m-d h:i:s",time()) );
		$querySimpan = $this->model->pembaharuan_data('bukutamu',$data,'id',$id);
		redirect('bukutamu');
	}
	
	
	


	public function bukutamudilan_modal_upload(){
		$this->form_validation->set_rules('id','', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Anda Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id')));

		$queryRegister = $this->model->get_seleksi('bukutamu','id',$id);
		$cekRegister = $queryRegister->num_rows();
		if($cekRegister==0){
			echo json_encode(array('st'=>0,'msg'=>'Anda Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		} else {
			$nama = $queryRegister->row()->nama;
			echo json_encode(array('st'=>1,'nama'=>$nama,'id'=>base64_encode($this->encrypt->encode($id))));
			return;
		}
	}
	
	//foto
	public function bukutamudilan_modal_upload1(){
		$this->form_validation->set_rules('id','', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Anda Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id')));

		$queryRegister = $this->model->get_seleksi('bukutamu','id',$id);
		$cekRegister = $queryRegister->num_rows();
		if($cekRegister==0){
			echo json_encode(array('st'=>0,'msg'=>'Anda Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		} else {
			$nama = $queryRegister->row()->nama;
			echo json_encode(array('st'=>1,'nama'=>$nama,'id'=>base64_encode($this->encrypt->encode($id))));
			return;
		}
	}
	
	

	public function bukutamudilan_hapus(){
		$this->form_validation->set_rules('id','', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id')));

		$queryRegister = $this->model->get_seleksi_bukutamu($id);
		$cekRegister = $queryRegister->num_rows();
		if($cekRegister==0){
			echo json_encode(array('st'=>0,'msg'=>'Data Pencatatan Register Tidak Ditemukan'));
		} else {
			$nama = $queryRegister->row()->nama;
			$queryHapus = $this->model->hapus_data('bukutamu','id',$id);
			if($queryHapus==1){
				echo json_encode(array('st'=>1,'msg'=>'Pencatatan Register Buku Tamu atas nama '.$nama.' <b>BERHASIL DIHAPUS</b>'));
			} else {
				echo json_encode(array('st'=>0,'msg'=>'Pencatatan Register Buku Tamu atas nama '.$nama.' <b>GAGAL DIHAPUS</b>'));
			}
			return;
		}
	}


	public function bukutamudilan_detil(){
		$this->form_validation->set_rules('id', '', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id')));

		$queryRegister = $this->model->get_seleksi_bukutamu($id);
		$tujuan_jabatan = $queryRegister->row()->tujuan_jabatan.' - '.$queryRegister->row()->tujuan_nama;
		$tanggal = $this->tanggalhelper->convertDayDate($queryRegister->row()->tanggal);
		$nama = $queryRegister->row()->nama;
		$alamat = $queryRegister->row()->alamat;
		$telepon = $queryRegister->row()->telepon;
		$keperluan = $queryRegister->row()->keperluan;
		$status = ($queryRegister->row()->status==1 ? 'Diterima' : 'Tidak');
		$dokumen = $queryRegister->row()->dokumen;
		//$Foto_p = $queryRegister->row()->Foto_p;
		//$Id_card = $queryRegister->row()->Id_card;
		
		$Foto_p = '<div align="center"><img src="dokumenfoto/'.$queryRegister->row()->Foto_p.'" width="100" height="145"></div>';
		
		$Id_card = '<div align="center"><img src="docidcard/'.$queryRegister->row()->Id_card.'" width="100" height="145"></div>';
		
		
		if(!empty($dokumen)){
			$TampilDokumenElektronik = '<object id="pdf" height="1024px" width="100%" type="application/pdf" data="'.base_url().'dokumenbukutamu/'.$dokumen.'"></object>';
		} else {
			$TampilDokumenElektronik = '<span align="center">Dokumen Elektronik Tidak Tersedia</span>';
		}

		$judul = "DETIL SURAT MASUK";

		$TombolHapus = '<button onclick="HapusBukuTamu(\''.base64_encode($this->encrypt->encode($id)).'\')" data-dismiss="modal" class="btn btn-sm btn-danger">Hapus</button>';

		echo json_encode(array('st'=>1,
					'id'=>base64_encode($this->encrypt->encode($id)),
					'tujuan_jabatan'=>$tujuan_jabatan,
					'tanggal'=>$tanggal,
					'judul'=>$judul,
					'nama'=>$nama,
					'alamat'=>$alamat,
					'telepon'=>$telepon,
					'keperluan'=>$keperluan,
					'status'=>$status,
					'Foto_p'=>$Foto_p,
					'Id_card'=>$Id_card,
					'TombolHapus'=>$TombolHapus,
					'TampilDokumenElektronik'=>$TampilDokumenElektronik));
		return;
	}


	public function bukutamudilan_nomoragenda(){
		$this->form_validation->set_rules('tanggal_register', 'Tanggal Register', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$tanggal_register = $this->tanggalhelper->convertToMysqlDate($this->input->post('tanggal_register'));
		$tahun_register = date("Y", strtotime($tanggal_register));

		$queryNomorIndex = $this->model->get_seleksi_nomor_index($tahun_register);
		$nomor_index = (!empty($queryNomorIndex->row()->nomor_index) ? $queryNomorIndex->row()->nomor_index+1 : '1');

		$nomor_register = $nomor_index.'/'.$tahun_register;

		echo json_encode(array('st'=>1,
					'nomor_index'=>$nomor_index,
					'tahun_register'=>$tahun_register,
					'nomor_register'=>$nomor_register));
		return;

	}


	public function bukutamudilan_add(){
		$this->form_validation->set_rules('id', '', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id')));
		

		$queryGroup= $this->model->get_kewenangan();
		$group = array();
		$group['']= "Pilih";
		foreach ($queryGroup->result() as $row){ 
			$group[$row->group_id] = $row->group_name; 
		}

		$array_status = array(''=>"Pilih",'1'=>'Diterima','2'=>'Tidak Diterima');
		$array_generate_nomor = array('1' => 'Ya', '2' => 'Tidak');
		$tahun_register = date("Y");
		

	  	if ($id=='-1'){
	  		
			$tujuan_jabatan = "";
			$tujuan_nama = "";
			$tanggal = "";
			$nama = "";
			$alamat = "";
			$telepon = "";
			$keperluan = "";
			$status = "";
			$hapus = "";
			$pegawai= "";
			$tujuan_jabatan_id = "";

			$queryNomorIndex = $this->model->get_seleksi_nomor_index($tahun_register);
			$nomor_index = (!empty($queryNomorIndex->row()->nomor_index) ? $queryNomorIndex->row()->nomor_index+1 : '1');

			$nomor_register = $nomor_index.'/'.$tahun_register;

			$judul = "TAMBAH BUKU TAMU";
			$tanggal = date("d/m/Y");
		  	$jabatan = form_dropdown('group', $group,'', 'class="form-control" required id="group" onChange="CariPegawai()"');	
		  	$status = form_dropdown('status', $array_status,'', 'class="form-control" required id="status"');    	
		  	$generate_nomor = form_dropdown('generate_nomor', $array_generate_nomor,'', 'class="form-control" required onChange="GantiGenerateNomor()" id="generate_nomor"');	

		} else {
			$judul = "EDIT BUKU TAMU";
			$queryBukuTamu = $this->model->get_seleksi_bukutamu($id);
			$tujuan_nama_id = $queryBukuTamu->row()->tujuan_nama_id;
			$tujuan_nama = $queryBukuTamu->row()->tujuan_nama;
			$tujuan_jabatan_id = $queryBukuTamu->row()->tujuan_jabatan_id;
			$tujuan_jabatan = $queryBukuTamu->row()->tujuan_jabatan;
			$tujuan_nama = $queryBukuTamu->row()->tujuan_nama;
			$tanggal = $this->tanggalhelper->convertToInputDate($queryBukuTamu->row()->tanggal);
			$nama = $queryBukuTamu->row()->nama;
			$alamat = $queryBukuTamu->row()->alamat;
			$telepon = $queryBukuTamu->row()->telepon;
			$keperluan = $queryBukuTamu->row()->keperluan;
			$nomor_register = $queryBukuTamu->row()->nomor_register;
			$nomor_index = $queryBukuTamu->row()->nomor_index;
			

			$queryPegawai = $this->model->get_seleksi('pegawai','jabatan_id',$tujuan_jabatan_id);
			$pegawai = array();
			$pegawai['']= "Pilih";
			foreach ($queryPegawai->result() as $row){ 
				$pegawai[$row->id] = $row->nama_gelar; 
			}

			$pegawai= form_dropdown('pegawai', $pegawai,$tujuan_nama_id, 'class="form-control" required id="pegawai"');
			$jabatan= form_dropdown('group', $group, $tujuan_jabatan_id, 'class="form-control" required id="group" onChange="CariPegawai()"');
	        $status = form_dropdown('status', $array_status,$queryBukuTamu->row()->status, 'class="form-control" required id="status"');
	        $hapus = '<button onclick="HapusModal(\''.base64_encode($this->encrypt->encode($id)).'\')" data-dismiss="modal" class="btn btn-sm btn-danger">Hapus</button>';
	        $generate_nomor = form_dropdown('generate_nomor', $array_generate_nomor,'', 'class="form-control" required onChange="GantiGenerateNomor()" id="generate_nomor"');
		}
		echo json_encode(array('st'=>1,
					'id'=>base64_encode($this->encrypt->encode($id)),
					'generate_nomor'=>$generate_nomor,
					'nomor_register'=>$nomor_register,
					'nomor_index'=>$nomor_index,
					'tahun_register'=>$tahun_register,
					'tujuan_jabatan'=>$tujuan_jabatan, 
					'tujuan_nama'=>$tujuan_nama,
					'tanggal'=>$tanggal,
					'nama'=>$nama,
					'alamat'=>$alamat,
					'telepon'=>$telepon,
					'keperluan'=>$keperluan,
					'jabatan'=>$jabatan,
					'tujuan_jabatan_id'=>$tujuan_jabatan_id,
					'pegawai'=>$pegawai,
					'hapus'=>$hapus,
					'status'=>$status,
					'judul'=>$judul));
		return;
	}


	public function bukutamudilan_pegawai(){
		$this->form_validation->set_rules('jabatan', 'Jabatan Pegawai', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Anda Dilarang Melakukan Akses Langsung Ke Aplikasi'));
			return;
		}

		$jabatan_id = $this->input->post('jabatan');
		$queryPegawai = $this->model->get_seleksi('pegawai','jabatan_id',$jabatan_id);
		$pegawai = array();
		$pegawai['']= "Pilih";
		foreach ($queryPegawai->result() as $row){ 
			$pegawai[$row->id] = $row->nama_gelar; 
		}

		$pegawai= form_dropdown('pegawai', $pegawai,'', 'class="form-control" required id="pegawai"');

		echo json_encode(array('st'=>1,'pegawai'=>$pegawai));
		return;
	}



	public function bukutamudilan_simpan(){
		$this->form_validation->set_rules('id', 'ID Buku Tamu', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Menghadap', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Tamu', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('alamat', 'Alamat Tamu', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon Tamu', 'trim|max_length[20]|integer');
		$this->form_validation->set_rules('alasan', 'Alasan Menghadap', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Tujuan Menghadap', 'trim|required');
		$this->form_validation->set_rules('pegawai', 'Pegawai', 'trim|required|integer');
		$this->form_validation->set_rules('generate_nomor', 'Status Generate Nomor Register', 'trim|required|integer');
		$this->form_validation->set_rules('nomor_agenda', 'Nomor Register', 'trim|required');
		$this->form_validation->set_rules('nomor_index_manual', 'Nomor Register Manual', 'trim|required|integer');
		$this->form_validation->set_rules('kode_nomor_manual', 'Tahun Register Manual', 'trim|required|integer');
		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('st'=>0,'msg'=>'Tidak Berhasil:<br/>'.validation_errors()));
			return;
		}

		$id = $this->encrypt->decode(base64_decode($this->input->post('id')));
		$tanggal= $this->tanggalhelper->convertToMysqlDate($this->input->post('tanggal'));
		$nama= $this->input->post('nama');
		$alamat= $this->input->post('alamat');
		$telepon= $this->input->post('telepon');
		$alasan= $this->input->post('alasan');
		$jabatan_id= $this->input->post('jabatan');
		$pegawai_id= $this->input->post('pegawai');

		$generate_nomor= $this->input->post('generate_nomor');
		$nomor_index_manual= $this->input->post('nomor_index_manual');
		if($generate_nomor==1){
			$nomor_index = $nomor_index_manual;
			$nomor_register= $this->input->post('nomor_agenda');
		} else {
			$kode_nomor_manual= $this->input->post('kode_nomor_manual');
			$nomor_register = $nomor_index_manual.'/'.$kode_nomor_manual;
			$nomor_index = $nomor_index_manual;
		}

		$queryJabatan = $this->model->get_seleksi('sys_groups','groupid',$jabatan_id);
		$namaJabatan = $queryJabatan->row()->name;

		$queryPegawai = $this->model->get_seleksi('pegawai','id',$pegawai_id);
		$namaPegawai = $queryPegawai->row()->nama_gelar;

		if($id=='-1'){
			$data = array('tujuan_nama_id' => $pegawai_id,
						'tujuan_nama' => $namaPegawai,
						'nomor_index' => $nomor_index,
						'nomor_register' => $nomor_register,
						'tujuan_jabatan_id' => $jabatan_id,
						'tujuan_jabatan' => $namaJabatan,
						'tanggal' => $tanggal,
						'nama' => $nama,
						'alamat' => $alamat,
						'telepon' => $telepon,
						'keperluan' => $alasan,
						'diinput_oleh' => $this->session->userdata('username'),
						'diinput_tanggal' => date("Y-m-d h:i:s",time()),
						'id_layanan' => '1'
						);
						

			$querySimpan = $this->model->simpan_data('bukutamu',$data);
			if($querySimpan==1){
				echo json_encode(array('st'=>1,'msg'=>'Pencatatan Buku Tamu atas Nama '.$nama.' <b>BERHASIL DISIMPAN</b>'));
			} else {
				echo json_encode(array('st'=>0,'msg'=>'Pencatatan Buku Tamu atas Nama '.$nama.' <b>GAGAL DISIMPAN</b>'));
			}
			return;
		} else {
			$this->form_validation->set_rules('status', 'Status Bertamu', 'trim|required');
			if ($this->form_validation->run() == FALSE){
				echo json_encode(array('st'=>0,'msg'=>'Tidak Berhasil:<br/>'.validation_errors()));
				return;
			}

			$status= $this->input->post('status');

			$data = array('alamat' => $alamat,
						'telepon' => $telepon,
						'keperluan' => $alasan,
						'status' => $status,
						'diperbaharui_oleh' => $this->session->userdata('username'),
						'diperbaharui_tanggal' => date("Y-m-d h:i:s",time()) );

			$querySimpan = $this->model->pembaharuan_data('bukutamu',$data,'id',$id);
		}

		if($querySimpan==1){
			echo json_encode(array('st'=>1,'msg'=>'Pencatatan Buku Tamu atas Nama '.$nama.' <b>BERHASIL DIPERBAHARUI</b>'));
		} else {
			echo json_encode(array('st'=>0,'msg'=>'Pencatatan Buku Tamu atas Nama '.$nama.' <b>GAGAL DIPERBAHARUI</b>'));
		}
		return;
	}

}
