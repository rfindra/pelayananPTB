<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audiensi_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function simpan_data_audiensi($data)
    {

        $this->db->insert('audiensi', $data);


}
?>
