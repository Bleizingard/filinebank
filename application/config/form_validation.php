<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

$config = array (
		'account/signup' => array (
				array (
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'trim|no_space|strtolower|required|valid_email|max_length[50]|is_unique[client.Mail]' ),
				array (
						'field' => 'firstname',
						'label' => 'Firstname',
						'rules' => 'trim|no_space|strtolower|required|max_length[20]' ),
				array (
						'field' => 'lastname',
						'label' => 'Lastname',
						'rules' => 'trim|no_space|strtoupper|required|max_length[20]' ),
				array (
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim|required|min_length[8]|max_length[30]' ),
				array (
						'field' => 'password_confirm',
						'label' => 'Password Confirmation',
						'rules' => 'trim|required|matches[password]' ),
				array (
						'field' => 'address',
						'label' => 'Address',
						'rules' => 'trim|no_space|strtolower|required|max_length[50]' ),
				array (
						'field' => 'zipcode',
						'label' => 'Zip Code',
						'rules' => 'trim|no_space|required|max_length[5]|min_length[5]' ),
				array (
						'field' => 'city',
						'label' => 'City',
						'rules' => 'trim|strtoupper|required' ),
				array (
						'field' => 'country',
						'label' => 'Country',
						'rules' => 'trim|strtoupper|required' ),
				array (
						'field' => 'phone',
						'label' => 'Phone',
						'rules' => 'trim|min_length[10]|max_length[10]|required' ),
				array (
						'field' => 'num_child',
						'label' => 'Number of Child',
						'rules' => 'trim|required' ),
				array (
						'field' => 'social_group',
						'label' => 'Social Group',
						'rules' => 'trim|strtolower|required' ),
				array (
						'field' => 'work',
						'label' => 'Work',
						'rules' => 'trim|strtoupper|required' ),
				array (
						'field' => 'bank',
						'label' => 'Bank',
						'rules' => 'required' ) ),
		'account/signin' => array (
				array (
						'field' => 'login',
						'label' => 'Login',
						'rules' => 'trim|strtolower|required' ),
				array (
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim' ) ) );

if (! function_exists ( 'no_space' ))
{
	/* function à déplacer */
	function no_space($str)
	{
		return str_ireplace ( " ", "", $str );
	}
}