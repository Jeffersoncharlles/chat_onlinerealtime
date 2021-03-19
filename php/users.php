<?php 
include_once "../assets/config/config.php";

$sql = $pdo->prepare("SELECT * FROM users");
$sql->execute();

$output = "";
if ($sql->rowCount() == 1 ) {
    $output .= "No users are available! to chat";
}else if($sql->rowCount() > 0 ){

    include "data.php";

}