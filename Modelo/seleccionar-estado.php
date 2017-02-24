<?php

class select_estado{
	
	private $pdo;
	private $seleccionar;

	public	function __construct(){
		$this->pdo = Database::Conectar();
		$this->seleccionar = array();
	}

	public	function lista_Select_Estado(){

		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$est = $this->pdo->prepare("SELECT * FROM estado");
			//Ejecución de la sentencia SQL.
			$est->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $est->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
}