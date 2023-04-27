<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="estilo.css">
	<style type="text/css">
		
		body{
		background-image: url("../Fundo/fundo.jpg");
		color: white;
		
		}
	</style>
</head>
<body>

	<a href="PaginaIniAdministrador.php"><input type="button" value="Voltar"></a>
<?php

	
	$id = $_POST["id"];
	require_once 'conexao.php';

	$con = getConexao();

	$sql = "delete from sms where id = '$id' ";

	$stmt = $con->prepare($sql);


	if ($stmt->execute()) {
		echo "Mensagem excluida com sucesso";

		include 'Administrador.php';
		$a = new Administrador();
		$a->menssagem();
		
	} else {
		echo "Impossível excluir";
	}
	?>
	</body>
</html>