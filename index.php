<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #091F2D;
        }

        .container {
            height: 100vh;
            display: flex; 
            justify-content: center;
            align-items: center;
        }

         .child {
            background-color: white;
            padding: 30px 40px 40px 40px;
            border-radius: 30px;
            border: 5px solid #0efff9;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1), 
                    inset 0px 0px 5px rgba(0, 0, 0, 0.1);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .login, .password {
            border: none;
            outline: none;
            width: 100%;
            font-size: medium;
        }

        .login:hover, .login:focus, .password:hover, .password:focus{
            border-bottom: 1px solid gray;
        }

        .submit {
            border: 2px solid #091F2D;
            background-color: white;
            color: #091F2D;
            padding: 8px 15px 8px 15px;
            font-size: medium;
            font-weight: bold;
            border-radius: 7px;
            cursor: pointer;
            transition: 0.5;
            transition-property: color, background-color;
        }

        .submit:hover {
            color: white;
            background-color: #091F2D;
        }

        div a {
            text-decoration: none;
        }

        .logo {
            color: dodgerblue;
            font-size: 50px;
            font-weight: bolder;
        }

        .textlogo {

            color: #091F2D;
            font-weight: bold;
            font-size: 12px;
        }

        div i {
            color: dodgerblue;
            font-size: 50px;
        }

        .erro {
            color: red;
            font-weight: bolder;
            font-size: small;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="child">
            <a href="#">
                <i class="fas fa-clipboard-list"></i>
                <span class="logo">Sce</span><br>
                <span class="textlogo">Sistema de Controle de Equipamentos</span>
            </a><br><br><br><br>
            <form action="login.php" method="post">
                <input class="login" name="login" type="text" placeholder="Digite seu login">
                <br><br>
                <input class="password" name="password" type="password" placeholder="Digite sua senha">
                <br><br><br>
                <input class="submit" name="submit" type="submit" value="Entrar">
                <br><br>
                <p class="erro">
                    <?php  
                        if(isset($_GET['erro'])) {echo 'Usuario e/ou senha errado.<br>Tente novamente';}
                        if(isset($_GET['session'])) {echo 'Acesso não autorizado. <br>Faça o login.';}
                    ?>
                </p>
            </form>
        </div>
    </div>
</body>
</html>