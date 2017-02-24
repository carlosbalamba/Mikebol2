<?php

class Select_rol{

	private $pdo;
	private $seleccionar;

	public	function __construct(){
		$this->pdo = Database::Conectar();
		$this->seleccionar = array();
	}

	public	function lista_Select_Rol(){

		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$seq = $this->pdo->prepare("SELECT idrol, descripcion_rol FROM rol WHERE idrol = 1 OR idrol = 2");
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