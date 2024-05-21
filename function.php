<?php 
include("conn.php");

//add Product function
if($_REQUEST['action'] == 'Add_Product_Form'){
	$name = $_POST['Addname'];
	$category = $_POST['Addcategory'];
	$qnt = $_POST['Addqnt'];
	$price = $_POST['Addprice'];

	$sql = "INSERT INTO `products`(`name`, `category`, `qnt`, `price`) VALUES ('$name','$category','$qnt','$price')";
	$result=mysqli_query($con,$sql);
	if($result){
		// echo "product inserted!!";
		// console.log($result);
	}else{
		echo "error!!while adding products";
	}
}

//fetching product data function
if($_REQUEST['action'] == 'fetch_product_data'){
	$id = $_GET['id'];
	$sql = "SELECT * FROM `products` WHERE id=$id";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result); //array
	echo json_encode($row);
	exit();
}

// Edit Product Function
if($_REQUEST['action'] == 'Edit_Product_Form'){
	$id = $_POST['EditId'];
	$name = $_POST['EditName'];
	$category = $_POST['EditCategory'];
	$qnt = $_POST['EditQnt'];
	$price = $_POST['EditPrice'];

	$sql = "UPDATE `products` SET `id`='$id',`name`='$name',`category`='$category',`qnt`='$qnt',`price`='$price' WHERE id=$id";
	$result = mysqli_query($con,$sql);
	if($result){
	}else{
		echo "error!!while adding products";
	}
}

//delete product function
if(isset($_GET['deleteId'])){
	$id = $_GET['deleteId'];
	$sql = "DELETE FROM `products` WHERE id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		header('location:http://localhost/AjaxCURD');
	}else{
		echo "error! while deleting products";
	}
}
?>