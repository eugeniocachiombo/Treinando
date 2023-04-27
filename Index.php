<?php


if (isset($_POST["logar"])) {
	
	session_start();
	include 'Cadastro.php';
	include 'conexao.php';

	$con= getConexao();

	$_SESSION["nome"] = $_POST["nome"];
	$_SESSION["bi"] = $_POST["bi"];

	if ($_SESSION["nome"] != "" && $_SESSION["bi"] != "") {
	
	$c = new Cadastro();
	$c->setNome($_SESSION["nome"]);
	$c->setBi($_SESSION["bi"]);
	
	$sql = "select * from cadastro where nome=? and bi=?";

	$stmt= $con->prepare($sql);
	$stmt->bindValue(1, $c->getNome());
	$stmt->bindValue(2, $c->getBi());
	$stmt->execute();

	if ($result= $stmt->fetch()) {

	$NovoNome = $result["nome"];
	$NovoBi = $result["bi"];
	$_SESSION["id"]  =	$result["id"];
	$_SESSION["idade"]  =	$result["idade"];
	$_SESSION["genero"]	=	$result["genero"];
	$_SESSION["categoria"] =	$result["categoria"];

	//////VALIDAÇÂO ENTRE CLIENTE E ADMINISTRADOR//////
		switch ($_SESSION["categoria"]) {
			case 'Administrador':
			header("location:Administrador/PaginaIniAdministrador.php");
				break;
			case 'Cliente':
			header("location:Cliente/PaginaIniCliente.php");
				break;
			
			default:
				# code...
				break;
		}
	//////VALIDAÇÂO ENTRE CLIENTE E ADMINISTRADOR//////

	} 
	else {
		echo "<p style='text-align:center;background: green; color: red;'>"."Dados não encontrados"."</p>";
	}

	}//VAZIO
	else{
		echo "<p style='text-align:center;background: green; color: red;'>"."Erro ao Logar"." existe 'campo vazio'</p>";
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
<h3>Logar</h3>
<form method="POST">
<div id="caixa"> <strong> Nome: </strong></div>
<div id="caixa"><input type="text" name="nome" placeholder="Digite seu nome"></div>

<div id="caixa">
<strong> BI: </strong></div>
<div id="caixa"><input type="text" name="bi" placeholder="Digite o nº BI">
</div>

<div id="caixa"> <br>
<input type="submit" name="logar" value="Logar">
<input type="submit" name="cancelar" value="Cancelar">
<br><br>
<label>Pretende criar uma conta?</label><br>
<label> <a href="Cadastrar.php"> Clique aqui </a></label>
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

