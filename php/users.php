<?php 
include_once "../assets/config/config.php";

$sql = $pdo->prepare("SELECT * FROM users");
$sql->execute();

$output = "";
if ($sql->rowCount() == 1 ) {
    $output .= "No users are available! to chat";
}else if($sql->rowCount() > 0 ){
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach($data as $user){
      $output .= ' <a  class="users-list-link" href="">
            <div class="users-list-content">
                <img src="./assets/img/'.$user['avatar'].'" alt="" >
                <div class="users-list-content-details">
                    <span>'.$user['fullname'].'</span>
                    <p>this is text Message</p>
                </div>
            </div>
            <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
        </a>';
    }
}
echo $output;