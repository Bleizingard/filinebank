<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Get extends CI_Controller
{
	/*
	 * Set Error Delimiter
	 */
	public function __construct()
	{
		parent::__construct ();
		
		$this->load->helper('download');
	}
	
	public function index($app = null)
	{
		switch($app)
		{
			case "android":
				$name = 'filinebank.apk';
				break;
			default:
				$name = 'filinebank.apk';
				break;
		}
		force_download(sprintf('assets/apps/%s', $name), NULL, TRUE);
	}
}