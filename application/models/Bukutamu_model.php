<?php
class Bukutamu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function updateData($table, $data, $field_key)
    {
        $this->db->where($field_key);
        $this->db->update($table, $data);
    }

    public function updateDatab($table, $data, $id)
    {
        $this->db->where('nama', $id);
        $this->db->update($table, $data);
    }

    public function deleteData($table, $id)
    {
        $this->db->where($id);
        $this->db->delete($table);
    }

    public function insertData($table, $data)
    {   $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

	public function insertDataPtsp($table, $data)
    {   $this->db_ptsp = $this->load->database('ptsp', true);
		$this->db_ptsp->insert($table, $data);
        //return $this->db->insert_id();
    }
	
	public function get_seleksi_nomor_index($tahun_seleksi){
	try {   $this->db_ptsp = $this->load->database('ptsp', true);
			$this->db_ptsp->select_max('nomor_index');
			$this->db_ptsp->where('YEAR(tanggal)',$tahun_seleksi);
			return $this->db_ptsp->get('bukutamu');
		} catch (Exception $e) {
			return 0;
		}
	}
	
	
    public function manualQuery($q)
    {
        return $this->db->query($q);
    }

    public function getAllDataLegalisasi()
    {
        $this->db->select('*');
        $this->db->from('bukutamu');
        $this->db->join('berkas', 'bukutamu.nama = berkas.nama');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataLegalisasiEdit($id)
    {
        $this->db->where('nama', $id);
        return $this->db->get('bukutamu')->result();
    }

    public function caridata()
    {
        $c = $this->input->post('cari');
        $this->db->select('*');
        $this->db->from('bukutamu');
        $this->db->join('berkas', 'bukutamu.nama = berkas.nama');
        $this->db->like('berkas.nama', $c);
        $query = $this->db->get();
        return $query->result();
    }
}
    //public function caridata()   //Search All in DB
    //{
        //$c = $this->input->post('cari');
        //$this->db->select('bukutamu.id_daftar, bukutamu.nama, bukutamu.nm_lengkap, bukutamu.nohp, bukutamu.email, bukutamu.nama_organisasi, bukutamu.tgl_daftar, bukutamu.tgl_ambil, bukutamu.status');
        //$this->db->from('bukutamu');
        //$this->db->join('berkas', 'bukutamu.nama = berkas.nama');
        //$this->db->like('berkas.nama', $c);
        //$this->db->group_by('bukutamu.id_daftar');
        //$query = $this->db->get();
        //return $query->result();
    //}


    //public function caridata() //Search only by nama
    //{
    //    $c = $this->input->post('cari');
    //    $this->db->select('bukutamu.id_daftar, bukutamu.nama, bukutamu.nm_lengkap, bukutamu.nohp, bukutamu.email, bukutamu.nama_organisasi, bukutamu.tgl_daftar, bukutamu.tgl_ambil, bukutamu.status');
    //    $this->db->from('bukutamu');
    //    $this->db->join('berkas', 'bukutamu.nama = berkas.nama');
    //    $this->db->where('berkas.nama', $c);
    //    $query = $this->db->get();
    //    return $query->result();
    //}
    //}
?>
