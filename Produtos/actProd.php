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
<a href="../Administrador/PaginaIniAdministrador.php"><input type="button" value="Voltar"></a>

<?php

	require_once '../Administrador/conexao.php';
	$con= getConexao();


	if (isset($_POST["actualizar1"])) {
		

		
		$nomeProd = $_POST["nomeProd1"];
		$tipoProd = $_POST["tipoProd1"]; 
		$preco = $_POST["preco1"];
		$codProd =	$_POST["codProd1"];


		$sql= "Update cadastroProduto 
				set nomeProd= ?,
				tipoProd= ?,
				preco = ?
				where codProd = ?";		

		$stmt= $con->prepare($sql);
		$stmt->bindValue(1, $nomeProd);
		$stmt->bindValue(2, $tipoProd);
		$stmt->bindValue(3, $preco);
		$stmt->bindValue(4, $codProd);
		

		if ($stmt->execute()) {
		echo "<strong> Dados actualizados com sucesso </strong> <br>";
		echo "Actualizado par o tipo de <strong>".$tipoProd."</strong> o produto com o nome de <strong>".$nomeProd."</strong><br>";

		$s= "Foi Actualizado o produto com nome de  ".$nomeProd." no dia ".date("m-d-Y")." as ".date("H:i:s")." e colocado para o tipo ".$tipoProd;

		$sms = "insert into sms(n, sms)
		values('1', '$s')";
		$stmt2= $con->prepare($sms);
		$stmt2->execute();


		require_once '../Administrador/Administrador.php';
			$a = new Administrador();
			$a->RelatorioProdutos();
		//header("location:PaginaIniAdministrador.php");
		}
		else {
		echo "Não actualizado";
		}
	}

?>
</body>
</html>