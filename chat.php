<?php 
require "./assets/config/config.php";

if (!isset($_SESSION['unique_id'])) {
    header("Location: ./login.php");
}
$unique_id = $_SESSION['unique_id'];

$user_id = filter_input(INPUT_GET,'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sql = $pdo->prepare("SELECT * FROM users WHERE unique_id = :user_id");
$sql->bindValue(":user_id",$user_id);
$sql->execute();

if ($sql->rowCount() > 0) {
    $info = $sql->fetch(PDO::FETCH_ASSOC);

}


?>
<?php include_once "header.php"; ?>
<body>
    <div class="container">
        <section class="container-chats">
           <header class="container-chats-chat">
               <a href="users.php" class="container-chats-chat-back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="./assets/img/<?=$info['avatar']?>" alt="">
                <div class="container-chats-chat-details">
                    <span><?=$info['fullname']." ".$info['lastname'];?></span>
                    <p><?=$info['status'];?></p>
                </div>
           </header>
           <div class="chat-box">
           </div>
           <form action="#" class="typing-area" autocomplete="off">
               <input type="text" name="outgoing_id" value="<?=$unique_id;?>" hidden >
               <input type="text" name="incoming_id" value="<?=$user_id;?>" hidden >
               <input type="text" name="message" class="input-field" placeholder="Digite sua messagem aqui..">
               <button><i class="fab fa-telegram-plane"></i></button>
           </form>
        </section>
    </div>
    <script src="./assets/js/chat.js"></script>
</body>
</html>