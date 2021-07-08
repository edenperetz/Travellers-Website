<?php

class Attractions extends CI_Controller{
    
     public function __construct(){
        parent::__construct();
        $this->load->model('Dest_model');
        $this->load->model('Users_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('cart');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
        public function load_header(){
       $data['user']=$this->session->all_userdata();
       $this->load->view('templates/header',$data);
       return $data;
    }
    
       public function getAttractionsPage(){
        $destAttractions = $this->getDestAtt($_GET['destName']);
        $this->load_header();
        $data['Attractions'] = $destAttractions;
        $this->load->view('destinations/attractions',$data);
        $this->load->view('templates/footer');  
   } 
   
    
     public function getDestAtt($destName){
       $data = $this -> Dest_model-> AttInfo($destName);
       return $data;
   }
   
   public function getAttStatistics(){
        $destName = $_GET['destName'];
        $graphs = $this -> Dest_model->graphs($destName);
        $this->load_header();
        $this->load->view('destinations/statistics', $graphs);
        $this->load->view('templates/footer');  
   }
   
      public function show_prev_orders(){
       $this->load_header();
       $data['orders']=$this->Users_model->get_Prev_Orders();
       $this->load->view('users/prev_orders',$data);
       $this->load->view('templates/footer');

    }   
    
    public function recommendations(){
       $this->load_header();
       $orders=$this->Users_model->get_Prev_Orders();
       if ($orders==null): 
           $data = $this->Users_model->mostPopularDest();
           $data['order'] = "did not ordered before";
       else :
           $data['order'] = "ordered before";
           $data['recommendByPastOrders']=$this->Users_model->getAttFromSameCategorys()['futureAtt'];
           $data['categoriesOfPrevOrders']=$this->Users_model->getAttFromSameCategorys()['categoriesOfPrevOrders'];
           $data['categoryOrderedTheMost']=$this->Users_model->getAttFromSameCategorys()['categoryOrderedTheMost'];
           $data['destsForFavCategory']=$this->Users_model->getAttFromSameCategorys()['destsForFavCategory'];
       endif;
       $this->load->view('users/recommendations',$data);
       $this->load->view('templates/footer');
    }

}
