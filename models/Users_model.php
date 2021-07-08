<?php
class users_model extends CI_Model {
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function save($data){
         //set flag in order to avoid showing php errors
        $this->db->db_debug = FALSE; 

        $error=null;
        if (!$this->db->insert('users', $data)){
            $error=$this->db->error();
        }
            
        return $error;

     }
     public function auth($data){
        $query = $this->db->get_where('users', $data);
        return $query->result();

     }
     
        public function get_Prev_Orders(){
        //getting all the resevations with this username
        $data['user']=$this->session->all_userdata(); 
        
        $this->db->select('*');
        $this->db->from('reservations');
        $this->db->where('username', $data['user']['username']);
        //join tables
        //we have the attraction number
        //now we want to get the attraction name + attraction city
        $this->db->join('attractions', 'attractions.attId = reservations.attId');
        $query = $this->db->get();
        return $query->result();
    }
    
     public function mostPopularDest(){
         $dataArray = array(
             'byMaritalStatus'=>$this->db->query('SELECT COUNT(*) AS numOfUsers,destinations.destName FROM users JOIN reservations ON reservations.username = users.username '
                . 'JOIN attractions ON attractions.attId = reservations.attID JOIN destinations ON destinations.destName = attractions.destName WHERE users.maritalStatus = "'.$this->session->all_userdata()['user']->maritalStatus.'" '
                . 'GROUP BY destinations.destName ORDER BY numOfUsers DESC LIMIT 1')->result(),
             'byTravelType' => $this->db->query('SELECT COUNT(*) AS numOfUsers,destinations.destName FROM users JOIN reservations ON reservations.username = users.username '
                . 'JOIN attractions ON attractions.attId = reservations.attID JOIN destinations ON destinations.destName = attractions.destName WHERE users.travelType = "'.$this->session->all_userdata()['user']->travelType.'" '
                . 'GROUP BY destinations.destName ORDER BY numOfUsers DESC LIMIT 1')->result(),
             'byAgeGroup' => $this->db->query('SELECT COUNT(*) AS numOfUsers,destinations.destName FROM users JOIN reservations ON reservations.username = users.username '
                . 'JOIN attractions ON attractions.attId = reservations.attID JOIN destinations ON destinations.destName = attractions.destName WHERE users.age BETWEEN '.$this->session->all_userdata()['user']->age. '-3 AND '.$this->session->all_userdata()['user']->age. '+3 '
                . 'GROUP BY destinations.destName ORDER BY numOfUsers DESC LIMIT 1')->result(),
             'byGender' =>$this->db->query('SELECT COUNT(*) AS numOfUsers,destinations.destName FROM users JOIN reservations ON reservations.username = users.username '
                . 'JOIN attractions ON attractions.attId = reservations.attID JOIN destinations ON destinations.destName = attractions.destName WHERE users.gender = "'.$this->session->all_userdata()['user']->gender.'" '
                . 'GROUP BY destinations.destName ORDER BY numOfUsers DESC LIMIT 1')->result(),
             'perfectMatch'=>$this->db->query('SELECT COUNT(*) AS numOfUsers,destinations.destName FROM users JOIN reservations ON reservations.username = users.username '
                . 'JOIN attractions ON attractions.attId = reservations.attID JOIN destinations ON destinations.destName = attractions.destName '
                . 'WHERE users.maritalStatus = "'.$this->session->all_userdata()['user']->maritalStatus.'" AND users.gender = "'.$this->session->all_userdata()['user']->gender.'" '
                . 'AND users.age BETWEEN '.$this->session->all_userdata()['user']->age. '-3 AND '.$this->session->all_userdata()['user']->age. '+3'
                . ' AND users.gender = "'.$this->session->all_userdata()['user']->gender.'" GROUP BY destinations.destName ORDER BY numOfUsers DESC LIMIT 1')->result()
                 );
         //if we didn't get empty query we want to take the value of dest name for recommend the user
         foreach ($dataArray as $key => &$value){
             if($value != null){
                 $value = $value[0] ->destName;
             }
         }

        $data = array(
            'perfectMatch' => $dataArray['perfectMatch'],
            'byMaritalStatus' => $dataArray['byMaritalStatus'],
            'byTravelType' => $dataArray['byTravelType'],
            'byAgeGroup' => $dataArray['byAgeGroup'],
            'byGender' =>$dataArray['byGender']
        );
        return($data);
        
    }
    
    public function getAttFromSameCategorys(){
        $categoriesOfPrevOrders = $this->db->query('SELECT attractions.category FROM reservations JOIN attractions ON attractions.attId = reservations.attId JOIN users ON users.username=reservations.username WHERE users.username="'.$this->session->all_userdata()["user"]->username.'" GROUP BY attractions.category')->result();
        $userName= $this->session->all_userdata()['user']->username;
        for($i = 0; $i<sizeof($categoriesOfPrevOrders); $i++){
            $category = $categoriesOfPrevOrders[$i]->category;
            $attArray[$i]= $this->db->query('SELECT attractions.attractionName,attractions.destName FROM attractions WHERE attractions.category="'.$category.'" AND attractions.attractionName NOT IN (SELECT attractions.attractionName FROM attractions JOIN reservations on attractions.attId=reservations.attId where reservations.username ="'.$userName.'")')->result();
        }
        
        //all the attractions that belongs to the previous attractions orders categories, and the user didn't order them yet
        $data['futureAtt']=$attArray;
        //all the categories of the user's previous attractions orders 
        $data['categoriesOfPrevOrders']= $categoriesOfPrevOrders;
        //the number 1 ordered category among the user past orders
        $data['categoryOrderedTheMost']= $this->db->query('SELECT count(*) as numOfOrders, attractions.category FROM attractions JOIN reservations ON attractions.attId=reservations.attId WHERE reservations.username ="'.$userName.'" GROUP BY attractions.category ORDER BY numOfOrders DESC LIMIT 1')->result()[0]->category;
        //destinations with attractions belongs to the favorite category, the destination with the biggest number of attractions is first
        $data['destsForFavCategory']= $this->db->query('SELECT COUNT(*) as numOfAtt, destinations.destName FROM destinations JOIN attractions ON destinations.destName=attractions.destName
        WHERE attractions.category="'.$data['categoryOrderedTheMost'].'" GROUP BY destinations.destName ORDER BY numOfAtt DESC')->result();
        return $data;
    }
    
     public function save_form($data1){
         //set flag in order to avoid showing php errors
        $this->db->db_debug = FALSE; 

        $error=null;
        if (!$this->db->insert('tripform', $data1)){
            $error=$this->db->error();
        }
            
        return $error;
     }
     
     public function usersStat(){
         $userMS = $this->session->all_userdata()["user"]->maritalStatus;
         $gender = $this->session->all_userdata()["user"]->gender;
         $travelType = $this->session->all_userdata()["user"]->travelType;
         $data['AgeDistribution']= json_encode($this->db->query('SELECT COUNT(*)as numOfUsers, CASE WHEN age BETWEEN 18 AND 24 THEN "18-24" WHEN age BETWEEN 25 AND 34 THEN "25-34"
            WHEN age BETWEEN 35 AND 44 THEN "35-44" WHEN age BETWEEN 45 AND 54 THEN "45-54" WHEN age > 54 THEN "55+" END AS age_range FROM users
            GROUP BY age_range DESC')->result());
         $data['averageAge']= $this->db->query('SELECT AVG(age) as AverageAge FROM users')->result()[0]->AverageAge;
         $olderThanUser = $this->db->query('SELECT COUNT(*) AS countOlder FROM users WHERE age >'.$this->session->all_userdata()["user"]->age)->result()[0]->countOlder;
         $numOfUsers = $this->db->query('SELECT COUNT(*) AS countAllUsers FROM users')->result()[0]->countAllUsers;
         $data['userYoungerThan'] = ($olderThanUser/$numOfUsers) * 100;
         $data['msDistribution']= json_encode($this->db->query('SELECT COUNT(*)as numOfUsers,maritalStatus FROM users GROUP BY maritalStatus')->result());
         $data['ttDistribution']= json_encode($this->db->query('SELECT COUNT(*)as numOfUsers,travelType FROM users GROUP BY travelType')->result());
         $data['genderDistribution']= json_encode($this->db->query('SELECT COUNT(*)as numOfUsers,gender FROM users GROUP BY gender')->result());
         $data['sameMaritalStatus']= ($this->db->query('SELECT COUNT(*) AS countSameMS FROM users WHERE maritalStatus ='.'"'.$userMS.'"')->result()[0]->countSameMS)/$numOfUsers *100;
         $data['sameGender']= ($this->db->query('SELECT COUNT(*) AS countSameGender FROM users WHERE gender ='.'"'.$gender.'"')->result()[0]->countSameGender)/$numOfUsers *100;
         $data['sameTravelType']= ($this->db->query('SELECT COUNT(*) AS countSameTT FROM users WHERE travelType ='.'"'.$travelType.'"')->result()[0]->countSameTT)/$numOfUsers *100;
         return $data;
     }


}