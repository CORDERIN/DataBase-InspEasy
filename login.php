<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main class="login">
        <div class="login_container">
            <h1 class="login_title">Login</h1>

            <form action="index.php" class="login_form">

                <input class="login_input" type="email" placeholder="e-mail">
                <span class="login_input-border"></span>
                <input class="login_input" type="password" placeholder="senha">
                <span class="login_input-border"></span>
                <button type = "submit"class="login_submit">Login</button>
                <button class="login_submit">Cadastrar</button>
                <a class="login_reset" href="">Esqueci a senha</a>

            </form>
        </div>
    </main>
</body>
</html>