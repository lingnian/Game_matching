<?php
  @RequestParam;
 include "db.php";
 if($conn->connect_error){
 	die("Connect error".$conn->connect_error);
	
 }else{
     $search= $_POST["roomname"];
     
	 $sql = "select * from fabudetail where roomname like '%".$search."%'";
	
     $result = $conn->query($sql);
	 $obj = $result->fetch_all(MYSQLI_ASSOC);
	 $arr =  json_encode($obj);
	 echo $arr;
	
	 
	 
	
 }


?>