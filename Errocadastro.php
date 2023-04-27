<?php
session_start();
	include 'Cadastro.php';
	include 'conexao.php';

	$con= getConexao();
	$c = new Cadastro();

	
	echo $c->naoCadastrado();	

if (isset($_POST["cadastrar"])) {

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

	if ($stmt->execute()) {

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

		form{
			text-align: left;
		}
		#caixa{
			text-align: center;
			float: center;
			/*display: flex;*/
		}

		body{
			background-image: url("Fundo/fundo.jpg");
			color: white;
		}

	</style>
</head>
<body>
	<div id="fomulario">
	<h3>Cadastra-se Aqui</h3>
<form method="POST">
<div id="caixa"> <strong> Nome: </strong></div>
<div id="caixa"><input type="text" name="nome" placeholder="Digite seu nome" value="<?php echo $_SESSION['nome'] ?>"></div>

<div id="caixa">
<strong> BI: </strong></div>
<div id="caixa" value="<?php echo $_SESSION['bi'] ?>"><input type="text" name="bi" placeholder="Digite o nº BI">
</div>

<div id="caixa">
<strong> Idade: </strong></div>
<div id="caixa"><input type="text" name="idade" placeholder="Digite sua idade" value="<?php echo $_SESSION['idade'] ?>">
</div>

<div id="caixa">
<strong> Gênero: </strong></div>
<div id="caixa"><SELECT name="genero">  
		<?php
		if ($_SESSION['genero'] == "Masculino") {?>
		<option >Masculino</option>
		<option>Femenino</option> <?php

		}elseif ($_SESSION['genero'] == "Femenino"){?>
			<option >Femenino</option>
			<option >Masculino</option>  
	   <?php
	} else {?> 
		<option ></option>
		<option >Masculino</option>
		<option>Femenino</option> <?php

		}?> 
	</SELECT></div>

<div id="caixa">
<strong> Categoria: </strong></div>
<div id="caixa"><SELECT name="categoria">  

		<?php
		if ($_SESSION['categoria'] == "Administrador") {?>
		<option >Administrador</option>
		<option>Cliente</option> <?php

		}elseif ($_SESSION['categoria'] == "Cliente"){?>
			<option >Cliente</option>
			<option >Administrador</option>  
	   <?php
	} else {?> 
		<option ></option>
		<option >Administrador</option>
		<option>Cliente</option> <?php

		}?> 

</SELECT></div>


<div id="caixa"> <br>
<input type="submit" name="cadastrar" value="Cadastrar">
<a href="Index.php"><input type="button" name="cancelar" value="Cancelar"></a>
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

