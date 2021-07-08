<?php

class Tips_model extends CI_Model {
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_usersTips($destName){
        $this->db->order_by("tipDate", "DESC");
       $query=$this->db->get_Where('tips', array('destName'=>$destName));
//        $query=$this->db->get('tips');
        return $query->result();
    }
    
    public function save($data){
         //set flag in order to avoid showing php errors
        $this->db->db_debug = FALSE; 

        $error=null;
        if (!$this->db->insert('tips', $data)){
            $error=$this->db->error();
        }
            
        return $error;

     }
}