<?php 
session_start();

function updateDB($sql){
	$conn = mysqli_connect("localhost", "root", "", "poultry_management");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(mysqli_query($conn, $sql)) {
		header("location:profile.php");
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

$name=$_SESSION["uname"];

    $type=$_SESSION["type"];
    $firstname=$_POST["fname"];
    $lastname=$_POST["lname"];
    $email=$_POST["email"];
    $pass=$_POST["upass"];
    $birth=$_POST["birth"];

    $sql="UPDATE `user` SET `FirstName` = '$firstname', `LastName` = '$lastname', `Email` = '$email',
    `Mobile` = '+8801987603822', `password` = '$pass', `DateOfBirth` = '$birth' WHERE
    `user`.`UserName` ='$name' ;";
    
    updateDB($sql);
?>