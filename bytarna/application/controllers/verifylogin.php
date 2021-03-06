<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model','',TRUE);

    $this->load->library('form_validation');
 
    $this->lang->load('form_validation', 'swedish');
  }

  function index()
  {
    if($this->form_validation->run('login') == FALSE)
    {
      //Field validation failed.&nbsp; User redirected to login page
      $this->load->view('login_view');
    }
    else
    {
      //Go to private area
      redirect('index.php/home', 'refresh');
    }

  }

  function check_database($password)
  {
    //Field validation succeeded.&nbsp; Validate against database
    $username = $this->input->post('username');

    //query the database
    $result = $this->user_model->login($username, $password);

    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'username' => $row->username
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }

  //use this function when using ajax validation. use "echo site_url('index.php/verifylogin/ajax_check');" for example and type must be 'post'.
  function ajax_check() {
    if($this->input->post('ajax') == '1') {
      if($this->form_validation->run('login') == FALSE){
      //Field validation failed.
        echo validation_errors();
      }
      else
      {
      //Go to private area
      echo 'login successful';
      }
    }
  }
}
?>
