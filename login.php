<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Hills</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
    <style>
        .caixa{
            margin: auto;
            width: 500px;
            height: 400px;
            border-radius: 50px;
            background-color: #82AD99;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        h1{
            position: absolute;
            left: 50%;
            top: 10%;
            transform: translate(-50%,-10%);
        }
        .botao{
            background-color: #5C8F78;
            width: 400px;
            height: 50px;
            border-radius: 50px;
            margin: 50px;
            margin-top: 0px;
            margin-bottom:25px ;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;

        }
        .usu{
            position: absolute;
            width: 50px;
            height: 50px;
            left: 50%;
            top: 0%;
            transform: translate(-50%,-50%);
        }
        .bolabranca{
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: white;
            position: absolute;
            left: 50%;
            top: 0%;
            transform: translate(-50%,-50%);
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        .botao:hover{
            background-color: #486256
        }
        p{
            margin-left: 150px;
        }
        label{
            width: 300px;
            height: 20px;
        }
        .campos{
            width: 400px;
            height: 20px;
            border-radius: 50px;
            /*background-color: #5C8F78;*/
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        }
        *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        list-style: none;
        text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form >
        <div class="caixa">
            <div class="bolabranca"></div>
            <i class="usu fa-solid fa-user"></i>
            <div class="form-floating" style="margin: 50px; margin-bottom: 10px;">               
                <input type="email" class="campos form-control" placeholder="e" required>
                <label for="Email" class="form-label"><i class="fa-solid fa-user"></i> Email</label>
            </div>
            <div class="form-floating" style="margin: 50px; margin-top: 10px;">                 
                <input class="campos form-control" type="password" placeholder="s" required>
                <label for="Senha"class="form-label"><i class="fa-solid fa-lock"></i> Senha</label>
            </div>
            <div class="form-check" style="margin: 50px; margin-bottom: 10px; margin-top: 10px;">
                <input class="form-check-input" type="checkbox" value="" id="lembre">
                <label class="form-check-label" style="width: 400px;" for="lembre">
                    Remember-me    <a href="recuperar_senha.php" style="margin-left: 120px;">Forgot PassWord</a>
                </label>

              </div>
                <input class="botao"type="button" title="btLogin" value="Login" required>
                <p>Crie sua conta <a href="cadastro.php">Clique aqui</a></p>
        </div>
    </form>
    
</body>
</html>