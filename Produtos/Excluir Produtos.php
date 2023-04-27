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
			$con = getConexao();


				
					$codProd = $_POST["codProd"];
					$nome = $_POST["nomeProd"];
					$categoria = $_POST["tipoProd"]; 
					$preco = $_POST["preco"];

					$sql = "delete from cadastroProduto where codProd = ?";

					$stmt= $con->prepare($sql);
					$stmt->bindValue(1, $codProd);
			


			if ($stmt->execute()) {

		$s= "Foi Excluido um produto com nome de ".$nome." no dia ".date("m-d-Y")." as ".date("H:i:s");

		$sms = "insert into sms(n, sms)
		values('1', '$s')";
		$stmt2= $con->prepare($sms);
		$stmt2->execute();

		echo "<strong>".$nome."</strong> foi Excluido com sucesso <br>";

			require_once '../Administrador/Administrador.php';
			$a = new Administrador();
			$a->RelatorioProdutos();

	//		echo "foi Excluido com sucesso".$id;
		//header("location:PaginaIniAdministrador.php");
					}else{
						echo "Não foi possível Excluir";
					}
?>

</body>
</html>
	