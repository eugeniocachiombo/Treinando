<?php
	
	class Cliente
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

	

		public function comprar(){
			
		}

		public function encomendar(){
			

		}

		public function FimSessao(){
			
			session_destroy();
			header("location:../Index.php");

		}


	}//FIM CLASS
