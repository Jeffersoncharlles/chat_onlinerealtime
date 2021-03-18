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
        

        $sql = $pdo->prepare("INSERT INTO users (fullname, lastName, email, password,avatar) VALUES (:fullName,:lastName,:email,:password,:imagem)");
        $sql->bindValue(':fullName', $fullName);
        $sql->bindValue(':lastName', $lastName);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        
        // if ($image) {
        //     $imagem = $imgName;
        //     $sql->bindValue(':imagem', $imagem);
        // }

        $sql->execute();

        // header("Location: /");
        // exit;
    }
}else{
    echo "All input field are required!";
}
