<?php
    require_once('connect.php');


    $select = $_POST['a'];
    
    // echo '<pre>'; print_r($select); echo '</pre>';

    $Name= $_POST['Name'];
    $Date= $_POST['Date'];
    $Price= $_POST['Price'];

    // $Authors= $_POST['authors'];
    // $intAuthors = (int)$Authors;

    

    $image= $_FILES['image']['name'];
    $imageSrc= $_FILES['image']['tmp_name'];

    move_uploaded_file($imageSrc, "images/".$image);

    $sqlInsertBooks = "INSERT INTO books (image,Name,Price,dateB) VALUE ('$image','$Name',$Price,'$Date')";
    $queryBooks=$pdo->query($sqlInsertBooks);



    $selectLastBooks = "SELECT idB FROM books ORDER BY idB DESC LIMIT 1";
   $querySelectLastBooks=$pdo->query($selectLastBooks);

$rowId=$querySelectLastBooks->fetch();
$lastId = $rowId[0];

foreach($select as $var ){
    // echo $var ."<br>";

    $sqlInsertGallery = "INSERT INTO gallery (idB,idA) VALUE ($lastId,$var)";
    $queryGallery=$pdo->query($sqlInsertGallery);
}


    header("location:add_books.php");

?>