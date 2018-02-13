<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function insert_user($login, $email, $password)
	{
		$user = array (
				"login" => set_value ( 'login' ),
				"email" => set_value ( 'email' ),
				"password" => password_hash ( set_value ( 'password' ), PASSWORD_BCRYPT ) );
		
		return $this->db->insert ( 'user', $user );
	}
	
	public function check_credential($login, $password)
	{
		$user = $this->get_user_by_login($login);
		
		if($user->num_rows())
		{
			$row = $user->row();
			
			if(password_verify($password, $row->password))
			{
				return $row;
			}
		}
		
		return false;
	}
	
	public function get_user_by_login(string $login)
	{
		$user = $this->db->get_where("user", array("login" => $login), 1);
		
		return $user;
	}
	
	public function get_user_by_id(int $id)
	{
		$user = $this->db->get_where("user", array("id" => $id), 1);
		
		return $user;
	}
}