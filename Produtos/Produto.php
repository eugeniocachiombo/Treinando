<?php


	class Produto
	{
		
		private int $codProd;
		private String $nomeProd;
		private String $tipoProd;
		private float $preco;
		

////////////////////GETS E SETTERS/////////////////
		public function getCodProd(){
			return $this->codProd;
		}

		public function setCodProd(int $cod){
			$this->codProd = $cod;
		}

		public function getNomeProd(){
			return $this->nomeProd;
		}

		public function setNomeProd(String $nP){
			$this->nomeProd = $nP;
		}

		public function getTipoProd(){
			return $this->tipoProd;
		}

		public function setTipoProd(String $tp){
			$this->tipoProd = $tp;
		}

		public function getPreco(){
			return $this->preco;
		}

		public function setPreco(float $Pr){
			$this->preco = $Pr;
		}
////////////////////GETS E SETTERS/////////////////

		public function ProdCadastrado(){
			
			echo "Executado Com sucesso";
		}

		public function ProdNaoCadastrado(){
			echo "Não Executado Com sucesso";
		}
	}