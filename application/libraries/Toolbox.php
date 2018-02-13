<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Toolbox 
{
	protected $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->load->library('session');
	}
	
	
	public function is_logged()
	{
		return $this->CI->session->has_userdata("user");
	}
}