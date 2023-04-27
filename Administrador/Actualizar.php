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



			<table border="1">
					<tr>
			<th style="background: gray;">Cód</th>
			<th style="background: gray;">Nome</th>
			<th style="background: gray;">BI</th>
			<th style="background: gray;">Idade</th>
			<th style="background: gray;">Gênero</th>
			<th style="background: gray;">Categoria</th>
			<th style="background: gray;" colspan ="2">Alternativas</th>
					</tr>
		
				<tr>
		<form method="POST" action="act.php">
		<td align="center">
		<input type="" readonly name="id1" value="<?php echo $_POST["id"]?>">
		</td>


		<td align="center">
			<input type="" name="nome1" value="<?php echo $_POST["nome"]?>">
		</td>


		<td align="center">
			<input type="" name="bi1" value="<?php echo $_POST["bi"]?>">
		</td>

		<td align="center">
			<input type="" name="idade1" value="<?php echo $_POST["idade"]?>">
		</td>

		<td align="center">

			<?php $vl = $_POST["genero"]; ?>
			<select name="genero1">

			<?php	if ($vl == "Masculino") {?>
				<option>Masculino</option>
				<option>Femenino</option>
			<?php	} elseif($vl == "Femenino") {?>
				<option>Femenino</option>
				<option>Masculino</option>
		<?php	}

				
				?>
			</select>

		</td>
		
		<td align="center">

			<?php $vl = $_POST["categoria"]; ?>
			<select name="categoria1">

			<?php	if ($vl == "Administrador") {?>
				<option>Administrador</option>
				<option>Cliente</option>
			<?php	} elseif($vl == "Cliente") {?>
				<option>Cliente</option>
				<option>Administrador</option>
		<?php	}

				
				?>
		</td>
		
		<td align="center"><input type="submit" name="actualizar1" value="Actualizar"></td>
		</form>
			</tr>
</body>
</html>



