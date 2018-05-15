<?php
header("Content-type: text/html; charset=utf-8");
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "sistema_voo";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
