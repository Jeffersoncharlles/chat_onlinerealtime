<?php include_once "header.php"; ?>
<body>
    <div class="container">
        <section class="container-chat form signup">
            <h1>RealTime Chat App</h1>
            <form action="#" enctype="multipart/form-data">
                <div class="container-chat-error">this is an error message!</div>
                <div class="container-chat-details">
                    <div class="field input">
                        <label for="">fist Name</label>
                        <input type="text" placeholder="First Name" name="fullName" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" placeholder="Last Name" name="lastName" required>
                    </div>
                    <div class="field input">
                        <label for="">E-mail</label>
                        <input type="email" placeholder="Digite Seu email" name="email" required>
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" placeholder="Digite sua senha" name="password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="">Avatar</label>
                        <input type="file" name="image" >
                    </div>
                    <div class="field btn-my">
                        <input type="submit" value="Salvar">
                    </div>
                </div>
            </form>
            <div class="link">Ja tem conta ? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="./assets/js/pass-show-hide.js"></script>
    <script src="./assets/js/signup.js"></script>
</body>
</html>