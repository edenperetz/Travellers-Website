<?php

class Auth extends CI_Controller {
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    public function load_header(){
       $data['user']=$this->session->all_userdata();
       $this->load->view('templates/header',$data);
       return $data;
    }
    
    public function get_user_info(){
       $data = $this->load_header();
       //$user = (array)$data['user'];
       $this->load->view('users/userProfile',$data);
       $this->load->view('templates/footer');
    }
    
     public function login($data=array('error'=>null)){
       $this->load_header();
       $this->load->view('users/login',$data);
       $this->load->view('templates/footer');
   }
   
   function logout()
    {
        $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                    $this->session->unset_userdata($key); //delete all the keys in the session that are different than the keys in the if statement
                }
            }
        $this->session->sess_destroy();
        redirect("home");
    }
       public function register($error = ''){
        $data = $this->load_header();
        $data['error'] = $error;
        $data['userExist'] =FALSE;
        $this->load->view('users/register',$data);
        $this->load->view('templates/footer');
   }
  
     public function save_register(){
       $this->form_validation->set_rules('username','username','required|max_length[32]');
       $this->form_validation->set_rules('password','Password','required|max_length[32]');
       $this->form_validation->set_rules('fullName','Full Name','required|regex_match[/^([a-z ])+$/i]|max_length[40]');
       $this->form_validation->set_rules('gender','Gender','required|in_list[Male,Female]');
       $this->form_validation->set_rules('maritalStatus','Marital Status','required|in_list[single,Married with kids,Married without kids]');
       $this->form_validation->set_rules('age','Age','required|numeric|greater_than[0]');
       $this->form_validation->set_rules('travelType','Travel Type','required|in_list[Nature,Urban,Both]');
       $valid = $this->form_validation->run();
       $error = array('userExist'=>FALSE);
       if($this->db->get_where('users',array('username'=>$this->input->post('username')))->result()!=null){
           $valid = FALSE;
           $error['userExist'] = TRUE;
       }
        if($valid == FALSE){
        $this->load_header();
        $this->load->view('users/register',$error);
        $this->load->view('templates/footer');
        }
        else{
          $data = array(
               'username' => $this->input->post('username'),
               'password' => md5($this->input->post('password')),
               'fullName' => $this->input->post('fullName'),
               'gender' => $this->input->post('gender'),
               'maritalStatus' => $this->input->post('maritalStatus'),
               'age' => $this->input->post('age'),
               'travelType' => $this->input->post('travelType')
          
         );
          
        $error=$this->Users_model->save($data);
        if ($error) {
            $this->register($error);
        }
        else{
            $data['loggedin']='1';
            $data['message']='User Registered successfuly';
            $data['code']=1;
            $this->login();
           
        }
   }}

   
  public function do_login(){
     $data = array(
               'username' => $this->input->post('username'),
               'password' => md5($this->input->post('password'))
                
             );
     
            $check=$this->Users_model->auth($data);
         
            if ($check==null){
               $data['error']='Incorrecrt User or password';
               $this->login($data);
            }
            else{
                $data['user']=$check[0];
                $data['loggedin']='1';
                #save the couples in "session" like in array
                $this->session->set_userdata($data);
                redirect("Home");
            } 
    }
    
    function get_user_name(){
        header('Content-Type: application/json');
        echo json_encode(array('userName'=>$this->session->user->username));
    }
    
}
