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

	include 'conexao.php';

	if (isset($_POST["actualizar1"])) {
		$con= getConexao();

		$nome1 = $_POST["nome1"];
		$bi1 =	$_POST["bi1"];
		$idade1 =	$_POST["idade1"];
		$genero1= $_POST["genero1"];
		$categoria1= $_POST["categoria1"];
		$id1 =	$_POST["id1"];

		$sql= "Update cadastro 
				set nome= ?,
				bi= ?,
				idade =?,
				genero = ?,
				categoria =? where id = ?";

		//echo $id1." ".$nome1." ".$bi1." ".$idade1." ".$genero1." ".$categoria1;
		$stmt= $con->prepare($sql);
		$stmt->bindValue(1, $nome1 );
		$stmt->bindValue(2, $bi1 );
		$stmt->bindValue(3, $idade1 );
		$stmt->bindValue(4, $genero1);
		$stmt->bindValue(5, $categoria1);
		$stmt->bindValue(6, $id1 );
		

		if ($stmt->execute()) {
		echo "<strong> Dados actualizados com sucesso </strong> <br>";
		echo "Actualizado os dados do <strong>".$categoria1."</strong> com o nome de <strong>".$nome1."</strong><br>";

		include 'Administrador.php';
		$a = new Administrador();
		//$a->RelatorioAdministradores();


	$s= "Foi Actualizado os dados de um ".$categoria1." no dia ".date("m-d-Y")." as ".date("H:i:s")." o seu novo nome agora é ".$nome1." alteração feita pelo ".$_SESSION["categoria"]." ".$_SESSION["nome"];

		$sms = "insert into sms(n, sms)
		values('1', '$s')";
		$stmt2= $con->prepare($sms);
		$stmt2->execute();
		//header("location:PaginaIniAdministrador.php");
		}
		else {
		echo "Não actualizado";
		}
	}

?>
</body>
</html>