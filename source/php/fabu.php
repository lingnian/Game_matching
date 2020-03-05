<?php
  @RequestParam;
 include "db.php";
 if($conn->connect_error){
 	die("Connect error".$conn->connect_error);
	
 }else{
//	  rname : this.ftitle,
//			  rpass : this.fpass,
//			  rnow : this.nownum,
//			  rneed : this.neednum,
//			  rdate : this.fdata,
//			  rtime : this.fstarttime,
//			  retime : this.fendtime
     $rname= $_POST["rname"];
	 $rpass= $_POST["rpass"];
	 $rnow= $_POST["rnow"];
	 $rneed= $_POST["rneed"];
	 $rdate= $_POST["rdate"];
	 $rtime= $_POST["rtime"];
	 $retime= $_POST["retime"];
     
	 $sql = "insert into fabudetail(roomname,roompass,data,time,now,need) values
	 ('".$rname."','".$rpass."','".$rdate."','".$rtime."',".$rnow.",".$rneed.")";
	
     $result = $conn->query($sql);
//	 $obj = $result->fetch_all(MYSQLI_ASSOC);
//	 $arr =  json_encode($obj);
	 echo $result;
	
	 
	 
	
 }


?>