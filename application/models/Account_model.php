<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Account_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database ();
	}
	public function insert_client(array $user_data)
	{
		foreach ( $user_data as $key => $value )
		{
			if ($key === "Mdp")
			{
				$user [$key] = password_hash ( $value, PASSWORD_BCRYPT );
			}
			else
			{
				$user [$key] = $value;
			}
		}
		
		$user["idSalarie"] = $this->get_salarie_less_client((int) $user_data["idBanque"])->row()->idSalarie;
		
		return $this->db->insert ( 'client', $user );
	}
	public function check_credential($login, $password)
	{
		$user = $this->get_client_by_email ( $login );
		
		if ($user->num_rows ())
		{
			$row = $user->row ();
			
			if (password_verify ( $password, $row->Mdp ))
			{
				return $row;
			}
		}
		
		return false;
	}
	public function get_client_by_email(string $email)
	{
		$user = $this->db->get_where ( "client", array (
				"Mail" => $email ), 1 );
		
		return $user;
	}
	public function get_client_by_id(int $id)
	{
		$user = $this->db->get_where ( "client", array (
				"idClient" => $id ), 1 );
		
		return $user;
	}
	
	private function get_salarie_less_client(int $idBanque)
	{	
		$this->db->select('S.idSalarie, COUNT(*) AS NumClient');
		$this->db->from('salarie AS S');
		$this->db->join('client AS C', 'S.idSalarie = C.idSalarie', 'LEFT');
		$this->db->where('C.idBanque', $idBanque);
		$this->db->order_by('NumClient', 'DESC');
		$this->db->limit(1);
		
		$salarie = $this->db->get();
		
		return $salarie;
	}
}