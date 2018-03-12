<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Product extends CI_Controller
{
	/*
	 * Set Error Delimiter
	 */
	public function __construct()
	{
		parent::__construct ();
		
		if (! $this->toolbox->is_logged ())
		{
			redirect('/signin');
		}
		
		$this->load->helper ( "form" );
		$this->load->library ( 'form_validation' );
		$this->load->model ( "product_model" );
	}
	public function index()
	{
		$data ["title_page"] = "Subscribe a new product";
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		$this->load->view ( 'account/signin', $data );
		$this->load->view ( 'template/footer' );
	}
	public function subcribe($product_type = NULL)
	{
		$data ["title_page"] = "Subscribe";
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		
		switch ($product_type)
		{
			case "checking" :
				$this->checking_subcribe ();
				break;
			case "saving" :
				$this->saving_subcribe();
				break;
			case "mutual" :
				$this->load->view ( 'maintenance/construction' );
				break;
			case "life" :
				$this->load->view ( 'maintenance/construction' );
				break;
			default :
				$this->load->view ( 'product/choose' );
				break;
		}
		
		$this->load->view ( 'template/footer' );
	}
	
	public function success($type_success = "default")
	{
		switch ($type_success)
		{
			case "checking" :
				$data ["text"] = "Congratulation ! You have successfully subscribe a checking account.";
				$data ["mini_text"] = "You will be redirect in 5 sec in your dashboard...";
				break;
			default :
				$data ["text"] = "All is good.";
				break;
		}
		
		$this->load->view ( 'template/head', $data );
		$this->load->view ( 'template/header' );
		$this->load->view ( 'product/success', $data );
		$this->load->view ( 'template/footer' );
	}
	private function checking_subcribe()
	{
		/*
		 * Sign In Form Script
		 */
		if ($this->form_validation->run () == FALSE)
		{
			$data ["form_plan_option"] = $this->product_model->get_checking_all ();
			$data ["form_plan_label"] = array (
					"data-error" => form_error ( 'plan', null, null ),
					"data-success" => "OK" );
			
			$data ["form_card_option"] = $this->product_model->get_card_all ();
			$data ["form_card_label"] = array (
					"data-error" => form_error ( 'card', null, null ),
					"data-success" => "OK" );
			
			$data ["form_tos"] = array (
					'name' => 'tos',
					'id' => 'tos',
					'value' => 'accept',
					'class' => 'filled-in',
					'checked' => FALSE );
			$data ["form_tos_label"] = array (
					"data-error" => form_error ( 'tos', null, null ),
					"data-success" => "OK" );
			
			$this->load->view ( 'product/checking', $data );
		}
		else
		{
			/*
			 * Add the product for the current user
			 */
			
			/*
			 * Prep Array for Insert Into BDD
			 */
			$account_data = array(
					"IdCard" => set_value("card")
			);
			
			$contract_data = array(
					"IdProduct" => set_value("plan"),
					"IdCustomer" => $this->session->userdata("user")->Id
			);
			
			/*
			 * Insert into BDD
			 */
			if ($this->product_model->insert_contract_checking($contract_data, $account_data))
			{
				$this->success ("checking");
				
				$this->output->set_header('refresh:5; url='.base_url("dashboard"));
			}
			else
			{
				$this->failed ();
			}
		}
	}
	private function saving_subcribe()
	{
		/*
		 * Sign In Form Script
		 */
		if ($this->form_validation->run () == FALSE)
		{
			$data ["form_plan_option"] = $this->product_model->get_saving_all ();
			$data ["form_plan_label"] = array (
					"data-error" => form_error ( 'plan', null, null ),
					"data-success" => "OK" );
			$data ["form_tos"] = array (
					'name' => 'tos',
					'id' => 'tos',
					'value' => 'accept',
					'class' => 'filled-in',
					'checked' => FALSE );
			$data ["form_tos_label"] = array (
					"data-error" => form_error ( 'tos', null, null ),
					"data-success" => "OK" );
			
			$this->load->view ( 'product/saving', $data );
		}
		else
		{
			/*
			 * Add the product for the current user
			 */
			
			/*
			 * Prep Array for Insert Into BDD
			 */
			$account_data = array(
					"IdCard" => NULL
			);
			
			$contract_data = array(
					"IdProduct" => set_value("plan"),
					"IdCustomer" => $this->session->userdata("user")->Id
			);
			
			/*
			 * Insert into BDD
			 */
			if ($this->product_model->insert_contract_saving($contract_data, $account_data))
			{
				$this->success ("saving");
				
				$this->output->set_header('refresh:5; url='.base_url("dashboard"));
			}
			else
			{
				$this->failed ();
			}
		}
	}
}