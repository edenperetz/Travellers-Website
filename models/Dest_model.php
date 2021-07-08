<?php
class Dest_model extends CI_Model{
    //put your code here
     public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function DestInfo($destName){
        $query = $this->db->get_where('destinations', array('destName' => $destName)); 
        /** @var type $query */
        return $query->result();

     }
     
     public function AttInfo($destName){
        $query = $this->db->get_where('attractions', array('destName' => $destName));
        /** @var type $query */
        return $query->result();

     }
     
     public function graphs($destName){
         $data = array(
          'AttractionsOrders'=> json_encode($this->db->query('SELECT attractions.* ,COUNT(reservations.attID) AS numOfReservations FROM `reservations` '
           .'JOIN attractions ON attractions.attId = reservations.attId WHERE attractions.destName = "'.$destName.'" GROUP BY reservations.attId')->result()),
           'CustomersMaritalStatus'=> json_encode($this->db->query('SELECT users.* ,COUNT(users.username) AS numOfUsers FROM `reservations` '
           . 'JOIN attractions ON attractions.attId = reservations.attId JOIN users ON reservations.username=users.username WHERE attractions.destName = "'.$destName.'" GROUP BY users.maritalStatus')->result()),
           'CustomersGender'=> json_encode($this->db->query('SELECT users.* ,COUNT(users.username) AS numOfUsers FROM `reservations` '
           . 'JOIN attractions ON attractions.attId = reservations.attId JOIN users ON reservations.username=users.username WHERE attractions.destName = "'.$destName.'" GROUP BY users.gender')->result()),
           'CustomersAgeGroup' => json_encode($this->db->query('SELECT COUNT(*)as numOfUsers, CASE WHEN age BETWEEN 18 AND 24 THEN "18-24" WHEN age BETWEEN 25 AND 34 THEN "25-34"'
           . ' WHEN age BETWEEN 35 AND 44 THEN "35-44" WHEN age BETWEEN 45 AND 54 THEN "45-54" WHEN age > 54 THEN "55+" END AS age_range '
           . 'FROM reservations JOIN attractions on reservations.attId=attractions.attId JOIN users ON users.username=reservations.username WHERE attractions.destName = "'.$destName.'" GROUP BY age_range DESC')->result()),
           'MostPopularAtDest'=> $this->db->query('SELECT attractions.* ,COUNT(reservations.attID) AS numOfReservations FROM `reservations` '
           . 'JOIN attractions ON attractions.attId = reservations.attId WHERE attractions.destName = "'.$destName.'" GROUP BY reservations.attId ORDER BY numOfReservations DESC
            LIMIT 3')->result(),
           'destName' => $destName
         );
         return $data;
     }
     
    
}
