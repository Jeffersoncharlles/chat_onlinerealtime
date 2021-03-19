<?php 
include_once "./assets/config/config.php";

if (!isset($_SESSION['unique_id'])) {
    header("Location: ./login.php");
}

$unique_id = $_SESSION['unique_id'];

$sql = $pdo->prepare("SELECT * FROM users WHERE unique_id = :unique_id");
$sql->bindValue(":unique_id",$unique_id);
$sql->execute();

if ($sql->rowCount() > 0) {
    $info = $sql->fetch(PDO::FETCH_ASSOC);

}

?>

<?php include_once "header.php"; ?>
<body>
    <div class="container">
        <section class="container-users">
           <header class="container-users-chat">
               <div class="user-content">
                    <img src="./assets/img/unnamed.png" alt="">
                    <div class="user-content-details">
                        <span><?=$info['fullname'];?></span>
                        <p><?=$info['status'];?></p>
                    </div>
               </div>
               <a href="#" class="logout">Logout</a>
           </header>
           <div class="container-users-search">
               <span class="text">Select an user to start chat</span>
               <input type="text" placeholder="Digite o nome para procurar">
               <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <a  class="users-list-link" href="">
                    <div class="users-list-content">
                        <img src="./assets/img/unnamed.png" alt="" >
                        <div class="users-list-content-details">
                            <span>Coding Nepal</span>
                            <p>this is text Message</p>
                        </div>
                    </div>
                    <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a  class="users-list-link" href="">
                    <div class="users-list-content">
                        <img src="./assets/img/unnamed.png" alt="" >
                        <div class="users-list-content-details">
                            <span>Coding Nepal</span>
                            <p>this is text Message</p>
                        </div>
                    </div>
                    <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a  class="users-list-link" href="">
                    <div class="users-list-content">
                        <img src="./assets/img/unnamed.png" alt="" >
                        <div class="users-list-content-details">
                            <span>Coding Nepal</span>
                            <p>this is text Message</p>
                        </div>
                    </div>
                    <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a  class="users-list-link" href="">
                    <div class="users-list-content">
                        <img src="./assets/img/unnamed.png" alt="" >
                        <div class="users-list-content-details">
                            <span>Coding Nepal</span>
                            <p>this is text Message</p>
                        </div>
                    </div>
                    <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a  class="users-list-link" href="">
                    <div class="users-list-content">
                        <img src="./assets/img/unnamed.png" alt="" >
                        <div class="users-list-content-details">
                            <span>Coding Nepal</span>
                            <p>this is text Message</p>
                        </div>
                    </div>
                    <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a  class="users-list-link" href="">
                    <div class="users-list-content">
                        <img src="./assets/img/unnamed.png" alt="" >
                        <div class="users-list-content-details">
                            <span>Coding Nepal</span>
                            <p>this is text Message</p>
                        </div>
                    </div>
                    <div class="users-list-status-dot offline"><i class="fas fa-circle"></i></div>
                </a>
                <a  class="users-list-link" href="">
                    <div class="users-list-content">
                        <img src="./assets/img/unnamed.png" alt="" >
                        <div class="users-list-content-details">
                            <span>Coding Nepal</span>
                            <p>this is text Message</p>
                        </div>
                    </div>
                    <div class="users-list-status-dot"><i class="fas fa-circle"></i></div>
                </a>
            </div>
        </section>
    </div>

    <script src="./assets/js/search.js"></script>
</body>
</html>