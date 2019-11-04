<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	function __construct(){
		 parent::__construct();
		 $this->load->model('BusinessList','',TRUE);
	}

	function index(){

	   header('Access-Control-Allow-Origin: *');
	   header("Access-Control-Allow-Methods: POST, OPTIONS");
	   echo json_encode($this->BusinessList->rdata());

	}

	public function getDirection(){
			$data =  array();
			$this->load->view('getdirection',$data);
	}


	function detail(){
		$id =$this->input->post("ID");
		echo $this->BusinessList->businessdetail($id);
		//echo "asdasdasdasdasdasdasd";
	}
}
