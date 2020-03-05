<?php
  @RequestParam;
 include "db.php";
 if($conn->connect_error){
 	die("Connect error".$conn->connect_error);
	
 }else{
     $username = $_POST["name"];;
//     $username = "wx";
	 $sql = "select * from userlogin where user = '".$username."'";
	
     $result = $conn->query($sql);
	 $obj = $result->fetch_all(MYSQLI_ASSOC);
	 $arr =  json_encode($obj);
	 echo $arr;
	
	 
	 
	
 }


?>