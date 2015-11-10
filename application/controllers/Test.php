<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Test extends CI_Controller
{
  /*
  $rules is rules validation in add users
  */

  public function index()
  {
    $this->load->model('mod_main');
    $var = $this->mod_main->get_step($this->session->session_id);
    
    var_dump($var);
    var_dump($this->session->session_id);
  }
  function unset_time()
  {
    unset($_SESSION['timeis']);
  }
 

}
