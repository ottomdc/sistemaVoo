<?php
header("Content-type: text/html; charset=utf-8");
	$servidor = "sistemasvoo.mysql.dbaas.com.br";
	$usuario = "sistemasvoo";
	$senha = "A3r0n@v3PRZJM";
	$dbname = "sistemasvoo";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
