<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this -> load -> helper(array('getmenu'));
	}

	public function index()
	{
		$data['menu'] = main_menu();
		$this->load->view('base', $data);
		
	}
}
