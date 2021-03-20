<?php 
include_once "../assets/config/config.php";
$outgoing_id = $_SESSION['unique_id'];

$searchterm = filter_input(INPUT_POST,'searchterm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$output = "";
$sql = $pdo->prepare("SELECT * FROM users WHERE NOT unique_id = :outgoing_id AND (fullname LIKE :searchterm OR lastname LIKE :searchterm)");
$sql->bindValue(":searchterm", "%".$searchterm."%");
$sql->bindValue(":outgoing_id",$outgoing_id);
$sql->execute();

if ($sql->rowCount() > 0) {
    include "data.php";
}else{
    $output .= "No user found related to your search";
}

echo $output;