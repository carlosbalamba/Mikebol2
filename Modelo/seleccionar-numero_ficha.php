<?php

class select_numero_ficha{
		
		private $pdo;
		private $seleccionar;

		public function __construct(){
			$this->pdo = Database::Conectar();
			$this->seleccionar = array();
		}

		public function lista_Select_Numero_ficha(){
		
			try
			{
				$result = array();
				//Sentencia SQL para selección de datos.
				$spro = $this->pdo->prepare("SELECT idnum_ficha, ficha FROM num_ficha");
				//Ejecución de la sentencia SQL.
				$spro->execute();
				//fetchAll — Devuelve un array que contiene todas las filas del conjunto
				//de resultados
				return $spro->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				//Obtener mensaje de error.
				die($e->getMessage());
			}
		}
	}
?>