<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Toolbox 
{
	protected $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->load->library('session');
		
		$this->CI->load->model('product_model');
	}
	
	
	public function is_logged()
	{
		return $this->CI->session->has_userdata("user");
	}
	
	public function get_user_product_active()
	{
		return $this->CI->product_model->get_user_product_active($this->CI->session->userdata("user")->Id);
	}
	
	public function get_user_menu_product_active()
	{
		$data = $this->get_user_product_active();
		
		
		foreach ($data as $key => $value)
		{
			if(!empty($value))
			{
				$data[$key] = "subheader";
			}
			else
			{
				$data[$key] = "";
			}
		}
		
		return $data;
	}
}