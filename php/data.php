<?php
$data = $sql->fetchAll(PDO::FETCH_ASSOC); ?>

<?php foreach($data as $user): ?>
       <a  class="users-list-link" href="chat.php?user_id=<?=$user['unique_id'];?>">
            <div class="users-list-content">
                <img src="./assets/img/<?=$user['avatar'];?>" alt="" >
                <div class="users-list-content-details">
                    <span><?=$user['fullname'];?></span>
                    <?php 
                    $sql = $pdo->prepare("SELECT * FROM messages 
                    WHERE (incoming_msg_id = :userid OR outgoing_msg_id = :userid)
                    AND (outgoing_msg_id = :outgoing_id OR incoming_msg_id = :outgoing_id)
                    ORDER BY msg_id DESC LIMIT 1");
                    $sql->bindValue(":userid", $user['unique_id']);
                    $sql->bindValue(":outgoing_id", $outgoing_id);
                    $sql->execute();
                    $data2 = $sql->fetch(PDO::FETCH_ASSOC); 
                    if ($sql->rowCount() > 0) {
                        $result = $data2['msg'];
                    }else{
                        $result = "No message available!";
                    }
                        (strlen($result) > 28) ? $msg = substr($result, 0 , 28).'...' : $msg = $result;
                        
                        ($outgoing_id == $data2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                    ?>
                    <p><?=$msg;?></p>
                </div>
            </div>
            <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
        </a>
<?php endforeach;?>