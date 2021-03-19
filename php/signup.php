<?php
include_once "../assets/config/config.php";

$fullName = filter_input(INPUT_POST,'fullName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastName = filter_input(INPUT_POST,'lastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$image = $_FILES['image'];

if ($image) {
    in_array($image['type'],array('image/jpeg', 'image/jpg', 'image/png'));
    // $imgName = $_FILES['image']['tmp_name'];
    // $imgType = $_FILES['image']['type'];

    $imgName = md5(time().rand(0,1000)).'.jpg';
    move_uploaded_file($image['tmp_name'], 'assets/img/'.$imgName);
}

if($fullName && $lastName && $email && $password){

    $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if ($sql->rowCount() === 0) {
        $status = "Active Now";
        $random_id = rand(time(), 100000000);

        $sql = $pdo->prepare("INSERT INTO users (unique_id, fullname, lastname, email, password) VALUES (:unique_id,:fullName,:lastName,:email,:password)");
        $sql->bindValue(':unique_id', $random_id);
        $sql->bindValue(':fullName', $fullName);
        $sql->bindValue(':lastName', $lastName);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->execute();

        if($sql){
            $mysql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $mysql->bindValue(':email', $email);
            $mysql->execute();

            //var_dump($mysql);
            if ($mysql->rowCount() > 0) {
                $info = $mysql->fetch(PDO::FETCH_ASSOC);
                $_SESSION['unique_id'] = $info['unique_id'];
                echo "sucesso";
            }
        }

    }else{
        echo "$email Existe!";
    }
}else{
    echo "All input field are required!";
}
