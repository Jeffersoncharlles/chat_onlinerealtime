<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealTimeChat</title>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
    <div class="container">
        <section class="container-chat form signup">
            <h1>RealTime Chat App</h1>
            <form action="#">
                <div class="container-chat-error">this is an error message!</div>
                <div class="container-chat-details">
                    <div class="field input">
                        <label for="">fist Name</label>
                        <input type="text" placeholder="First Name">
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" placeholder="Last Name">
                    </div>
                    <div class="field input">
                        <label for="">E-mail</label>
                        <input type="email" placeholder="Digite Seu email">
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" placeholder="Digite sua senha">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="">Avatar</label>
                        <input type="file" >
                    </div>
                    <div class="field btn-my">
                        <input type="submit" value="Salvar">
                    </div>
                </div>
            </form>
            <div class="link">Ja tem conta ? <a href="#">Login now</a></div>
        </section>
    </div>

    <script src="./assets/js/pass-show-hide.js"></script>
    <script src="./assets/js/signup.js"></script>
</body>
</html>