<?php 

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'ajaxcurd');

if($con){
	// echo "Connected!";
}else{
	echo "Error!";
}

?>