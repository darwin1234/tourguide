<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller{

	function __construct(){
		 parent::__construct();
		 $this->load->model('BusinessList','',TRUE);
		 $this->load->model('user','', TRUE);
	}

	function index(){
		$data = array();
		$data['businesslist']		= 	$this->BusinessList->records();
		$this->load->view('frontpage',$data);
	}

  function myaccount(){
		$data = array();
		$data = $this->session->userdata('logged_in');
		if(!empty($data)){
			$role = $data['Role'];
			if($role == 3){

					$data['myprofile']				= $data;
					$this->load->view('myaccount',$data);
			}

		}else{
				redirect(base_url() ."login", 'refresh');

		}

	}
	public function history(){

	}


	public function messageSend(){

		$Fullname 		= $this->input->post('Fullname');
		$EmailAddress	= $this->input->post('EmailAddress');
		$message			= $this->input->post('message');
		$sendmessage  = $this->input->post('sendmessage');
		if(isset($sendmessage)){
			echo "SENT!!!";
		}

	}

	public function search(){
	  $title = $this->input->post("title");

		echo $this->BusinessList->businesslike($title);

		/*$data = array();
		$data[0] ="darwin sese";
		$data[1] = "28";
		echo json_encode($data);*/
	}


}
