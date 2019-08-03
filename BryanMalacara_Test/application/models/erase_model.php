<?php
    class erase_model extends CI_Model{
        function __construct(){
            $this->load->database();
        }

        function delete_data($id){
            $this->db->where("id_prod", $id);
            $this->db->delete("productos");
        }
    }