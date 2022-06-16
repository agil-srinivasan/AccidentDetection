<?php
include 'connect.php';

 http://localhost//alert.php?api=123123&name=binod
  
  // 



if(isset($_GET['api'])){
	$api = $_GET['api'];
	$def_api = "123123";
	  $name = trim($_GET['name']);
	
	date_default_timezone_set("Asia/Kolkata");
	$sent_tm = date("h:i:s a");
	$sent_dt = date("d/m/Y");

	$sent_time_date = "Time: ".$sent_tm." <br> Date: ".$sent_dt;

	if($def_api != $api){
		echo "API key Mismatch";
	}
	else{

		$insert = mysqli_query($conn, "INSERT INTO `visitors` ( `name`, `dt`) VALUES ('$name', '$sent_time_date') ;");

		if($insert){
			echo "Success!";
		}
		else{
			echo "Error, Try again!";
		}
	}
}



////////////////////////////////
 

       
        


 ?>