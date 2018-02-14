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
		$user = $this->db->get('banque');
		
		return $user;
	}
	
	public function get_bank_by_id(int $id)
	{
		$user = $this->db->get_where("banque", array("idBanque" => $id), 1);
		
		return $user;
	}
}