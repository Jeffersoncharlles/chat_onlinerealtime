<?php
include_once "../assets/config/config.php";

$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if( $email && $password){

    $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':password', md5($password));
    $sql->execute();

    if ($sql->rowCount() > 0) {
       $info = $sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION['unique_id'] = $info['unique_id'];
        echo "sucesso";
    }else{
        echo "Email or Passowrd is incorrect!";
    }

}else{
    echo "All input field are required!";
}