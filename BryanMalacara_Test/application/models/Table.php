<?php
    class Table extends CI_Model{
        function __construct(){
            $this->load->database();
        }

        public function viewtable()
        {
            $query = $this->db->select('*')->from('productos')->get();
            return $query->result();
        }
    }