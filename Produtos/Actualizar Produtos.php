<!DOCTYPE html>
<html>
<head>
	<title></title>
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
			<th style="background: gray;">CódProd</th>
			<th style="background: gray;">NomeProd</th>
			<th style="background: gray;">Preço</th>
			<th style="background: gray;">TipoProd</th>
			<th style="background: gray;">Alternativa</th>
					</tr>
		
				<tr>
		<form method="POST" action="actProd.php">
		<td align="center">
		<input type="" readonly name="codProd1" value="<?php echo $_POST["codProd"]?>">
		</td>


		<td align="center">
			<input type="" name="nomeProd1" value="<?php echo $_POST["nomeProd"]?>">
		</td>

		<td align="center">
			<input type="" name="preco1" value="<?php echo $_POST["preco"]?>">
		</td>

		<td align="center">

			<?php $vl = $_POST["tipoProd"]; ?>
			<select name="tipoProd1">

			<?php	if ($vl == "Alimentos") {?>
				<option>Alimentos</option>
				<option>Fruta</option>
				<option>Legumes</option>
			<?php	} 

			elseif($vl == "Fruta") {?>
				
				<option>Fruta</option>
				<option>Alimentos</option>
				<option>Legumes</option>

		<?php	} elseif($vl == "Legumes") {?>
				
				<option>Legumes</option>
				<option>Fruta</option>
				<option>Alimentos</option>
				

		<?php	}

				
				?>
			</select>

		</td>
		
		<td align="center"><input type="submit" name="actualizar1" value="Actualizar"></td>
		</form>
			</tr>


</body>
</html>


