<?php 

	 function getConexao(){
		//
	 	$bd = "mysql:host=localhost;dbname=cach;charset=utf8";
		$user = "root";
		$pass = "";

		try {			
		
			$pdo = new PDO($bd, $user, $pass);

			return $pdo;
		
		} catch (Exception $e) {
			
			echo "Erro de conexao ".$e->getMessage();
		}
	}






 ?>