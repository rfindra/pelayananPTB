<?php
class legalisasibas extends CI_Controller{
    function __construct(){
        parent::__construct();
                
        $this->load->model('Legalisasibas_model');
       // $this->load->library('upload');
        $this->load->helper(array('form', 'url', 'html'));
        
        $this->load->library('upload','table');

    }

    function index(){
			$data=array(
            'title'=>'Data Legalisasi',
            'data_legalisasi' =>$this->Legalisasibas_model->getAllDataLegalisasi(),
			
        );
        $this->load->view('admin/legalisasibas',$data);
    }

    function editlegalisasi($id){
            $data=array(
            'title'=>'Edit Legalisasi',
            'data_legalisasi'=>$this->Legalisasibas_model->getDataLegalisasiEdit($id),
        );
        $this->load->view('admin/edit_legalisasi',$data);
    }

    function updatelegalisasi($id){
            $data=array(
            'title'=>'Edit Legalisasi',
            'data_legalisasi'=>$this->Legalisasibas_model->getDataLegalisasiEdit($id),
        );
        $this->load->view('admin/update_legalisasi',$data);
    } 
    
    function tambah(){
      $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
      $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
      $this->form_validation->set_rules('nmorg', 'Nama Organisasi', 'required');
      $this->form_validation->set_rules('email', 'E-Mail', 'required');
      $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('admin/legalisasibas');
      } else {

        $data=array(
            'nik'=>$this->input->post('nik'),
            'nm_lengkap'=>$this->input->post('nmlkp'),
            'nama_organisasi'=>$this->input->post('nmorg'),
            'email'=>$this->input->post('email'),
            'nohp'=>$this->input->post('nohp'),
            'tgl_daftar'=>date("Y-m-d H:i:s"),
            'status'=>$this->input->post("status"),
        );

        $nik=$this->input->post("nik");
        $this->Legalisasibas_model->insertData('legalisasi_bas',$data);
        $sql="insert berkas(nik) values (?)";
        $this->db->query($sql,array($nik));

        $this->session->set_flashdata('notif','Pendaftaran Berhasil');
        redirect("legalisasibas");
        }
    }

    function simpanedit($id){
      $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
      $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
      $this->form_validation->set_rules('nmorg', 'Nama Organisasi', 'required');
      $this->form_validation->set_rules('email', 'E-Mail', 'required');
      $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');


      if ($this->form_validation->run() == FALSE) {
        $this->load->view('admin/legalisasibas');
      } else {

        $data=array(
            'nik'=>$this->input->post('nik'),
            'nm_lengkap'=>$this->input->post('nmlkp'),
            'nama_organisasi'=>$this->input->post('nmorg'),
            'email'=>$this->input->post('email'),
            'nohp'=>$this->input->post('nohp'),
            'tgl_ambil'=>$this->input->post("tgll"),
            'status'=>$this->input->post("status"),
        );
        
        $this->Legalisasibas_model->updateDatab('legalisasi_bas',$data, $id);
        $this->session->set_flashdata('notif','Edit Berhasil');
        redirect("legalisasibas");
      }
    }

    function hapus(){
        $id['nik'] = $this->uri->segment(3);
        $this->Legalisasibas_model->deleteData('legalisasi_bas',$id);

        $this->session->set_flashdata('notif','Hapus Data Berhasil');
        redirect("legalisasibas");
    }

    function cari() {
       $data['data_legalisasi']=$this->Legalisasibas_model->caridata();
       if($data['data_legalisasi']==null) {
          print 'Maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('legalisasibas','kembali');
          }
          else {
             $this->load->view('admin/legalisasibas',$data); 

          }
    }

    function indexdaftar(){
      $data=array(
            'title'=>'Data Legalisasi',
            'data_legalisasi' =>$this->Legalisasibas_model->getAllDataLegalisasi(),
      
        );
        $this->load->view('web/daftar_legalisasi',$data);
    }

    function indexdaftar1(){
      $data=array(
            'title'=>'Data Legalisasi',
            'data_legalisasi' =>$this->Legalisasibas_model->getAllDataLegalisasi(),
      
        );
        $this->load->view('admin/daftar_legalisasi',$data);
    }

    function daftarlegalisasi(){
      $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
      $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
      $this->form_validation->set_rules('nmorg', 'Nama Organisasi', 'required');
      $this->form_validation->set_rules('email', 'E-Mail', 'required');
      $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');


      if ($this->form_validation->run() == FALSE) {
        $this->load->view('web/daftar_legalisasi');
      } else {
        $data=array(
            'nik'=>$this->input->post('nik'),
            'nm_lengkap'=>$this->input->post('nmlkp'),
            'nama_organisasi'=>$this->input->post('nmorg'),
            'email'=>$this->input->post('email'),
            'nohp'=>$this->input->post('nohp'),
            'tgl_daftar'=>date("Y-m-d H:i:s"),
            'status'=>$this->input->post("sts"),
        );

        $nik=$this->input->post("nik");
        $this->Legalisasibas_model->insertData('legalisasi_bas',$data);
        $sql="insert berkas(nik) values (?)";
        $this->db->query($sql,array($nik));
        redirect("UploadLegalisasi/index");
      }
    }

    function daftarlegalisasi1(){
      $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
      $this->form_validation->set_rules('nmlkp', 'Nama Lengkap', 'required');
      $this->form_validation->set_rules('nmorg', 'Nama Organisasi', 'required');
      $this->form_validation->set_rules('email', 'E-Mail', 'required');
      $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('web/daftar_legalisasi');
      } else {
        $data=array(
            'nik'=>$this->input->post('nik'),
            'nm_lengkap'=>$this->input->post('nmlkp'),
            'nama_organisasi'=>$this->input->post('nmorg'),
            'email'=>$this->input->post('email'),
            'nohp'=>$this->input->post('nohp'),
            'tgl_daftar'=>date("Y-m-d H:i:s"),
            'status'=>$this->input->post("sts"),
        );

        $nik=$this->input->post("nik");
        $this->Legalisasibas_model->insertData('legalisasi_bas',$data);
        $sql="insert berkas(nik) values (?)";
        $this->db->query($sql,array($nik));
        redirect("upload_legalisasi/index1");
      }
    }

    function cariweb() {
       $data['status_legalisasi']=$this->Legalisasibas_model->caridata();
       if($data['status_legalisasi']==null) {
          print 'Maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('legalisasibas/indexmonitoring','kembali');
          }
          else {
             $this->load->view('web/caristatus_legalisasi',$data); 

          }
    }

    function persyaratanlegalisasi()
    {
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->view('/web/persyaratan_legalisasi');
    }

    function indexweb()
    {
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->view('/web/legalisasi');
    }

    function indexmonitoring() {
        $data['status_legalisasi'] = $this->Legalisasibas_model->getAllDataLegalisasi();
        $this->load->view('web/status_legalisasi',$data);
  
    }
}
?>