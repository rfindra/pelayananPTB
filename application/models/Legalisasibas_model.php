<?php
class Legalisasibas_model extends CI_Model
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
        $this->db->where('nik', $id);
        $this->db->update($table, $data);
    }

    public function deleteData($table, $id)
    {
        $this->db->where($id);
        $this->db->delete($table);
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function manualQuery($q)
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

    public function getDataLegalisasiEdit($id)
    {
        $this->db->where('nik', $id);
        return $this->db->get('legalisasi_bas')->result();
    }

    public function caridata()
    {
        $c = $this->input->post('cari');
        $this->db->select('*');
        $this->db->from('legalisasi_bas');
        $this->db->join('berkas', 'legalisasi_bas.nik = berkas.nik');
        $this->db->like('berkas.nik', $c);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
