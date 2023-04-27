<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<style type="text/css">
		
		body{
			background-image: url("Fundo/fundo.jpg");
			color: white;
		}

		a{
			color: green;
			text-decoration: none;
		}

	</style>
</head>
<body>
	<a href="index.php"> Pretende voltar?... clique aqui</a>
	<br>
	<?php
	

	require_once 'Cadastro.php';

	$c = new Cadastro();

	$c->cadastrado();


	?>

	<form action="Index.php">
		<input type="submit" name="" value="Logar">
	</form>


</body>
</html>
