<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Welcome_model');
	}
	public function index()
	{
		$data['file']= file('/etc/passwd');
		$this->load->library('pro');
		$data['news']=$this->pro->show('http://ep00.epimg.net/rss/elpais/portada.xml');
		$this->load->view('welcome_message',$data);
	}
	public function linefile($i=null) {
		if($i){
			$i='/tmp/' . $i;
		}else{
			$i='/etc/passwd';
		}
		$data['linea']= $this->Welcome_model->linefile($i);
		$this->load->view('welcome_message',$data);
	}
	//public function product($i=null){
	//	$data['product']= $this->Welcome_model->getProduct($i);
	//	$this->load->view('welcome_message',$data);
	}
	public function fliker(){
		$data['fliker']=$this->Welcome_model->getFliker();
		$this->load->view('welcome_message',$data);
	}
	