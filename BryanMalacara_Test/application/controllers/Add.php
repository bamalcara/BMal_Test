<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this -> load -> helper(array('getmenu'));
		$this -> load -> database();
		$this -> load -> model('Productos');
		$this -> load -> library(array('form_validation'));
	}

	public function index()
	{
		$this->load->view('add');
	}

	public function do_upload(){
		$con = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "jpg|png|jpeg",
		'overwrite' => TRUE,
		);
		
		$this->load->library('upload', $con);
		if($this->upload->do_upload())
		{
		$data = array('upload_data' => $this->upload->data());
		$this->load->view('success',$data);
		}
		else
		{
		$error = array('error' => $this->upload->display_errors());
		$this->load->view('add', $error);
		}
	}

	public function create(){
		

		$product = $this->input->post('product');
		$descript = $this->input->post('descript');
		$category = $this->input->post('category');


		$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('success', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $this->load->view('success',$data);
                }
			
				$upload_data = $this->upload->data();
                        

		$config = array (
			array(
				'field' => 'product',
				'label' => 'producto',
				'rules' => 'required',
				'errors'=>  array(
					'required' => 'El campo %s es requerido'
				),
			)
		);
		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE){
			$this->load->view('add');
		}
		else{
			$datos = array (
				'nombre' => $product,
				'descripcion' => $descript,
				'f_id_categoria' => $category,
				'foto' => $upload_data["file_name"]
				
			);
			if(!$this->Productos->Create($datos)){
				$data ['msg'] = 'Ocurrio un error al agregar los datos';
				$this->load->view('add', $data);
			}
			$data ['msg'] = 'Producto registrado';
			
			$this->load->view('add', $data);
		}

		
	}
}
