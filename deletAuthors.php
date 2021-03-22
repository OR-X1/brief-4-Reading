
<?php
require_once('connect.php');

$idA=$_GET["idA"];

$sqlDelet="DELETE from authors where idA = $idA";

$requetDelet = $pdo->query($sqlDelet);

header("location:add_authors.php");

?>