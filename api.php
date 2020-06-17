<?php
	include("./conf/conf.php");

	//AES encrypt with password

	if(isset($_POST['user']) && isset($_POST['token'])){
		$user = base64_decode($_POST['user']);
		$token = base64_decode($_POST['token']);
		isset($_POST['dados'])? $dados = base64_decode($_POST['dados']): $dados = " ";
		isset($_POST['command'])? $command = base64_decode($_POST['command']): $command = " ";
		
		//echo $dados;
		//echo $command;

		if(strcmp($token, md5($user)) == 0){
			# Verifique se o registro existe
			
			$query = mysqli_query($link, "SELECT * FROM `secure_login` WHERE username='$user'");
			if (mysqli_num_rows($query)){
				mysqli_query($link, "UPDATE `secure_login` SET dados='$dados', comando='$command' WHERE username='$user';");
				echo "Sucesso: Atualizado corretamente!";
				
			}else{
				mysqli_query($link, "INSERT INTO `secure_login` (id, username, comando, dados) VALUES('', '$user', '', '$dados')");
				echo "Sucesso: Inserido corretamente!";
			}
		}else{
			echo "{'Status': 101, 'Msg':'token invalido!'}";
			exit;
		}
	}else{
		echo "{'Status': 101, 'Msg':'token invalido!'}";
		exit;
	}

	mysqli_close($link);
?>