<?php
include_once "../assets/config/config.php";

if (isset($_SESSION['unique_id'])) {
    $outgoing_id = filter_input(INPUT_POST,'outgoing_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $incoming_id = filter_input(INPUT_POST,'incoming_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $output = "";
    $sql = $pdo->prepare("SELECT * FROM messages 
        LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
        WHERE (outgoing_msg_id = :outgoing_id AND incoming_msg_id = :incoming_id) 
        OR (outgoing_msg_id = :incoming_id AND incoming_msg_id = :outgoing_id) ORDER BY msg_id ASC");
    $sql->bindValue(":outgoing_id",$outgoing_id);
    $sql->bindValue(":incoming_id",$incoming_id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $item){
            
            if ($item['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                <div class="chat-box-details">
                    <p>'.$item['msg'].'</p>
                    </div>
                </div>'
            ;
            }else{
                $output .= '<div class="chat incoming">
                <img src="./assets/img/'.$item['avatar'].'" alt="">
                <div class="chat-box-details">
                    <p>'.$item['msg'].'</p>
                </div>
            </div>'
            ;
            }
        }
        echo $output;
        
    }
}else{
    header("Location: ./login.php");
}