<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Account_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database ();
	}
	public function insert_client(array $user_data, array $address_data)
	{
		foreach ( $user_data as $key => $value )
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
		
		$user["idWorker"] = $this->get_salarie_less_client($user_data["idBank"])->row()->Id;
		
		if ($this->db->insert('Address', $address_data))
		{
			$idAddress = $this->db->insert_id();
			
			$user['idAddress'] = $idAddress;
			
			return $this->db->insert ( 'Customer', $user );
		}
		
		
		return false;
	}
	public function check_credential($login, $password)
	{
		$user = $this->get_client_by_email ( $login );
		
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
	public function get_client_by_email(string $email)
	{
		$user = $this->db->get_where ( "Customer", array (
				"Email" => $email ), 1 );
		
		return $user;
	}
	public function get_client_by_id(int $id)
	{
		$user = $this->db->get_where ( "Customer", array (
				"Id" => $id ), 1 );
		
		return $user;
	}
	
	public function get_social_plan()
	{
		return $this->db->get("SocialPlan");
	}
	
	private function get_salarie_less_client(int $idBanque)
	{	
		$this->db->select('W.Id, COUNT(*) AS NumClient');
		$this->db->from('Worker AS W');
		$this->db->join('Customer AS C', 'W.Id = C.idWorker', 'LEFT');
		$this->db->where('W.idBank', $idBanque);
		$this->db->order_by('NumClient', 'DESC');
		$this->db->limit(1);
		
		$salarie = $this->db->get();
		
		return $salarie;
	}
}