<?php
    class Productos extends CI_Model{
        function __construct(){
            $this->load->database();
        }

        public function create($datos){
            if(!$this->db->insert('productos', $datos)){
                return false;
            }
            return true;
        }
    }