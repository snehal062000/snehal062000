<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];

$conn = new mysqli('localhost','root','','gym-registration');
if($conn->connect_error){
	die('Connection Failed :' .$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into signup(first_name, last_name, email, phone_no)
	values(?, ?, ?, ?)");
	$stmt->bind_param("sssi",$first_name, $last_name, $email, $phone_no);
	$stmt->execute();
	echo "registration successfull";
	$stmt->close();
	$conn->close();
}
?>