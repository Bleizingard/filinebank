<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Product extends CI_Controller
{
	/*
	 * Set Error Delimiter
	 */
	public function __construct()
	{
		parent::__construct ();
		
		$this->load->helper ( "form" );
		$this->load->library ( 'form_validation' );
	}
	public function index()
	{
		$data ["title_page"] = "Subscribe a new product";
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		$this->load->view ( 'account/signin', $data );
		$this->load->view ( 'template/footer' );
	}
	public function subcribe($product_type)
	{
		$data ["title_page"] = "Subscribe";
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		$this->load->view ( 'maintenance/construction' );
		$this->load->view ( 'template/footer' );
	}
}