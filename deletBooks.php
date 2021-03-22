
<?php
require_once('connect.php');

$idB=$_GET["idB"];

$sqlDelet="DELETE from books where idB = $idB";

$requetDelet = $pdo->query($sqlDelet);

header("location:add_books.php");

?>