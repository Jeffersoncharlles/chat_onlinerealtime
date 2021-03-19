<?php 
include_once "../assets/config/config.php";

$searchterm = filter_input(INPUT_POST,'searchterm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$output = "";
$sql = $pdo->prepare("SELECT users WHERE fullname LIKE :searchterm OR lasname LIKE :searchterm");
$sql->bindValue(":searchterm", "%".$searchterm."%");
$sql->execute();

if ($sql->rowCount() > 0) {

}else{
    $output .= "No user found related to your search";
}