<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página Inicial</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<style type="text/css">

		body{
			background-image: url("../Fundo/fundo.jpg");
			color: white;
		}

		#menu{
			font-size: 20px;
			width: 10%;
			height: 80px;
		}

		#menu:hover{
			background: blue;
			border-color: green;
			display: inline-block;
		}

		#dadosMenuCategoria:hover{
			font-size: 50px;
			background: blue;
		}

		a{
			text-decoration: none;
			color: white;
		}

		legend{
			font-size: 35px;
		}

		#nomeCliente{
			font-size: 25px;
			color: white;
		}

	</style>
</head>
<body>



	<div> 
	<fieldset>
	<form method="POST">

	<a href="PaginaIniClienteMenu.php"> <img id="menu" name="menu1" src="../Fundo/Menu1.png" border="3"> </a>

	<label id="nomeCliente">
	<?php

	session_start();

	echo "Logado: ".$_SESSION["categoria"]." ".$_SESSION["nome"];
	?></label>

	<input type="submit" name="sessao" value="Terminar Sessão">
   
	</form>
	</ul>

	</fieldset>
	</div>

	
	
<!--  ////////////////////////////////////////////////////////////////  -->
	<fieldset>
	<legend id="Frutas">Frutas</legend>

	<?php
	if (isset($_POST["sessao"])) {

	include '../Cliente/Cliente.php';

	$a = new Cliente();
	$a->FimSessao();
	}


	require_once 'conexao.php';

	$con = getConexao();

	$sql = "select * from cadastroProduto where tipoProd = 'Fruta'";

	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();

	foreach ($result as $value) {
		echo "<hr>";
		echo "Nome do produto: ".$value["nomeProd"]."<br>";
		echo "Preço: ".$value["preco"]." .00 Kz";
		echo "<hr>";
	}
	?>
	</fieldset>
<!--  ////////////////////////////////////////////////////////////////  -->	

	<fieldset>
	<legend id="Alimentos">Alimentos</legend>

	<?php

	require_once 'conexao.php';

	$con = getConexao();

	$sql = "select * from cadastroProduto where tipoProd = 'Alimentos'";

	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();

	foreach ($result as $value) {
		echo "<hr>";
		echo "Nome do produto: ".$value["nomeProd"]."<br>";
		echo "Preço: ".$value["preco"]." .00 Kz";
		echo "<hr>";
	}
	?>
	</fieldset>
<!--  ////////////////////////////////////////////////////////////////  -->	


	<fieldset>
	<legend id="Legumes">Legumes</legend>

	<?php

	require_once 'conexao.php';

	$con = getConexao();

	$sql = "select * from cadastroProduto where tipoProd = 'Legumes'";

	$stmt = $con->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();

	foreach ($result as $value) {
		echo "<hr>";
		echo "Nome do produto: ".$value["nomeProd"]."<br>";
		echo "Preço: ".$value["preco"]." .00 Kz";
		echo "<hr>";
	}
	?>
	</fieldset>
<!--  ////////////////////////////////////////////////////////////////  -->	


</body>
</html>
