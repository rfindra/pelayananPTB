<?php

class Legalisasibas_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function updateDatab($table,$data,$id)
    {
        $this->db->where('nik',$id)->update($table,$data);
    }
    function deleteData($table,$id)
    {
        $this->db->delete($table,$id);
    }
    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }
    function manualQuery($q)
    {
        return $this->db->query($q);
    }
    public function getAllDataLegalisasi()
    {
        $this->db->select('*');
    $this->db->from('legalisasi_bas');
    $this->db->join('berkas', 'legalisasi_bas.nik = berkas.nik');
    $query = $this->db->get();
    return $query->result(); 
    }
    function getDataLegalisasiEdit($id){
        return $this->db->query("SELECT * from legalisasi_bas where nik = '$id' ")->result();
    }
    function caridata(){
    $c = $this->input->POST ('cari');
    $this->db->select('*');
    $this->db->from('legalisasi_bas');
    $this->db->join('berkas', 'legalisasi_bas.nik = berkas.nik');
    $this->db->like('berkas.nik', $c);
    $query = $this->db->get();
    return $query->result(); 
    }
}
?>