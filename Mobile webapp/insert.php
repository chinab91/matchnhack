<?php 

		define("DB_HOST", "localhost");
		define("DB_USER", "jubliaor_test");
		define("DB_PASSWORD", "123abc");
		define("DB_DATABASE", "jubliaor_test");

        // connecting to mysql
        $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			
			if (!$con)
			{
			die('Could not connect: ' . mysql_error());
			}
			
		// selecting database
        mysql_select_db(DB_DATABASE);
    
        mysql_query("SET NAMES utf8",$cont);
        mysql_query("SET CHARACTER_SET_CLIENT=utf8",$con);
        mysql_query("SET CHARACTER_SET_RESULTS=utf8",$con);  
 
 
		$sql="INSERT INTO USER (FNAME, LNAME, EMAIL)
		VALUES
		('$_POST[textbox1]','$_POST[textbox2]','$_POST[textbox3]')";

if (!mysql_query($sql,$con))
  {
	die('Error: ' . mysql_error());
  }
echo "1 record added";
 
 
        // return database handler
        mysql_close($con);
	    
 //       return $con;
	
?> 
