<?php

class select_tipo_documento{
	
	private $pdo;
	private $seleccionar;

	public	function __construct(){
		$this->pdo = Database::Conectar();
		$this->seleccionar = array();
	}

	public	function lista_Select_Tipo_documento(){

		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$spro = $this->pdo->prepare("SELECT * FROM tipo_documento");
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