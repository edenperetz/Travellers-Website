<?php

class Purchase_model extends CI_Model {
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function save($data){
         //set flag in order to avoid showing php errors
        $this->db->db_debug = FALSE; 

        $error=null;
        if (!$this->db->insert('reservations', $data)){
            $error=$this->db->error();
        }
            
        return $error;

     }
     
         public function get_destName($attId){
        $this->db->select('destName');
        $this->db->from('attractions');
        $this->db->where('attId', $attId);
         $query = $this->db->get();
         return $query->row();
    }
}