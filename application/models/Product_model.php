<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Product_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database ();
	}
	public function get_user_product_active($idUser)
	{
		$this->db->select("*");
		$this->db->where ("IdCustomer", $idUser);
		$this->db->or_where ("IdCustomer", NULL);
		
		$data = $this->db->get("V_ProductByUser");
		
		$list = array();
		
		foreach($data->result() as $row)
		{
			$list [$row->Name] = $row->Active >= 1;
		}
		
		return $list;
	}
	public function get_checking_all()
	{
		$this->db->select ( 'P.*' );
		$this->db->from ( 'Product AS P' );
		$this->db->join ( 'CheckingAccount AS CA', 'P.Id = CA.IdProduct' );
		
		$data = $this->db->get ();
		$list = array ();
		
		foreach ( $data->result () as $row )
		{
			$list [$row->Id] = sprintf ( "%s (%s €/year)", $row->Name, $row->AnnualCost );
		}
		
		return $list;
	}
	public function get_saving_all()
	{
		$this->db->select ( 'P.*, SA.*' );
		$this->db->from ( 'Product AS P' );
		$this->db->join ( 'SavingAccount AS SA', 'P.Id = SA.IdProduct' );
		
		$data = $this->db->get ();
		$list = array ();
		
		foreach ( $data->result () as $row )
		{
			$list [$row->Id] = sprintf ( "%s (+%s%s/year)", $row->Name, $row->Interest, "%" );
		}
		
		return $list;
	}
	public function get_card_all()
	{
		$data = $this->db->get ( "Card" );
		
		$list = array ();
		
		foreach ( $data->result () as $row )
		{
			$list [$row->Id] = sprintf ( "%s (%s €/year)", $row->Name, $row->Cost );
		}
		
		return $list;
	}
	public function insert_contract_checking(array $contract, array $account_data)
	{
		if ($this->db->insert ( 'Account', $account_data ))
		{
			$contract ["IdAccount"] = $this->db->insert_id ();
			
			return $this->db->insert ( 'Contract', $contract );
		}
		
		return false;
	}
	
	public function insert_contract_saving(array $contract, array $account_data)
	{
		if ($this->db->insert ( 'Account', $account_data ))
		{
			$contract ["IdAccount"] = $this->db->insert_id ();
			
			return $this->db->insert ( 'Contract', $contract );
		}
		
		return false;
	}
}