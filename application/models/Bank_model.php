<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_bank_all()
	{
		$user = $this->db->get('Bank');
		
		return $user;
	}
	
	public function get_bank_by_id(int $id)
	{
		$user = $this->db->get_where("Bank", array("Id" => $id), 1);
		
		return $user;
	}
}