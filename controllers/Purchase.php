<?php


class Purchase extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Purchase_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
    }
    
       public function load_header(){
       $data['user']=$this->session->all_userdata();
       $this->load->view('templates/header',$data);
       return $data;
    }
    
    public function index()
    {  
       $this->load_header();
       $data['user']=$this->session->all_userdata();
       
       if (isset($data['user']['loggedin'])) //first, we are checking if the user logged in
       {
            $attractionName=$_GET['attraction'];
            $data['attractionName']=$attractionName;
            $price=$_GET['price'];
            $data['price']=$price;
            $attId=$_GET['attId'];
            $data['attId']=$attId;
            $this->load->view('purchase/index',$data);
            
       }
       else{ //the user not loged in
//                 echo 'You must log in';
//                 $this->load->view('purchase/index', $data);
            redirect('Auth/login');
       }
       
       $this->load->view('templates/footer');
    }

    public function save_res(){

        $data = array(
               'username' => $this->input->post('username'), 
               'attId' => $this->input->post('attId'),
               'amount' => $this->input->post('Quantity'),
               'totalPrice' => $this->input->post('totalPrice')
                
         );
        
        $error=$this->Purchase_model->save($data);
        if ($error){
            print_r($error);
        }
        else
            $this->thanks ($data['attId']);
           
    }
    public function thanks($attId){
        $this->load_header();
 
        $destName=$this->Purchase_model->get_destName($attId);
//        echo ($destName->destName);
          $this->load->view('purchase/thanks',$destName);
        $this->load->view('templates/footer');
    }
    

}