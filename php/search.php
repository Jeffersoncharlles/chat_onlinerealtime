<?php 
include_once "../assets/config/config.php";

$searchterm = filter_input(INPUT_POST,'searchterm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$output = "";
$sql = $pdo->prepare("SELECT * FROM users WHERE fullname LIKE :searchterm OR lastname LIKE :searchterm");
$sql->bindValue(":searchterm", "%".$searchterm."%");
$sql->execute();

if ($sql->rowCount() > 0) {
    include "data.php";
}else{
    $output .= "No user found related to your search";
}

echo $output;