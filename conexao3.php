<?php
header("Content-type: text/html; charset=utf-8");
$servidor = "sistemavoo.mysql.dbaas.com.br";
$usuario = "sistemavoo";
$senha = "Aeron@vePRZJM";
$dbname = "sistemavoo";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
