<?php
/**
 * File to handle all API requests
 * Accepts GET and POST
 *
 * Each request will be identified by TAG
 * Response will be JSON data
 
  /**
 * check for POST request
 */
if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];
 
    // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
 
    // response Array
    $response = array("tag" => $tag, "success" => 0, "error" => 0);
 
    // check for tag type
    if ($tag == 'login') {
       
        // Request type is check Login
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        // check for user
        $user = $db->getUserByNameAndPassword($name, $password);
        if ($user != false) {
            // user found
            // echo json with success = 1
            $response["success"] = 1;
            $response["user"]["id"] = $user["ID_USER"];
            $response["user"]["name"] = $user["NAME"];
            $response["user"]["email"] = $user["EMAIL"];

            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }
    } else if ($tag == 'register') {
        // Request type is Register new user
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
 
        // check if user is already existed
        if ($db->isUserExisted($email)) {
            // user is already existed - error response
            $response["error"] = 2;
            $response["error_msg"] = "User already existed";
            echo json_encode($response);
        } else {
            // store user
            $user = $db->storeUser($name, $email, $password);
            if ($user) {
                // user stored successfully
                $response["success"] = 1;
                $response["uid"] = $user["unique_id"];
                $response["user"]["name"] = $user["name"];
                $response["user"]["email"] = $user["email"];
                $response["user"]["created_at"] = $user["created_at"];
                $response["user"]["updated_at"] = $user["updated_at"];
                echo json_encode($response);
            } else {
                // user failed to store
                $response["error"] = 1;
                $response["error_msg"] = "Error occured in Registartion";
                echo json_encode($response);
            }
        }
    } else if($tag == 'announcement'){    //Tag is announcement
      //$response["success"] = 1;
      $announs = $db->getAnnouncement();
      if($announs != false){
        $response["success"] = 1;
         $response["count"] = $announs["count"];
        for($i=0; $i<=$response["count"]; $i++){
          $response[$i] = $announs[$i];
        }
        echo json_encode($response);
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in announcement";
        echo json_encode($response);      
      } 
    } else if($tag == 'companyName'){ //Tag is companyName
      $id = (int)$_POST['id'];
      $company = $db->getCompanyName($id);
      if($company != false){
        $company["tag"] = "companyName";
        $company["success"] = 1;
        $company["error"] = 0;
        echo json_encode($company);  
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in companyName";
        echo json_encode($response);      
      }
    } else if($tag == 'myTimetable'){
      $uid = (int)$_POST['uid'];
      $timeslot = $db->getMyTimeSlot($uid);
      if($timeslot != false){
        $timeslot["tag"] = "myTimetable";
        $timeslot["success"] = 1;
        $timeslot["error"] = 0;
        echo json_encode($timeslot);  
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in myTimetable";
        echo json_encode($response);    
      }
      
    } else if($tag == 'timeSlotDetail'){
      $id = (int)$_POST['id'];
      $detail = $db->getTimeSlotDetail($id);
      if($detail != false){
        $response["success"] = 1;
        $respones["name"] = $detail["NAME"];
        $respones["email"] = $detail["EMAIL"];
        $respones["info"] = $detail["INFO"];
        $respones["timeSlot"] = $detail["TIMESLOT"];
        echo json_encode($respones); 
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in timeSlotDetail";
        echo json_encode($response);         
      }    
      
    } else if($tag == 'myProfile'){
      $uid = (int)$_POST['uid'];
      $profile = $db->getMyProfile($uid);      
      if($profile != false){
        $response["success"] = 1;
        $respones["fname"] = $profile["FNAME"];
        $respones["lname"] = $profile["LNAME"];
        $respones["name"] = $profile["NAME"];
        $respones["email"] = $profile["EMAIL"];
        $respones["skill"] = $profile["SKILL"];
        $respones["phone"] = $profile["PHONE"];
        echo json_encode($respones); 
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in myProfile";
        echo json_encode($response);         
      }
    
    } else if($tag == 'companyAviTime'){
      $id = (int)$_POST['id'];
      $uid = (int)$_POST['uid'];
      $timeslot = $db->getCompanyAviTime($id,$uid);
      if($timeslot != false){
        $timeslot["tag"] = "companyAviTime";
        $timeslot["success"] = 1;
        $timeslot["error"] = 0;
        echo json_encode($timeslot);  
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in companyAviTime";
        echo json_encode($response);    
      }      
    } else if($tag == 'addUserTimeSlot'){
        $idUser = (int)$_POST['idUser'];
        $idCompany = (int)$_POST['idCompany'];
        $idTime = (int)$_POST['idTime'];
        $result = $db->addUserTimeSlot($idUser,$idCompany,$idTime);
        if($result){
          $response["success"] = 1;
          echo json_encode($response);       
        } else {
          $response["error"] = 1;
          $response["error_msg"] = "Error occured in companyAviTime";
          echo json_encode($response);            
        }
    } else if($tag == 'cancelTimeSlot'){
      $id = (int)$_POST['id'];
      $result = $db->cancelTimeSlot($id);
        if($result){
        $response["success"] = 1;
        echo json_encode($response);              
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in companyAviTime";
        echo json_encode($response);            
      }      
    } else if($tag == 'updateProfile'){
      $id =(int)$_POST['id'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $skill = $_POST['skill'];
      $result = $db->updateProfile($id,$fname,$lname,$email,$phone,$skill);
        if($result){
        $response["success"] = 1;
        echo json_encode($response);              
      } else {
        $response["error"] = 1;
        $response["error_msg"] = "Error occured in updateProfile";
        echo json_encode($response);            
      }       
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Access Denied";
}
?>