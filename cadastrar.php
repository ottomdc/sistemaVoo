<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$erro = false;

	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);

	if((strlen($dados['senha'])) < 6){
		$erro = true;
		$_SESSION['msg'] = "<div class='alert alert-danger'>A senha deve ter no minímo 6 caracteres!</div>";
	}elseif(stristr($dados['senha'], "'")) {
		$erro = true;
		$_SESSION['msg'] = "<div class='alert alert-danger'>Caracter ( ' ) utilizado na senha é inválido!</div>";
	}else{
		$result_usuario = "SELECT id FROM usuario_coord_voo WHERE usuario='".$dados['email'] ."'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "<div class='alert alert-danger'>Este usuário já está sendo utilizado!</div>";
		}

		$result_usuario = "SELECT id FROM usuario_coord_voo WHERE email='". $dados['email'] ."'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "<div class='alert alert-danger'>Este e-mail já está cadastrado!</div>";
		}
	}


	//var_dump($dados);
	if(!$erro){
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

		$result_usuario = "INSERT INTO usuario_coord_voo (nome, email, usuario, senha) VALUES (
						'" .$dados['nome']. "',
						'" .$dados['email']. "',
						'" .$dados['email']. "',
						'" .$dados['senha']. "'
						)";
		$resultado_usario = mysqli_query($conn, $result_usuario);
		if(mysqli_insert_id($conn)){
			$_SESSION['msgcad'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
			header("Location: login_sistema_voo.php");
		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar o usuário!</div>";
		}
	}

}
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
<form class="form-signin" method="POST" action="">
    <div class="text-center mb-4">
        <img class="mb-4" src="img/logo/logo.png" alt="" width="250" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Cadastro de usuário</h1>
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
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome Completo" required autofocus>
        <label for="nome">Nome</label>
    </div>

    <div class="form-label-group">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="email">Email</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
        <label for="senha">Senha</label>
    </div>


    <input type="submit" name="btnCadUsuario" value="Salvar Cadastro" class="btn btn-lg btn-primary btn-block">


    <p class="mt-5 mb-3 text-muted text-center">&copy;by Albert Otto</p>
</form>
</body>
</html>
