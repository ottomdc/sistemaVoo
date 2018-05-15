<?php
session_start();
$_SESSION["sessiontime"] = time() + 60*2;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Coordenação de Voo</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap2.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/float_label.css" rel="stylesheet">
</head>

<body>
<form class="form-signin" method="POST" action="valida.php">
    <div class="text-center mb-4">
        <img class="mb-4" src="img/logo/logo.png" alt="" width="250" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Sistema de Voo</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        if(isset($_SESSION['msgcad'])){
            echo $_SESSION['msgcad'];
            unset($_SESSION['msgcad']);
        }
        ?>
    </div>


    <div class="form-label-group">
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Email" required autofocus>
        <label for="usuario">Email</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
        <label for="senha">Senha</label>
    </div>


    <input type="submit" name="btnLogin" value="Logar" class="btn btn-lg btn-primary btn-block">

    <p class="mt-5 mb-3 text-muted text-center"><a href="cadastrar.php">Faça seu Cadastro</a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Albert Otto</p>
</form>
</body>
</html>
