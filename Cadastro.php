	<?php

	class Cadastro
	{

		private int $id;
		private String $nome;
		private int $bi; 
		private int $idade; 
		private String $genero; 
		private String $categoria; 

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


		public function cadastrado(){

		session_start();
		
		$this->setNome($_SESSION["nome"]);

		echo "Os seus dados foram salvos com sucesso";
		echo "<br>Seja Bem-Vindo Sr. "."<strong style='color:green' >".$this->getNome()."</strong>";
		//echo "<br> <br> <a href='Login.php'>Ir em Logar</a>";

		//session_destroy();

		} //CADASTRO*/

		public function naoCadastrado(){
			echo "<p style='text-align:center;background: green; color: red;'>"."Erro de cadastro"." existe 'campo vazio'</p>";
		} //NÃO CADASTRO


}//FIM CLASS