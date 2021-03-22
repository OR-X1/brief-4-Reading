<?php
require_once ("connect.php");
 
$Fname=$_POST["Fname"];
$Lname=$_POST["Lname"];
$date=$_POST["date"];
$image=$_FILES["image"]["name"];
$image_src=$_FILES["image"]["tmp_name"];

move_uploaded_file($image_src,"images/".$image);


$requete="INSERT INTO authors (Fname,Lname,dateN,image) VALUE ('$Fname','$Lname','$date','$image')";

    $query=$pdo->query($requete);
    header("location:add_authors.php");



?>