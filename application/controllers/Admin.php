<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Admin extends CI_Controller
{
	/*
	 * Set Error Delimiter
	 */
	public function __construct()
	{
		parent::__construct ();
		
		$this->load->model("account_model");
		$this->load->helper ( "form" );
		$this->load->library ( 'form_validation' );
	}
}