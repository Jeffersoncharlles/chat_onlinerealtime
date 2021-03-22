<?php
require "../assets/config/config.php";

if (isset($_SESSION['unique_id'])) {

    $logout_id = filter_input(INPUT_GET,'logout_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($logout_id) {
        $status = "Offline now";
        $sql = $pdo->prepare("UPDATE users SET status = :status WHERE unique_id = :logout_id ");
        $sql->bindValue(":status",$status);
        $sql->bindValue(":logout_id",$logout_id);
        $sql->execute();

        if ($sql) {
            session_unset();
            session_destroy();
            header("Location: ../login.php");
        }
    }else{
        header("Location: ./users.php");
    }
    
}else{
    header("Location: ../login.php");
}