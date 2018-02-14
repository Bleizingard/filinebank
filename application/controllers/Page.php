<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller 
{
	public function index()
	{
		if($this->toolbox->is_logged())
		{
			$this->dashboard();
		}
		else 
		{
			$this->home();
		}
	}
	
	public function home()
	{
		$data["title_page"] = "Home";
		
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('page/home');
		$this->load->view('template/footer');
	}
	
	public function dashboard()
	{
		$data["title_page"] = "Dashboard";
		
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('page/dashboard', $data);
		$this->load->view('template/footer');
	}
}