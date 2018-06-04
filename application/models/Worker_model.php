<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Worker_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database ();
	}

	public function insert_worker(array $worker_data)
	{
		foreach ( $worker_data as $key => $value )
		{
			if ($key === "Password")
			{
				$user [$key] = password_hash ( $value, PASSWORD_BCRYPT );
			}
			else
			{
				$user [$key] = $value;
			}
		}
		

		return $this->db->insert ( 'Customer', $user );
	}

	public function check_credential($login, $password)
	{
		$user = $this->get_worker_by_email ( $login );
		
		if ($user->num_rows ())
		{
			$row = $user->row ();
			
			if (password_verify ( $password, $row->Password ))
			{
				return $row;
			}
		}
		
		return false;
	}

	public function get_worker_by_login(string $login)
	{
		$user = $this->db->get_where ( "Worker", array (
				"Login" => $login
		), 1 );
		
		return $user;
	}

	public function get_worker_by_id(int $id)
	{
		$user = $this->db->get_where ( "Worker", array (
				"Id" => $id 
		), 1 );
		
		return $user;
	}
}