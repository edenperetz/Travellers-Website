<?php


class Tips extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Tips_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
    }
    
       public function load_header(){
       $data['user']=$this->session->all_userdata();
       $this->load->view('templates/header',$data);
       return $data;
    }
    
    public function index($destName=null)
    {  
       $nameExists = isset($_GET['destName']);
       if ($nameExists)
           $destName=$_GET['destName'];
       
       $this->load_header();
       $data['tips']=$this->Tips_model->get_usersTips($destName);
       $data['destName']=$destName;
       $this->load->view('destinations/tips_view', $data);
       $this->load->view('templates/footer');
    }
    public function save_tip(){

        $data = array(
               'username' => $this->input->post('username'), 
               'destName' => $this->input->post('destName'),
               'description' => $this->input->post('description')
                
         );
        
        $error=$this->Tips_model->save($data);
        if ($error){
            print_r($error);
        }

            $this->index($data['destName']);
           

    }

} 