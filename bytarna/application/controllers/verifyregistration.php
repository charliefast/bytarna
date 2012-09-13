<?php

class VerifyRegistration extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->lang->load('form_validation', 'swedish');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('user_model','',TRUE);
	}	
	function index()
	{			
			
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
		if ($this->form_validation->run('signup') == FALSE) // validation hasn't been passed
		{
			$this->load->view('registration_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			$password = set_value('password');

			$form_data = array(
					       	'username' => set_value('username'),
					       	'firstname' => set_value('firstname'),
					       	'lastname' => set_value('lastname'),
					       	'city' => set_value('city'),
					       	'country' => set_value('country'),
					       	'zip' => set_value('zip'),
					       	'phone' => set_value('phone'),
					       	'email' => set_value('email'),
					       	'password' => SHA1('shru7hTTls'.$password)
						);
					
			// run insert model to write data to db
		
			if ($this->user_model->newUser($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				$this->load->view('login_view');
			}
			else
			{
			echo 'Ett fel uppstod. Var god försök senare.';
			// Or whatever error handling is necessary
			}
		}
	}
    function user_exists($username){
      $query = $this->db->query('SELECT username FROM members WHERE username = ' . "'" . $username . "'");
      if ($query -> num_rows() == 0);
      {
        return TRUE;
      }
      return FALSE;

  }

}
?>