<?php
	
class select_grupoficha{

	private $pdo;
	private $seleccionar;

	public	function __construct(){
		$this->pdo = Database::Conectar();
		$this->seleccionar = array();
	}

	public	function lista_Select_Grupoficha(){
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$sgf = $this->pdo->prepare("SELECT idgrupo_ficha, grupo_ficha FROM grupo_ficha");
			//Ejecución de la sentencia SQL.
			$sgf->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $sgf->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}
}