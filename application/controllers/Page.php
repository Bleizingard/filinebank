<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller 
{
	public function index()
	{
		$data["title_page"] = "";
		
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('page/home');
		$this->load->view('template/footer');
	}
}