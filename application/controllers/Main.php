<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
  /*
  $rules is rules validation in add users
  */
  protected $rules_step_1 = array(
    'first_name' => array(
      'field' => 'first_name',
      'label' => 'First name ',
      'rules' => 'trim|htmlspecialchars|required|min_length[2]|max_length[50]|encode_php_tags'),
    'last_name' => array(
      'field' => 'last_name',
      'label' => 'Last name',
      'rules' => 'trim|htmlspecialchars|required|min_length[2]|max_length[50]|encode_php_tags'),
    'email' => array(
      'field' => 'email',
      'label' => 'Email address',
      'rules' => 'trim|is_unique[users.email]|min_length[3]|max_length[50]|required|htmlspecialchars|encode_php_tags|valid_email'),
    'birthday' => array(
      'field' => 'birthday',
      'label' => 'Birthday',
      'rules' => 'trim|required|htmlspecialchars|encode_php_tags'),
    'size' => array(
      'field' => 'size',
      'label' => 'Shoe size',
      'rules' => 'trim|required|htmlspecialchars|encode_php_tags'),
    );  //*git 2
  protected $rules_step_2 = array(
    'ice_cream' => array(
      'field' => 'ice_cream',
      'label' => 'What is Your Favorite Ice cream?',
      'rules' => 'trim|htmlspecialchars|required|max_length[255]|encode_php_tags'),
    'superhero' => array(
      'field' => 'superhero',
      'label' => 'Who is your favorite superhero?',
      'rules' => 'trim|htmlspecialchars|required|max_length[255]|encode_php_tags'),
    'movie_star' => array(
      'field' => 'movie_star',
      'label' => 'Who is your favorite movie star?',
      'rules' => 'trim|htmlspecialchars|required|max_length[255]|encode_php_tags'),  
    'end' => array(
      'field' => 'end',
      'label' => 'when do you think the world will end?',
      'rules' => 'trim|htmlspecialchars|required|max_length[255]|encode_php_tags'),   
    'super_bowl' => array(
      'field' => 'super_bowl',
      'label' => 'Who will win the super bowl this year?',
      'rules' => 'trim|htmlspecialchars|required|max_length[255]|encode_php_tags'),   
     );
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mod_main');
  }
  public function index()
  {
    if(!$this->session->timeis)
    {
        $this->session->set_userdata(array('timeis'=>time()));
    }
    $data =  $this->mod_main->get_step($this->session->session_id);
    $time = 360 - (time()-$_SESSION['timeis']) ;
    $this->load->view('main',array('time'=>$time,'step'=>$data['step'],'user_id'=>$data['user_id']));
  }
  function add_step_1()
  {
    $fields = new StdClass();
    if ($this->input->is_ajax_request())
    {
      $post = new StdClass();
      $this->load->library('form_validation');
      $this->form_validation->set_rules($this->rules_step_1);
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      if ($this->form_validation->run())
      {
        $id = $this->mod_main->add_step_1();
        if ($id)
        {
          echo json_encode(array('success' => true, 'message' => $this->load->view('step_2',array('user_id'=>$id),true)));
        } else
          echo json_encode(array('success' => false, 'message' => 'Error!!!'));
      } else
      {
        foreach ($this->rules_step_1 as $k => $v)
        {
          $post->{$v['field']} = form_error($v['field']);
        }
         echo json_encode(array('success' => false, 'fields' => $post));
      }
    } else
    {
         show_404();
    }
  }  
  function add_step_2()
  {
    $fields = new StdClass();
    if ($this->input->is_ajax_request())
    {
      $post = new StdClass();
      $this->load->library('form_validation');
      $this->form_validation->set_rules($this->rules_step_2);
      $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
      if ($this->form_validation->run())
      {
        $id = $this->mod_main->add_step_2();
        if ($id)
        {
             
          echo json_encode(
          array('success' => true, 
          'message' => $this->load->view('step_3',array(),true)));
        } else
          echo json_encode(array('success' => false, 'message' => 'Error!!!'));
      } else
      {
        foreach ($this->rules_step_2 as $k => $v)
        {
          $post->{$v['field']} = form_error($v['field']);
        }
         echo json_encode(array('success' => false, 'fields' => $post));
      }
    } else
    {
        show_404();
    }
  }
  function unset_time()
  {
    unset($_SESSION['timeis']);
    unset($_SESSION['session_id']);
  }
 
}
