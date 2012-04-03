<?php
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
 
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $password) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        $result = mysql_query("INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at) VALUES('$uuid', '$name', '$email', '$encrypted_password', '$salt', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }
 
    /**
     * Get user by email and password
     */
    public function getUserByNameAndPassword($name, $password) {
        $result = mysql_query("SELECT * FROM USER WHERE NAME = '$name' and PASSWORD='$password'") or die(mysql_error());
        // check for result
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            return $result;
        } else {
            // user not found
            return false;
        }
    }
 
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from USER WHERE EMAIL = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }
 
    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }
 
    /**
     * Get Announcement
     * return announcement
     */
    public function getAnnouncement(){
      $result = mysql_query("SELECT text FROM announ order by id_announ desc LIMIT 0 , 10") or die(mysql_error());
      if($result){
         $i = 0;
        while($row = mysql_fetch_array($result)){
          $arr[$i]= $row["text"] ;
          $i++;
        }
        $arr["count"] = $i;
        return $arr;
      } else {
        return false;
      } 
    }
    
    public function getCompanyName($id){
       $result = mysql_query("SELECT C.ID_COMPANY, C.COMPANYNAME FROM COMPANY C where C.ID_COMPANY not in (SELECT ID_COMPANY FROM TIMETABLE WHERE ID_USER = $id) order by NAME") or die(mysql_error());
       if($result){
        $i = 0;
        while($row = mysql_fetch_array($result)){
          $arr[$i]["id"]= $row["ID_COMPANY"];
          $arr[$i]["name"] = $row["NAME"];
          $i++;
        }        
        $arr["count"] = $i;
        return $arr;
      } else {
        return false;
      } 
    }
    
    public function getMyTimeSlot($id){
      $result = mysql_query("SELECT TB.ID_TIMETABLE, T.TIMESLOT, C.COMPANYNAME FROM TIMETABLE TB, TIME T, COMPANY C WHERE TB.ID_TIME = T.ID_TIME AND TB.ID_USER = $id and TB.ID_COMPANY=C.ID_COMPANY order by T.ID_TIME") or die(mysql_error());
      if($result){
        $i = 0;
        while($row = mysql_fetch_array($result)){
          $arr[$i]["id"] = $row["ID_TIMETABLE"];
          $arr[$i]["timeslot"] = $row["TIMESLOT"];
          $arr[$i]["name"] = $row["NAME"];
          $i++;
        }
        $arr["count"] = $i;
        return $arr;        
      }else {
        return false;
      }
    }
    
    public function getTimeSlotDetail($id){
      $result = mysql_query("SELECT T.TIMESLOT, C.COMPANYNAME, C.EMAIL, C.INFO FROM TIMETABLE TB, TIME T, COMPANY C WHERE TB.ID_TIME = T.ID_TIME AND TB.ID_COMPANY = C.ID_COMPANY AND TB.ID_TIMETABLE= $id") or die(mysql_error());
      $no_of_rows = mysql_num_rows($result);
      if ($no_of_rows > 0) {
        $result = mysql_fetch_array($result);
        return $result;
      } else {
        // user not found
        return false;
      }
    }
    
    public function getMyProfile($id){
      $result = mysql_query("SELECT * FROM USER WHERE ID_USER = $id") or die(mysql_error());
      $no_of_rows = mysql_num_rows($result);
      if ($no_of_rows > 0) {
        $result = mysql_fetch_array($result);
        return $result;
      } else {
        // user not found
        return false;
      }
    }
    
    public function getCompanyAviTime($id,$uid){
      $result = mysql_query("SELECT T.ID_TIME, T.TIMESLOT FROM TIME T WHERE T.ID_TIME NOT IN ( SELECT TB.ID_TIME FROM TIMETABLE TB WHERE TB.ID_COMPANY = $id or TB.ID_USER = $uid ) ORDER BY ID_TIME") or die(mysql_error());
      if($result){
        $i = 0;
        while($row = mysql_fetch_array($result)){
          $arr[$i]["id"] = $row["ID_TIME"];
          $arr[$i]["timeSlot"] = $row["TIMESLOT"];
          $i++;
        }
        $arr["count"] = $i;
        return $arr;        
      }else {
        return false;
      }
    }
    
     public function addUserTimeSlot($idUser, $idCompany, $idTimeSlot){
      $result = mysql_query("INSERT INTO TIMETABLE(ID_TIME, ID_COMPANY, ID_USER) VALUES($idTimeSlot, $idCompany, $idUser)");
      if ($result) {
        return true;
      } else {
        return false;
      }
    } 
    
    public function cancelTimeSlot($id){
      $result = mysql_query("DELETE FROM TIMETABLE WHERE ID_TIMETABLE = $id");
      if ($result) {
        return true;
      } else {
        return false;
      }    
    }
    
    public function updateProfile($id,$fname,$lname,$email,$phone,$skill){
      $result = mysql_query("UPDATE USER SET FNAME='$fname', LNAME='$lname', SKILL='$skill', PHONE = '$phone', EMAIL = '$email' WHERE ID_USER=$id");
      if ($result) {
        return true;
      } else {
        return false;
      }     
    }
	
	//TimeTable builder
	public function getCompanyID(){
		$result = mysql_query("SELECT ID_COMPANY FROM COMPANY ORDER BY ID_COMPANY ASC");
		if($result){
			$i = 0;
			while($row = mysql_fetch_array($result)){
				$arr[$i] = $row["ID_COMPANY"];
				$i++;
			}
			return $arr;        
		}else {
			return false;
		}		
	}
	
	public function getCompanyChoose($id){
		$result = mysql_query("SELECT ID_USER FROM COMPANYCHOOSE WHERE ID_COMPANY=$id ORDER BY ID_USER ASC");
		if($result){
			$i = 0;
			while($row = mysql_fetch_array($result)){
				$arr[$i] = $row["ID_USER"];
				$i++;
			}
			return $arr;        
		}else {
			return false;
		}				
	}
	
 	public function getUserRankByCompany($id){
		$result = mysql_query("SELECT ID_USER, RANK FROM USERRANK WHERE ID_COMPANY=$id ORDER BY ID_USER ASC");
		if($result){
			$i = 0;
			while($row = mysql_fetch_array($result)){
				$arr["user"][$i] = $row["ID_USER"];
				$arr["rank"][$i] = $row["RANK"];
				$i++;
			}
			return $arr;        
		}else {
			return false;
		}	
	} 
	
	
}
 
?>