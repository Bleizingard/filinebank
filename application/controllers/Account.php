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
		$this->load->model("bank_model");
		$this->load->model("city_model");
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
			
			redirect('/dashboard');
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
		
		$data ["city_list"] = $this->city_model->get_cities();
		
		if ($this->form_validation->run () == FALSE)
		{
			/*
			 * Sign Up Form Prep Data
			 */
			$data ["form_email"] = array (
					"name" => 'email',
					"id" => 'email',
					"value" => set_value ( "email" ),
					"class" => (empty ( form_error ( "email" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_email_label"] = array (
					"data-error" => form_error ( 'email', null, null ),
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
			
			$data ["form_firstname"] = array (
					"name" => 'firstname',
					"id" => 'firstname',
					"value" => set_value ( "firstname" ),
					"class" => (empty ( form_error ( "firstname" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_firstname_label"] = array (
					"data-error" => form_error ( 'firstname', null, null ),
					"data-success" => "OK" );
			
			$data ["form_lastname"] = array (
					"name" => 'lastname',
					"id" => 'lastname',
					"value" => set_value ( "lastname" ),
					"class" => (empty ( form_error ( "lastname" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_lastname_label"] = array (
					"data-error" => form_error ( 'lastname', null, null ),
					"data-success" => "OK" );
			
			$data ["form_address"] = array (
					"name" => 'address',
					"id" => 'address',
					"value" => set_value ( "address" ),
					"class" => (empty ( form_error ( "address" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_address_label"] = array (
					"data-error" => form_error ( 'address', null, null ),
					"data-success" => "OK" );
			
			$data ["form_number_address"] = array (
					"name" => 'number',
					"id" => 'number',
					"value" => set_value ( "number" ),
					"type" => "number",
					"class" => (empty ( form_error ( "number" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_number_address_label"] = array (
					"data-error" => form_error ( 'number', null, null ),
					"data-success" => "OK" );
			
			$data ["form_city"] = array (
					"name" => 'city',
					"id" => 'city',
					"value" => set_value ( "city" ),
					"class" => (empty ( form_error ( "city" ) )) ? "autocomplete validate" : "autocomplete validate invalid",
					"required" => "required" );
			$data ["form_city_label"] = array (
					"data-error" => form_error ( 'city', null, null ),
					"data-success" => "OK" );
			
			$data ["form_country"] = array (
					"name" => 'country',
					"id" => 'country',
					"value" => set_value ( "country" ),
					"class" => (empty ( form_error ( "country" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_country_label"] = array (
					"data-error" => form_error ( 'country', null, null ),
					"data-success" => "OK" );
			
			$data ["form_phone"] = array (
					"name" => 'phone',
					"id" => 'phone',
					"value" => set_value ( "phone" ),
					"class" => (empty ( form_error ( "phone" ) )) ? "validate" : "validate invalid",
					"type" => "tel",
					"required" => "required" );
			$data ["form_phone_label"] = array (
					"data-error" => form_error ( 'phone', null, null ),
					"data-success" => "OK" );
			
			$data ["form_num_child"] = array (
					"name" => 'num_child',
					"id" => 'num_child',
					"value" => set_value ( "num_child" ),
					"class" => (empty ( form_error ( "num_child" ) )) ? "validate" : "validate invalid",
					"type" => "number",
					"required" => "required" );
			$data ["form_num_child_label"] = array (
					"data-error" => form_error ( 'num_child', null, null ),
					"data-success" => "OK" );
			$data["form_social_group_option"] = $this->account_model->get_social_plan()->result();
			$data ["form_social_group_label"] = array (
					"data-error" => form_error ( 'social_group', null, null ),
					"data-success" => "OK" );
			
			$data ["form_work"] = array (
					"name" => 'work',
					"id" => 'work',
					"value" => set_value ( "work" ),
					"class" => (empty ( form_error ( "work" ) )) ? "validate" : "validate invalid",
					"required" => "required" );
			$data ["form_work_label"] = array (
					"data-error" => form_error ( 'work', null, null ),
					"data-success" => "OK" );
			$data ["form_bank_option"] = $this->bank_model->get_bank_all()->result();
			$data ["form_bank_label"] = array (
					"data-error" => form_error ( 'bank', null, null ),
					"data-success" => "OK" );
			
			
			$this->load->view ( 'template/head', $data );
			$this->load->view ( 'template/header' );
			$this->load->view ( 'account/signup', $data );
			$this->load->view ( 'template/footer' );
		}
		else
		{
			$address_data = array (
					"Number" => set_value("number"),
					"Street" => set_value("address"),
					"idCity" => array_search(set_value("city"), $data["city_list"])
			);
			
			
			
			/*
			 * Prep Array for Insert Into BDD
			 */
			$user_data = array(
					"Email" => set_value("email"),
					"Password" => set_value("password"),
					"Gender" => set_value("gender"),
					"Firstname" => set_value("firstname"),
					"Lastname" => set_value("lastname"),
					"Phone" => set_value("phone"),
					"Child" => set_value("num_child"),
					"SocialPlan" => set_value("social_group"),
					"Work" => set_value("work"),
					"idBank" => set_value("bank")
			);
			
			/*
			 * Insert into BDD
			 */
			if ($this->account_model->insert_client($user_data, $address_data))
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
			//$this->load->view ( 'account/profile', $data );
			$this->load->view ( 'maintenance/construction' );
			$this->load->view ( 'template/footer' );
		}
		else
		{
			redirect('/signin');
		}
	}
	public function consultation()
	{
		if($this->toolbox->is_logged())
		{
			$data["title_page"] = "Consultation de l'historique";
			$data ["user_data"] = $this->session->get_userdata("user")["user"];
			/*
			 * Récupération de l'historique des opérations
			 */
			$data["history"] =	$this->account_model->get_accountBalance($data ["user_data"]->Id, ($data ["user_data"]->IdCustomerGroup == 2));
			
			$this->load->view ( 'template/head', $data );
			$this->load->view ( 'template/header' );
			$this->load->view ( 'account/history', $data );
			$this->load->view ( 'template/footer' );
		}
		else
		{
			redirect('/signin');
		}
		
	}
}
?>