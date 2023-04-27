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
				
			require_once 'conexao.php';
			$con = getConexao();


				
					$id = $_POST["id"];
					$nome = $_POST["nome"];
					$categoria = $_POST["categoria"];

					$sql = "delete from cadastro where id = ?";

					$stmt= $con->prepare($sql);
					$stmt->bindValue(1, $id);
				
			if ($stmt->execute()) {
	
		

		echo "O <strong>".$categoria."</strong> com o nome de <strong>".$nome."</strong> foi Excluido com sucesso <br>";
			include 'Administrador.php';
			$a = new Administrador();
			$a->RelatorioCadastros();


			$s= "Foi Excluido os dados de um ".$categoria." no dia ".date("m-d-Y")." as ".date("H:i:s")." com o nome de ".$nome." Pelo ".$_SESSION["categoria"]." ".$_SESSION["nome"];

		$sms = "insert into sms(n, sms)
		values('1', '$s')";
		$stmt2= $con->prepare($sms);
		$stmt2->execute();

	//		echo "foi Excluido com sucesso".$id;
		//header("location:PaginaIniAdministrador.php");
					}else{
						echo "Não foi possível Excluir";
					} ?>

	</body>
</html>