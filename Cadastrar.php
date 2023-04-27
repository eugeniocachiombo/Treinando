<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="estilo.css">
	<style type="text/css">
		
		#fomulario{
			text-align: center;
			background: green;
			color: white;
		}

		#Rodapé{
			/*text-align: center;*/
			background: black;
			color: white;
		}

		#caixa{
			text-align: center;
			float: center;
			/*display: flex;*/
		}

		body{
			background-image: url("Fundo/fundo.jpg");
			color: white;
			background-size: cover;
			background-repeat: no-repeat;
		}

	</style>
</head>
<body>
	<div id="fomulario">
	Cadastra-se Aqui
<form method="POST">
<div id="caixa"> <strong> Nome: </strong></div>
<div id="caixa"><input type="text" name="nome" placeholder="Digite seu nome"></div>

<div id="caixa">
<strong> BI: </strong></div>
<div id="caixa"><input type="text" name="bi" placeholder="Digite o nº BI">
</div>

<div id="caixa">
<strong> Idade: </strong></div>
<div id="caixa"><input type="text" name="idade" placeholder="Digite sua idade" maxlength="2">
</div>

<div id="caixa">
<strong> Gênero: </strong></div>
<div id="caixa"><SELECT name="genero">  
		
		<option></option>
		<option >Masculino</option> 
		<option >Femenino</option> 	
	</SELECT></div>

<div id="caixa">
<strong> Categoria: </strong></div>
<div id="caixa"><SELECT name="categoria">  
		<option></option>
		<option >Administrador</option> 
		<option >Cliente</option> 	
</SELECT></div>


<div id="caixa"> <br>
<input type="submit" name="cadastrar" value="Cadastrar">
<a href="Index.php"><input type="button" name="cancel" value="Cancelar"></a>
</div>
	</form>
	<br>
	</div>
	<div >
		<p>Aproveita dos melhores produtos que a nossa Loja tem a oferecer</p>
	
	</div>

</body>

<footer>
		<div id="Rodapé">
			<p>
			<strong>Sobre</strong> <br>
			Esta empresa foi criada por "Eugénio Cachiombo"
			<br><br><br><br>
			</p>


		</div>

	</footer> 
</html>

<?php


if (isset($_POST["cadastrar"])) {



	session_start();
	include 'Cadastro.php';
	include 'conexao.php';

	$con= getConexao();
	$c = new Cadastro();

	$_SESSION["nome"] = $_POST["nome"];
	$_SESSION["bi"] = $_POST["bi"];
	$_SESSION["idade"] = $_POST["idade"];
	$_SESSION["genero"] = $_POST["genero"];
	$_SESSION["categoria"] = $_POST["categoria"];

	if ($_SESSION["nome"] != "" && $_SESSION["bi"] != "" && $_SESSION["idade"] != "" && $_SESSION["genero"] != "" && $_SESSION["categoria"] != "") {

	$c->setNome($_SESSION["nome"]);
	$c->setBi($_SESSION["bi"]);
	$c->setIdade($_SESSION["idade"]);
	$c->setGenero($_SESSION["genero"]);
	$c->setCategoria($_SESSION["categoria"]);
	
	
	$sql = "insert into cadastro(nome, bi, idade, genero, categoria)
	values(?, ?, ?, ?, ?)";

	$stmt= $con->prepare($sql);
	$stmt->bindValue(1, $c->getNome());
	$stmt->bindValue(2, $c->getBi());
	$stmt->bindValue(3, $c->getIdade());
	$stmt->bindValue(4, $c->getGenero());
	$stmt->bindValue(5, $c->getCategoria());

	

	if ($stmt->execute() ) {

	$s= "Foi registrado um novo cadastro com o nome de ".$c->getNome()." como ".$c->getCategoria()." as ".date("H:i:s")." no dia ".date("m-d-Y");

	$sms = "insert into sms(n, sms)
	values('1', '$s')";
	$stmt2= $con->prepare($sms);
	$stmt2->execute();


		header("location:historico.php");
	}else {
		
		$c->naoCadastrado();
	};
	

	}//VAZIO
	else{
	header("location:Errocadastro.php");
	}
}
?>