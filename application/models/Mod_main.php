<?php
class Mod_main extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    function get_img()
    {
           $html = file_get_contents('http://www.gifbin.com/random');
           preg_match_all('/<img[^>]+>/i',$html, $result); 
           return $result['0']['2'];
    }
    function get_step($sess)
    {
     $step =   $this->db
                    ->select('u.id step_1,q.id step_2')
                    ->where('u.sess',$sess)
                    ->from('users u')
                    ->join('questions q','q.user_id = u.id','left')
                    ->get()
                    ->row();
      $data['step'] = 'step_1';
      $data['user_id'] = null;
      if($step == null)
      {
        return $data;
      } 
      else if($step->step_2 == null)
      {
        $data['step'] = 'step_2';
        $data['user_id'] = $step->step_1;
        return $data;
      } 
      else
      {
        $data['step'] = 'step_3';
        return $data;
      }            
    }
    public function add_step_1()
    {
        $this->db
             ->set('first_name',$this->input->post('first_name'))
             ->set('last_name',$this->input->post('last_name'))
             ->set('email',$this->input->post('email'))
             ->set('birthday',$this->input->post('birthday'))
             ->set('size',$this->input->post('size'))
             ->set('sess',$this->session->session_id)
             ->insert('users');
        return $this->db->insert_id();     
             
    }    
    public function add_step_2()
    {
        $this->db
             ->set('ice_cream',$this->input->post('ice_cream'))
             ->set('superhero',$this->input->post('superhero'))
             ->set('movie_star',$this->input->post('movie_star'))
             ->set('end',$this->input->post('end'))
             ->set('super_bowl',$this->input->post('super_bowl'))
             ->set('user_id',$this->input->post('user_id'))
             ->insert('questions');
        return $this->db->insert_id();     
           
    }
}  
     