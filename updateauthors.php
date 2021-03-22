<?php
require_once('connect.php');
$idA=$_POST['idA'];

$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$date=$_POST['date'];

$image= $_FILES['image']['name'];
$imageSrc= $_FILES['image']['tmp_name'];

move_uploaded_file($imageSrc, "images/".$image);


if (empty($image)) {
	$sqlUpdate = "UPDATE `authors` SET Fname='$Fname',Lname='$Lname',dateN='$date' WHERE idA=$idA";
}else{
	$sqlUpdate = "UPDATE `authors` SET  image='$image', Fname='$Fname',Lname='$Lname',dateN='$date' WHERE idA=$idA";
	
}

$queryUpdate = $pdo->query($sqlUpdate);



header("location:add_authors.php");

?>