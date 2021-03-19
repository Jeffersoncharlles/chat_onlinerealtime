<?php include_once "header.php"; ?>
<body>
    <div class="container">
        <section class="container-chat form login">
            <h1>RealTime Chat App</h1>
            <form action="">
                <div class="container-chat-error"></div>
                
                <div class="container-chat-details">
                    <div class="field input">
                        <label for="">E-mail</label>
                        <input type="email" name="email" placeholder="Digite Seu email">
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Digite sua senha">
                        <i class="far fa-eye"></i>
                    </div>
                    <div class="field btn-my">
                        <input type="submit" value="Salvar">
                    </div>
                </div>
            </form>
            <div class="link">Nao tem conta ? <a href="index.php">Cadastrar now</a></div>
        </section>
    </div>


    <script src="./assets/js/pass-show-hide.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./assets/js/login.js"></script>
</body>
</html>