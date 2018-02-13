<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Account extends CI_Controller
{
	
	/*
	 * Set Error Delimiter
	 */
	public function __construct()
	{
		parent::__construct ();
		
		$this->load->model("account_model");
		$this->load->helper ( "form" );
		$this->load->library ( 'form_validation' );
	}
	public function index()
	{
		signin ();
	}
	public function signin()
	{
		// Page Title
		$data ["title_page"] = "";
		$user_data = FALSE;
		
		/*
		 * Sign In Form Script
		 */
		if ($this->form_validation->run () == FALSE || ($user_data = $this->account_model->check_credential(set_value('login'), set_value('password'))) == FALSE)
		{
			/*
			 * Sign In Form Prep Data
			 */
			$data ["form_login"] = array (
					"name" => 'login',
					"id" => 'login',
					"value" => set_value ( "login" ),
					"class" => (empty ( form_error ( "login" ) )) ? "validate" : "validate invalid" );
			$data ["form_login_label"] = array (
					"data-error" => form_error ( 'login', null, null ) );
			
			$data ["form_password"] = array (
					"name" => 'password',
					"id" => 'password',
					"class" => (empty ( form_error ( "password" ) )) ? "validate" : "validate invalid" );
			$data ["form_password_label"] = array (
					"data-error" => form_error ( 'password', null, null ) );
			
			if(!$user_data && $this->form_validation->run ())
			{
				$data ["form_password"]["class"] = "validate invalid";
				
				$data ["form_password_label"]["data-error"] = "Bad combinaison login/password";
			}
			
			$this->load->view ( 'template/head', $data );
			$this->load->view ( 'template/header' );
			$this->load->view ( 'account/signin', $data );
			$this->load->view ( 'template/footer' );
		}
		else
		{
			unset($user_data->password);
			
			$this->session->set_userdata("user", $user_data);
			
			redirect('/account/me');
		}
	}
	public function success($type_success = "default")
	{
		// Page Title
		$data ["title_page"] = "";
		
		switch ($type_success)
		{
			case "signup" :
				$data ["text"] = "Congratulation ! You can now sign in.";
				$data ["mini_text"] = "You will be redirect in 5 sec...";
				break;
			case "signout" :
				$data ["text"] = "You are now sign out. We hope see you soon !";
				break;
			default :
				$data ["text"] = "All is good.";
				break;
		}
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		$this->load->view ( 'account/success', $data );
		$this->load->view ( 'template/footer' );
	}
	public function failed()
	{
		// Page Title
		$data ["title_page"] = "";
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		$this->load->view ( 'account/failed', $data );
		$this->load->view ( 'template/footer' );
	}
	public function signout()
	{
		$this->session->sess_destroy ();
		// Page Title
		$data ["title_page"] = "";
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		$this->load->view ( 'account/signout' );
		$this->load->view ( 'template/footer' );
		
		$this->output->set_header('refresh:5; url='.base_url());
	}
	public function signup()
	{
		// Page Title
		$data ["title_page"] = "";
		
		if ($this->form_validation->run () == FALSE)
		{
			/*
			 * Sign Up Form Prep Data
			 */
			$data ["form_login"] = array (
					"name" => 'login',
					"id" => 'login',
					"value" => set_value ( "login" ),
					"class" => (empty ( form_error ( "login" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_login_label"] = array (
					"data-error" => form_error ( 'login', null, null ),
					"data-success" => "OK" );
			
			$data ["form_password"] = array (
					"name" => 'password',
					"id" => 'password',
					"value" => set_value ( "password" ),
					"class" => (empty ( form_error ( "password" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_password_label"] = array (
					"data-error" => form_error ( 'password', null, null ),
					"data-success" => "OK" );
			
			$data ["form_password_confirm"] = array (
					"name" => 'password_confirm',
					"id" => 'password_confirm',
					"class" => (empty ( form_error ( "password_confirm" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_password_confirm_label"] = array (
					"data-error" => form_error ( 'password_confirm', null, null ),
					"data-success" => "OK" );
			
			$data ["form_email"] = array (
					"name" => 'email',
					"id" => 'email',
					"value" => set_value ( "email" ),
					"class" => (empty ( form_error ( "email" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_email_label"] = array (
					"data-error" => form_error ( 'email', null, null ),
					"data-success" => "OK" );
			
			$this->load->view ( 'template/head', $data );
			$this->load->view ( 'template/header' );
			$this->load->view ( 'account/signup', $data );
			$this->load->view ( 'template/footer' );
		}
		else
		{
			/*
			 * Insert into BDD
			 */
			if ($this->account_model->insert_user(set_value ( "login" ), set_value ( "email" ), set_value ( "password" )))
			{
				$this->success ("signup");
				
				$this->output->set_header('refresh:5; url='.base_url());
			}
			else
			{
				$this->failed ();
			}
		}
	}
	
	public function me()
	{
		if($this->toolbox->is_logged())
		{
			// Page Title
			$data ["title_page"] = "";
			$data ["user_data"] = $this->session->get_userdata("user");
			
			$this->load->view ( 'template/head', $data );
			$this->load->view ( 'template/header' );
			$this->load->view ( 'account/profile', $data );
			$this->load->view ( 'template/footer' );
		}
		else
		{
			redirect('/signin');
		}
	}
	
	public function dashboard()
	{
		if($this->toolbox->is_logged())
		{
			// Page Title
			$data ["title_page"] = "";
			$data ["user_data"] = $this->session->get_userdata("user");
			
			$this->load->view ( 'template/head', $data );
			$this->load->view ( 'template/header' );
			$this->load->view ( 'account/dashboard', $data );
			$this->load->view ( 'template/footer' );
		}
		else
		{
			redirect('/signin');
		}
	}
}
?>