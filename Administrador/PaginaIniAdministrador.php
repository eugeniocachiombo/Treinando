<?php

	require_once 'conexao.php';

		$con = getConexao();

		$sql = "select sum(n) from sms";

		$stmt = $con->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="estilo.css">

	<link rel="stylesheet" type="text/css" href="estilo.css">

	<style type="text/css">
		
		body{
		background-image: url("../Fundo/fundo.jpg");
		color: white;
		background-size: cover;
	
		}
	</style>
</head>
<body>

	<div id=""><?php
	
	include 'Administrador.php';

	$a = new Administrador();

	if (isset($_POST["RCadastro"])) {
		$a->RelatorioCadastros();

	} elseif (isset($_POST["RCadastroProdutos"])) {
		$a->RelatorioProdutos();
	} 
	elseif (isset($_POST["sms"])) {
	$a->menssagem();
	}
	elseif (isset($_POST["sessao"])) {
	$a->FimSessao(); 
	}
	elseif (isset($_POST["RAdministrador"])) {
	$a->RelatorioAdministradores(); 
	} 
	elseif (isset($_POST["meusdados"])) { ?>
	<form method="POST">
<input type="submit" name="actualizar24" value="Actualizar Dados">
</form>

<?php
	$a->VerDados(); 

	} elseif(isset($_POST["actualizar24"])){
	$a->ActualizarDados(); 	
	}

?>


  </div>
	 
	<form method="POST">
		<input type="submit" name="RCadastro" value="Clientes">
		<input type="submit" name="RCadastroProdutos" value="Produtos">

		<?php	foreach ($result as $value) {?>
		
<input type="submit" name="sms" value="Mensagem(<?php echo $value['sum(n)'] ?>)">
	<?php	}  ?>
	<input type="submit" name="RAdministrador" value="Administradores">
	<input type="submit" name="meusdados" value="Meus Dados">
	<input type="submit" name="sessao" value="Terminar Sessão">

	</form>
</body>

<footer>
	<div id="">  </div>
</footer>
</html>



