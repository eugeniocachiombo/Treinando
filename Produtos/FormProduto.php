<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="estilo.css">
	<style type="text/css">
		
		body{
			background-image: url("../Fundo/fundo.jpg");
			color: white;
			background-size: cover;
			background-repeat: no-repeat;
		}

		#form{
			text-align: center;
		}
	</style>
</head>
<body>

	<form method="POST">

	<div id="form">
	<p>Nome do produto:</p>
	<input type="text" name="nomeProd" > 
	</div>

	<div id="form">
	<p>Tipo de produto:</p>
	<select name="tipoProd">
		<option>Alimentos</option>
		<option>Fruta</option>
		<option>Legumes</option>
	</select>
	</div>

	<div id="form">
	<p>Preço do produto:</p>
	<input type="text" name="preco" >
	</div>
		
	<div id="form">
	<p></p>	
	<input type="submit" name="botao" value="Cadastrar Produto">
	</div>


	</form>
</body>
</html>

<?php  


	if (isset($_POST["botao"])) {
		
		include 'conexao.php';
		include 'Produto.php';

		$con= getConexao();
		$P = new Produto();

		if ($_POST["nomeProd"] == "" || $_POST["tipoProd"] == "" || $_POST["preco"] == "") {

		echo "Existe campo vazio";

		}else {

		$nome = $_POST["nomeProd"];
		$tipo = $_POST["tipoProd"];
			
		$s= "Foi registrado um novo produto com nome de  ".$nome." no dia ".date("m-d-Y")." as ".date("H:i:s")." na categoria de ".$tipo;

		$sms = "insert into sms(n, sms)
		values('1', '$s')";
		$stmt2= $con->prepare($sms);
		$stmt2->execute();


		$P->setNomeProd($_POST["nomeProd"]);
		$P->setTipoProd($_POST["tipoProd"]);
		$P->setPreco($_POST["preco"]);

		$sql= "insert into cadastroProduto(nomeProd, tipoProd, preco) values (?, ?, ?)";

		$stmt = $con->prepare($sql);
		$stmt->bindValue(1, $P->getNomeProd());
		$stmt->bindValue(2, $P->getTipoProd());
		$stmt->bindValue(3, $P->getPreco());

		if ($stmt->execute()) {
			$P->ProdCadastrado();
		}else {
			$P->ProdNaoCadastrado();
		}
		
		}

		


	}
	









?>