<?php
    class view_model extends CI_Model{
        function __construct(){
            $this->load->database();
        }

        public function viewtable($id)
        {
            $query = $this->db->select('*')->from('productos')->where("id_prod", $id)->get();
            return $query->result();
        }
    }