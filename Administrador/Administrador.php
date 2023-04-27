<?php
	
	class Administrador
	{
		

		private int $id;
		private String $nome;
		private int $bi; 
		private int $idade; 
		private String $genero; 
		private String $categoria; 
			function __construct()
		{	
			session_start();
			$this->setId($_SESSION["id"]);
			$this->setNome($_SESSION["nome"]);
			$this->setBi($_SESSION["bi"]);
			$this->setIdade($_SESSION["idade"]);
			$this->setGenero($_SESSION["genero"]);
			$this->setCategoria($_SESSION["categoria"]);
		}

		public function getId(){
			return $this->id;
		}

		public function setId(int $i){
			$this->id = $i;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome(String $no){
			$this->nome = $no;
		}

		public function getBi(){
			return $this->bi;
		}

		public function setBi(int $b){
			$this->bi = $b;
		}

		public function getIdade(){
			return $this->idade;
		}

		public function setIdade(int $ida){
			$this->idade = $ida;
		}

		public function getGenero(){
			return $this->genero;
		}

		public function setGenero(String $ge){
			$this->genero = $ge;
		}

		public function getCategoria(){
			return $this->categoria;
		}

		public function setCategoria(String $cat){
			$this->categoria = $cat;
		}

	

		public function RelatorioCadastros(){
			require_once 'conexao.php';

			$con = getConexao();

			$sql = "select * from cadastro where categoria = 'Cliente'";

			$stmt = $con->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();

			echo "Administrador: ".$this->getNome();

			?>

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
			<?php
			foreach ($result as  $value) {?>
				<tr>
		<td align="center"><?php echo $value["id"]; ?></td>
		<td align="center"><?php echo $value["nome"]; ?></td>
		<td align="center"><?php echo $value["bi"]; ?></td>
		<td align="center"><?php echo $value["idade"]; ?></td>
		<td align="center"><?php echo $value["genero"]; ?></td>
		<td align="center"><?php echo $value["categoria"]; ?></td>

		<form method="POST" action="Actualizar.php">
		<input type="hidden" name="id" value="<?php echo $value["id"]?>">
	<input type="hidden" name="nome" value="<?php echo $value["nome"]?>">
	<input type="hidden" name="bi" value="<?php echo $value["bi"]?>">
	<input type="hidden" name="idade" value="<?php echo $value["idade"]?>">
	<input type="hidden" name="categoria" value="<?php echo $value["categoria"]?>">
	<input type="hidden" name="genero" value="<?php echo $value["genero"]?>">

		<td align="center"><input type="submit" name="actualizar" value="Actualizar"></td>
		</form>

		<form method="POST" action="Excluir.php">
		<input type="hidden" name="id" value="<?php echo $value["id"]?>">
		<input type="hidden" name="nome" value="<?php echo $value["nome"]?>">
		<input type="hidden" name="categoria" value="<?php echo $value["categoria"]?>">
		<td align="center"><input type="submit" name="del" value="Excluir"></td> </form>

			</tr>

				<?php	} ?>
				
				</table>
		
	<?php	
		}


		public function RelatorioAdministradores(){
			require_once 'conexao.php';

			$con = getConexao();

			$sql = "select * from cadastro where categoria = 'Administrador'";

			$stmt = $con->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();

			echo "Administrador: ".$this->getNome();

			?>

			<table border="1">
					<tr>
			<th style="background: gray;">Cód</th>
			<th style="background: gray;">Nome</th>
			<th style="background: gray;">BI</th>
			<th style="background: gray;">Idade</th>
			<th style="background: gray;">Gênero</th>
			<th style="background: gray;">Categoria</th>
					</tr>
			<?php
			foreach ($result as  $value) {?>
				<tr>
		<td align="center"><?php echo $value["id"]; ?></td>
		<td align="center"><?php echo $value["nome"]; ?></td>
		<td align="center"><?php echo $value["bi"]; ?></td>
		<td align="center"><?php echo $value["idade"]; ?></td>
		<td align="center"><?php echo $value["genero"]; ?></td>
		<td align="center"><?php echo $value["categoria"]; ?></td>
			   </tr>

				<?php	} ?>
				
				</table>
		
	<?php	
		}

		public function RelatorioProdutos(){
			
			require_once 'conexao.php';

			$con = getConexao();

			$sql = "select * from cadastroProduto";

			$stmt = $con->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();

			echo "Administrador: ".$this->getNome();

			?>

			<table border="1">
					<tr>
			<th style="background: gray;">CódProd</th>
			<th style="background: gray;">NomeProd</th>
			<th style="background: gray;">TipoProd</th>
			<th style="background: gray;">Preço</th>
			<th style="background: gray;" colspan ="2">Alternativas</th>
					</tr>
			<?php
			foreach ($result as  $value) {?>
					<tr>
		<td align="center"><?php echo $value["codProd"]; ?></td>
		<td align="center"><?php echo $value["nomeProd"]; ?></td>
		<td align="center"><?php echo $value["tipoProd"]; ?></td>
		<td align="center"><?php echo $value["preco"]." KZ" ; ?></td>



		<td align="center">
		<form method="POST" action="../Produtos/Actualizar Produtos.php">
		<input type="hidden" name="codProd" value="<?php echo $value['codProd']; ?>">
		<input type="hidden" name="nomeProd" value="<?php echo $value["nomeProd"]; ?>">
		<input type="hidden" name="tipoProd" value="<?php echo $value["tipoProd"]; ?>">
		<input type="hidden" name="preco" value="<?php echo $value["preco"]; ?>">
		<input type="submit" name="" value="Actualizar">
		</form>
		</td>


		
		<td align="center">
		<form method="POST" action="../Produtos/Excluir Produtos.php">
		<input type="hidden" name="codProd" value="<?php echo $value['codProd']; ?>">
		<input type="hidden" name="nomeProd" value="<?php echo $value["nomeProd"]; ?>">
		<input type="hidden" name="tipoProd" value="<?php echo $value["tipoProd"]; ?>">
		<input type="hidden" name="preco" value="<?php echo $value["preco"]; ?>">
		<input type="submit" name="buttExcluir" value="Excluir">
		</form>
		</td>
		
		</tr>

				<?php	} ?>
				</table>

<!--/////////////DINHEIRO TOTAL //////////////-->
				<table border="3" bgcolor="gray">
				<tr>
				<th>Total de Gastos: </th>

			<?php
			echo "<br>";
			$sql2 = "select sum(preco) from cadastroProduto";

			$stmt2 = $con->prepare($sql2);
			$stmt2->execute();
			$result2 = $stmt2->fetchAll();

			foreach ($result2 as $value2) {?>
				
	<td><?php echo "  <strong>  *** ".$value2["sum(preco)"]." .00 </strong> KZ   " ?></td>
		<?php	}

			?>	
			</tr>
		</table>
<!--/////////////DINHEIRO TOTAL //////////////-->
				<?php
							

		}

		public function RelatorioEstoque(){
			

		}



		public function ActualizarDados(){ ?>
			
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
		<form method="POST" action="actAdmin.php">
		<td align="center">
		<input type="" readonly name="id1" value="<?php echo $_SESSION["id"]?>">
		</td>


		<td align="center">
			<input type="" name="nome1" value="<?php echo $_SESSION["nome"]?>">
		</td>


		<td align="center">
			<input type="" name="bi1" value="<?php echo $_SESSION["bi"]?>">
		</td>

		<td align="center">
			<input type="" name="idade1" value="<?php echo $_SESSION["idade"]?>">
		</td>

		<td align="center">

			<?php $vl = $_SESSION["genero"]; ?>
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

			<?php $vl = $_SESSION["categoria"]; ?>
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

	<?php	}

		public function VerDados(){ ?>
			
			<table border="1">
					<tr>
			<th style="background: gray;">Cód</th>
			<th style="background: gray;">Nome</th>
			<th style="background: gray;">BI</th>
			<th style="background: gray;">Idade</th>
			<th style="background: gray;">Gênero</th>
			<th style="background: gray;">Categoria</th>
					</tr>
		
				<tr>
		<form method="POST">
		<td align="center">
		<input eadonly name="id1" value="<?php echo $_SESSION["id"]?>">
		</td>


		<td align="center">
			<input type="" readonly name="nome1" value="<?php echo $_SESSION["nome"]?>">
		</td>


		<td align="center">
			<input type="" readonly name="bi1" value="<?php echo $_SESSION["bi"]?>">
		</td>

		<td align="center">
			<input type="" readonly name="idade1" value="<?php echo $_SESSION["idade"]?>">
		</td>

		<td align="center" readonly>
		<input type="" readonly name="idade1" value="<?php echo $_SESSION["genero"]?>">	
		</td>
		
		<td align="center" readonly>
	<input type="" readonly name="idade1" value="<?php echo $_SESSION["categoria"]?>">	
		</td>
		</form>
			</tr>



	<?php	

}




		public function FimSessao(){
			
			session_destroy();
			header("location:../Index.php");

		}


		public function menssagem(){
			
		require_once 'conexao.php';

		$con = getConexao();

		$sql = "select * from sms";

		$stmt = $con->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		foreach ($result as $value) {
		
		echo "<hr>";
		echo "<h3>".$value["sms"]."</h3> <br>";?>

		<form method="POST" action="ExcluirMensagem.php">
		<input type='hidden' name="id" value='<?php echo $value["id"] ?>'>
		<input type='submit' value='Excluir'>
		</form>
		<?php echo "<hr>";

		}

		}



	}//FIM CLASS
