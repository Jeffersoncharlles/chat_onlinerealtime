<?php 
include_once "../assets/config/config.php";

$outgoing_id = $_SESSION['unique_id'];

$sql = $pdo->prepare("SELECT * FROM users");
$sql->execute();

$output = "";
if ($sql->rowCount() == 1 ) {
    $output .= "No users are available! to chat";
}else if($sql->rowCount() > 0 ){

    include "data.php";

}