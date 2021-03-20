<?php
$data = $sql->fetchAll(PDO::FETCH_ASSOC); 

?>

<?php foreach($data as $user): ?>
       <a  class="users-list-link" href="chat.php?user_id=<?=$user['unique_id'];?>">
            <div class="users-list-content">
                <img src="./assets/img/<?=$user['avatar'];?>" alt="" >
                <div class="users-list-content-details">
                    <span><?=$user['fullname'];?></span>
                    <?php 
                    $query ="SELECT * FROM messages 
                    WHERE (incoming_msg_id = :userid OR outgoing_msg_id = :userid)
                    AND (outgoing_msg_id = :outgoing_id OR incoming_msg_id = :outgoing_id)
                    ORDER BY msg_id DESC LIMIT 1";
                    $sql = $pdo->prepare($query);
                    $sql->bindValue(":userid", $user['unique_id']);
                    $sql->bindValue(":outgoing_id", $outgoing_id);
                    $sql->execute();
                    $data2 = $sql->fetch(PDO::FETCH_ASSOC); 
                    if ($sql->rowCount() > 0) {
                        $result = $data2['msg'];
                    }else{
                        $result = "No message available";
                    }
                        
                    
                        (strlen($result) > 20) ? $msg = substr($result, 0 , 20).'...' : $msg = $result;


                        //
                        if ($data2 ) {
                            if ($outgoing_id === $data2['outgoing_msg_id']) {
                                    $you = "You: ";
                                }else {
                                    $you="";
                                }
                                $you="";
                            //($outgoing_id == $data2['outgoing_msg_id']) ? $you = "You: " : $you="";
                        }
                        //($outgoing_id == $data2['outgoing_msg_id']) ? $you = "You: " : $you="";
                        ($user['status'] == "Offline now") ? $offline = "offiline" : $offline = "";
                            
                    ?>
                    <p><?=$you.$msg;?></p>
                </div>
            </div>
            <div class="users-list-status-dot <?=$offline;?>"><i class="fas fa-circle"></i></div>
        </a>
<?php endforeach;?>