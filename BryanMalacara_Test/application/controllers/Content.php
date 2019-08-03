<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this -> load -> helper(array('getmenu'));
		$this -> load -> database();
		$this -> load -> library(array('form_validation'));

	}

	public function index()
	{
		//$data['menu'] = main_menu();
		$this->load->model('Table');
		$data['query'] = $this->Table->viewtable();  
		$this->load->view('content',$data);
		//$this->load->view('content');
		$query = $this->db->get("productos");
		
	}

	public function delete_data($id){
		$this->load->model("erase_model");
		$this->erase_model->delete_data($id);
		//redirect(base_url() . "Content/deleted");
		$this->index();
	}

	public function view_data($id){
		$this->load->model('view_model');
		$data['query'] = $this->view_model->viewtable($id);

		$this->load->view('file',$data);
	}

	public function edit_data($id){
		$this->load->model('view_model');
		$data['query'] = $this->view_model->viewtable($id);

		$this->load->view('edit',$data);
	}

	public function deleted(){
		$this->index();
	}

	public function edit(){
		$id = $this->input->post('id');
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
					$this->load->view('edit');
				}
				else{
					$this->load->database();
					$this->db->set('nombre', $product);
					$this->db->set('descripcion', $descript);
					$this->db->set('f_id_categoria', $category);
					$this->db->set('foto', $upload_data["file_name"]);
					$this->db->where('id_prod',$id);
					$this->db->update('productos');

					$data ['msg'] = 'Producto modificado';
					
					$this->edit_data($id);
				}
	}
}
