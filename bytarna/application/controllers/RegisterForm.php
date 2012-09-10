<?php

class RegisterForm extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('RegisterForm_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('username', 'Användarnamn', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('firstname', 'Förnamn', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('lastname', 'efternamn', 'required|trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('city', 'Stad', 'trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('country', 'Land', 'trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('zip', 'Postnr', 'trim|xss_clean|is_numeric');			
		$this->form_validation->set_rules('phone', 'Telefon', 'trim|xss_clean|is_numeric');			
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email');			
		$this->form_validation->set_rules('password', 'Lösenord', 'required|trim|xss_clean|max_length[255]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('RegisterForm_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'username' => set_value('username'),
					       	'firstname' => set_value('firstname'),
					       	'lastname' => set_value('lastname'),
					       	'city' => set_value('city'),
					       	'country' => set_value('country'),
					       	'zip' => set_value('zip'),
					       	'phone' => set_value('phone'),
					       	'email' => set_value('email'),
					       	'password' => set_value('password')
						);
					
			// run insert model to write data to db
		
			if ($this->RegisterForm_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				$this->load->view('login_view');
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>