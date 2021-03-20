<?php
include_once "../assets/config/config.php";

if (isset($_SESSION['unique_id'])) {
    $outgoing_id = filter_input(INPUT_POST,'outgoing_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $incoming_id = filter_input(INPUT_POST,'incoming_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST,'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($message) {
        $sql = $pdo->prepare("INSERT INTO messages (incoming_msg_id,outgoing_msg_id, msg)
        VALUES (:incoming_id,:outgoing_id,:message) ");
        $sql->bindValue(":incoming_id",$incoming_id);
        $sql->bindValue(":outgoing_id",$outgoing_id);
        $sql->bindValue(":message",$message);
        $sql->execute();

        
    }
}else{
    header("Location: ./login.php");
}