<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array (
		'account/signup' => array (
				array (
						'field' => 'login',
						'label' => 'Login',
						'rules' => 'trim|no_space|strtolower|required|min_length[3]|max_length[30]|is_unique[user.login]' ),
				array (
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim|required|min_length[8]|max_length[30]' ),
				array (
						'field' => 'password_confirm',
						'label' => 'Password Confirmation',
						'rules' => 'trim|required|matches[password]' ),
				array (
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'trim|no_space|strtolower|required|valid_email|max_length[50]|is_unique[user.email]' ) ),
		'account/signin' => array (
				array (
						'field' => 'login',
						'label' => 'Login',
						'rules' => 'trim|strtolower|required' ),
				array (
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim' ) )
);

if( ! function_exists('no_space'))
{
	/* function à déplacer */
	function no_space($str)
	{
		return str_ireplace(" ", "", $str);
	}
}