<?php

class Home extends CI_Controller {
    //put your code here
   public function __construct(){
        parent::__construct();
        $this->load->model('Dest_model');
        $this->load->model('Users_model');
         $this->load->helper('url');
         $this->load->library('session');
    }
    
       public function load_header(){
       $data['user']=$this->session->all_userdata();
       $this->load->view('templates/header',$data);
       return $data;
    }
    
   public function index(){
       $this->load_header();
       $this->load->view('users/homepage');
       $this->load->view('templates/footer');
   }
    
   public function getDestPage(){
       $destData = $this->getDestInfo($_GET['destName']);
       $destWeather = $this->weatherApi($destData);
       $this->load_header();
       $data = array(
           'destWeather' => $destWeather['weather'][0],
           'destDegrees' => $destWeather['main'],
           'destData'=> $destData,
           'destTime'=>  $this ->timeApi($destData)
       );
       $this->load->view('destinations/mainPage', $data);
       $this->load->view('templates/footer');  
   }
 
   public function weatherApi($destData){
        error_reporting(0);
        $city=$destData ->destName;
        $urlContents="https://api.openweathermap.org/data/2.5/weather?q=".urlencode($city)."&appid=c09546c60fdde84cd0a723e905d47495";
        $response = file_get_contents($urlContents);
        $weatherArray = json_decode($response, true);
        return $weatherArray;
      
   }
   
    public function timeApi(){
        error_reporting(0);
        $response = file_get_contents("http://worldclockapi.com/api/json/CET/now");
        $data = json_decode($response, true);
        return $data['currentDateTime']; 
   } 
   
   
   public function getDestInfo($destName){
       $data = $this -> Dest_model-> DestInfo($destName);
       return $data[0];
   }
   
   public function usersStatistics(){
       $this->load_header();
       $graphsData = $this->Users_model->usersStat();
       $this->load->view('users/usersStatistics',$graphsData);
       $this->load->view('templates/footer');
       
   }
   
}