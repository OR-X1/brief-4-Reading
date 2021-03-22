<?php
require_once("connect.php");

$select= $_POST['a'];

    // echo '<pre>'; print_r($select); echo '</pre>';

$idB = $_POST['idB'];

$Name= $_POST['Name'];
$Date= $_POST['Date'];
$Price= $_POST['Price'];

// $Authors= $_POST['authors'];
// $intAuthors = (int)$Authors;


$image= $_FILES['image']['name'];
$imageSrc= $_FILES['image']['tmp_name'];

move_uploaded_file($imageSrc, "images/".$image);

if (empty($image)) {
	$sqlUpdate = "UPDATE `books` SET Name='$Name',Price='$Price',dateB='$Date' WHERE idB=$idB";
}else{
	$sqlUpdate = "UPDATE `books` SET image='$image',Name='$Name',Price='$Price',dateB='$Date' WHERE idB=$idB";
}
$queryUpdate = $pdo->query($sqlUpdate);

$qr="DELETE from gallery where idB=$idB";
$queryD = $pdo->query($qr);

foreach($select as $var ){
    // echo $var ."<br>";

    $sqlInsertGallery = "INSERT INTO gallery (idB,idA) VALUE ($idB,$var)";
    $queryGallery=$pdo->query($sqlInsertGallery);
}



header("location:add_books.php");
// print_r($queryUpdate);

?>