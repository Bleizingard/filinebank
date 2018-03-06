<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class City_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database ();
	}
	
	public function get_cities()
	{
		$this->db->select('C.Id, C.Name as NameCity, S.Name AS NameState, CT.Name AS NameCountry');
		$this->db->from('City AS C');
		$this->db->join('State AS S', 'C.IdState = S.Id');
		$this->db->join('Country AS CT', 'S.IdCountry = CT.Id');
		
		$data = $this->db->get();
		$list = array();
		
		foreach ($data->result() as $row)
		{
			$list[$row->Id] = sprintf("%s, %s (%s)", $row->NameCity, $row->NameState, $row->NameCountry);
		}
		
		
		return $list;
	}
}