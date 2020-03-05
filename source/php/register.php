<?php
  @RequestParam;
 include "db.php";
 if($conn->connect_error){
 	die("Connect error".$conn->connect_error);
	
 }else{
     $user = $_POST["user"];
	 $pass = $_POST["pass"];
	 $gender = $_POST["gender"];
	 
//     $username = "wx";
	 $sql = "insert into userlogin(user,password) values ('".$user."','".$pass."')";
	 
     $result = $conn->query($sql);
//	 $obj = $result->fetch_all(MYSQLI_ASSOC);
//	 $arr =  json_encode($obj);
	 echo $result;
	
	 
	 
	
 }


?>
