<?php

class Select_equipo{

	private $pdo;
	private $seleccionar;

	public	function __construct(){
		$this->pdo = Database::Conectar();
		$this->seleccionar = array();
	}

	public	function lista_Select_Equipo(){

		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$seq = $this->pdo->prepare("SELECT * FROM equipo");
			//Ejecución de la sentencia SQL.
			$seq->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $seq->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
}