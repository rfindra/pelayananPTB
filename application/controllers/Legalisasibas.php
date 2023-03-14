<?php
class Legalisasibas extends CI_Controller {
    
  public function __construct() {
      parent::__construct();
      
      $this->load->model('Legalisasibas_model');
      $this->load->helper(array('form', 'url', 'html'));
      $this->load->library(array('upload', 'table'));
  }

  public function index() {
      $data = [
          'title' => 'Data Legalisasi',
          'data_legalisasi' => $this->Legalisasibas_model->getAllDataLegalisasi()
      ];
      $this->load->view('admin/legalisasibas', $data);
  }

  public function editLegalisasi($id) {
      $data = [
          'title' => 'Edit Legalisasi',
          'data_legalisasi' => $this->Legalisasibas_model->getDataLegalisasiEdit($id)
      ];
      $this->load->view('admin/edit_legalisasi', $data);
  }

  public function updateLegalisasi($id) {
      $data = [
          'title' => 'Edit Legalisasi',
          'data_legalisasi' => $this->Legalisasibas_model->getDataLegalisasiEdit($id)
      ];
      $this->load->view('admin/update_legalisasi', $data);
  }  
    
  function validateFormData() {
    $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
    $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('nmorg', 'Nama Organisasi', 'required');
    $this->form_validation->set_rules('email', 'E-Mail', 'required');
    $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');
    return $this->form_validation->run();
  }
  
  function tambah() {
    if (!validateFormData()) {
      $this->load->view('admin/legalisasibas');
      return;
    }
  
    $data = array(
      'nik' => $this->input->post('nik'),
      'nm_lengkap' => $this->input->post('nmlkp'),
      'nama_organisasi' => $this->input->post('nmorg'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),
      'tgl_daftar' => date("Y-m-d H:i:s"),
      'status' => $this->input->post("status"),
    );
  
    $nik = $this->input->post("nik");
    $this->Legalisasibas_model->insertData('legalisasi_bas', $data);
  
    $sql = "insert berkas(nik) values (?)";
    $this->db->query($sql, array($nik));
  
    $this->session->set_flashdata('notif', 'Pendaftaran Berhasil');
    redirect('legalisasibas');
  }
  
  function uploadweb($id) {
    if (!validateFormData()) {
      $this->load->view('admin/legalisasibas');
      return;
    }
  
    $data = array(
      'nik' => $this->input->post('nik'),
      'nm_lengkap' => $this->input->post('nmlkp'),
      'nama_organisasi' => $this->input->post('nmorg'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),
      'tgl_ambil' => $this->input->post('tgll'),
      'status' => $this->input->post('status')
    );
    
    $this->Legalisasibas_model->updateDatab('legalisasi_bas', $data, $id);
    $this->session->set_flashdata('notif', 'Edit Berhasil');
    redirect('legalisasibas');
  }
  function hapus() {
    $nik = $this->uri->segment(3);
    $this->Legalisasibas_model->deleteData('legalisasi_bas', array('nik' => $nik));
  
    $this->session->set_flashdata('notif', 'Hapus Data Berhasil');
    redirect('legalisasibas');
  }
  
  function cari() {
    $data['data_legalisasi'] = $this->Legalisasibas_model->caridata();
    if ($data['data_legalisasi'] == null) {
      $message = 'Maaf data yang anda cari tidak ada atau keywordnya salah';
      $message .= br(2);
      $message .= anchor('Legalisasibas/indexweb', 'kembali');
      echo $message;
    } else {
      $this->load->view('admin/legalisasibas', $data); 
    }
  }
  
  function indexdaftar() {
    $data = array(
      'title' => 'Data Legalisasi',
      'data_legalisasi' => $this->Legalisasibas_model->getAllDataLegalisasi()
    );
    $this->load->view('web/daftar_legalisasi', $data);
  }
  
  function indexdaftar1() {
    $data = array(
      'title' => 'Data Legalisasi',
      'data_legalisasi' => $this->Legalisasibas_model->getAllDataLegalisasi()
    );
    $this->load->view('admin/daftar_legalisasi', $data);
  }
  
  function daftarlegalisasi() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
    $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('nmorg', 'Nama Organisasi', 'required');
    $this->form_validation->set_rules('email', 'E-Mail', 'required');
    $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');
  
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('web/daftar_legalisasi');
    } else {
      $data = array(
        'nik' => $this->input->post('nik'),
        'nm_lengkap' => $this->input->post('nmlkp'),
        'nama_organisasi' => $this->input->post('nmorg'),
        'email' => $this->input->post('email'),
        'nohp' => $this->input->post('nohp'),
        'tgl_daftar' => date("Y-m-d H:i:s"),
        'status' => $this->input->post("sts"),
      );
  
      $this->Legalisasibas_model->insertData('legalisasi_bas', $data);
      $this->db->insert('berkas', array('nik' => $data['nik']));
      redirect("UploadLegalisasi/index");
    }
  }

function daftarlegalisasi1() {
  $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
  $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
  $this->form_validation->set_rules('nmorg', 'Nama Organisasi', 'required');
  $this->form_validation->set_rules('email', 'E-Mail', 'required');
  $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');

  if ($this->form_validation->run() == FALSE) {
      $this->load->view('web/daftar_legalisasi');
      return;
  }

  $data = array(
      'nik' => $this->input->post('nik'),
      'nm_lengkap' => $this->input->post('nmlkp'),
      'nama_organisasi' => $this->input->post('nmorg'),
      'email' => $this->input->post('email'),
      'nohp' => $this->input->post('nohp'),
      'tgl_daftar' => date("Y-m-d H:i:s"),
      'status' => $this->input->post("sts"),
  );

  $this->Legalisasibas_model->insertData('legalisasi_bas', $data);
  $sql = "insert berkas(nik) values (?)";
  $this->db->query($sql, array($data['nik']));
  redirect("upload_legalisasi/index1");
}
function cariweb() {
  $data['status_legalisasi'] = $this->Legalisasibas_model->caridata();
  if (!$data['status_legalisasi']) {
    echo 'Maaf data yang anda cari tidak ada atau keywordnya salah';
    echo '<br><br>';
    echo anchor('Legalisasibas/indexweb', 'kembali');
  } else {
    $this->load->view('web/caristatus_legalisasi', $data); 
  }
}

function persyaratanlegalisasi() {
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->view('web/persyaratan_legalisasi');
}

function indexweb() {
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->view('web/legalisasi');
}

function indexmonitoring() {
  $data['status_legalisasi'] = $this->Legalisasibas_model->getAllDataLegalisasi();
  // $this->load->view('web/status_legalisasi', $data);
}
}
?>