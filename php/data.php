<?php
$data = $sql->fetchAll(PDO::FETCH_ASSOC); ?>

<?php foreach($data as $user): ?>
       <a  class="users-list-link" href="chat.php?user_id=<?=$user['unique_id'];?>">
            <div class="users-list-content">
                <img src="./assets/img/<?=$user['avatar'];?>" alt="" >
                <div class="users-list-content-details">
                    <span><?=$user['fullname'];?></span>
                    <p>this is text Message</p>
                </div>
            </div>
            <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
        </a>
<?php endforeach;?>