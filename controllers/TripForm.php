<?php

class TripForm extends CI_Controller{
       public function __construct(){
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('email');
    }
    
        public function load_header(){
            $data['user']=$this->session->all_userdata();
            $this->load->view('templates/header',$data);
            return $data;
    }
    
    public function planning_form($error = ''){
        $this->load_header();
        $data['error'] = $error;
        $this->load->view('destinations/planform',$data);
        $this->load->view('templates/footer');
   }
   
    public function save_form(){
        
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('FullName','Full Name','regex_match[/^([a-z ])+$/i]');
            $this->form_validation->set_rules('budget','Budget','numeric|greater_than[0]');
            $this->form_validation->set_rules('mobile','Mobile number','numeric|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('city','Destination','required|in_list[Amsterdam,Barcelona,Rome,Paris,Berlin]');
            $this->form_validation->set_rules('observeShabbat','observe Shabbat','required|in_list[Yes,No]');
            $this->form_validation->set_rules('from_day','From date','callback_startdate');
            $this->form_validation->set_rules('to_day','To date','callback_compareDate');


            if($this->form_validation->run()==FALSE)
            {
            $this->load_header();
            $this->load->view('destinations/planform');
            $this->load->view('templates/footer');
            }
          else{
                $data1 = array(
                'FullName' => $this->input->post('FullName'),
                'email' => $this->input->post('email'),
                'mobileNum' => $this->input->post('mobile'),
                'destCity' => $this->input->post('city'),
                'observeShabbat' => $this->input->post('observeShabbat'),
                'vacPurp' => $this->input->post('hobbies'),
                'diet' => $this->input->post('Dietary'),
                'adults' => $this->input->post('adults'),
                'kids' => $this->input->post('kids'),
                'budgetForDay' => $this->input->post('budget'),
                'fromDate' => $this->input->post('from_day'),
                'toDate' => $this->input->post('to_day'),
                'comments' => $this->input->post('comments'),

             );
        $this->Users_model->save_form($data1);
        $this->load_header();
        $this->load->view('destinations/formsuccess');
        $this->load->view('templates/footer');

        }
        
    }
  

    public function compareDate() {

        $startDate = $this->input->post('from_day');
        $endDate = $this->input->post('to_day');

        if ($endDate >= $startDate){
        return True;}
        else {
                $this->form_validation->set_message('compareDate', 'To Date should be greater than From Date.');

          return False;
        }
    }
      
    public function startdate(){
        $fromday = $this->input->post('from_day');
        $today = date('Y-m-d');

       if ($fromday >= $today){

           return True;

       }
      else {
              $this->form_validation->set_message('startdate', 'From date should be from today date and on.');

        return False;
      }


    }  
}
