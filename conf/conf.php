<?php
	$usuario = "root";
	$senha = "";
	$banco = "live";
	$host = "localhost";

	//$con = mysqli_connect();
	$link = mysqli_connect($host, $usuario, $senha, $banco);
 
	if (!$link) {
	    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	    mysqli_close($link);
	}

	mysqli_select_db($link, $banco);

	//echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL;

	//mysqli_close($link);
?>