<?php

	require_once '../controlador/validar_fase.controlador.php';

	class Fase
	{
		//Atributo para conexión a SGBD
		private $pdo;

		//Atributos del objeto fase
    	public $idfase;
    	public $descripcion;

		//Método de conexión a SGBD.
		public function __construct()
		{
			try
			{
				$this->pdo = Database::Conectar();
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Este método selecciona todas las tuplas de la tabla
		//fase en caso de error se muestra por pantalla.
		public function listarFase()
		{
			try
			{
				$result = array();
				//Sentencia SQL para selección de datos.
				$eq = $this->pdo->prepare("SELECT * FROM fase");
				//Ejecución de la sentencia SQL.
				$eq->execute();
				//fetchAll — Devuelve un array que contiene todas las filas del conjunto
				//de resultados
				return $eq->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				//Obtener mensaje de error.
				die($e->getMessage());
			}
		}

		//Este método obtiene los datos del fase a partir del idfase
		//utilizando SQL.
		public function obtenerFase($idfase)
		{
			try
			{
				//Sentencia SQL para selección de datos utilizando
				//la clausula Where para especificar el idfase del fase.
				$eq = $this->pdo->prepare("SELECT * FROM fase WHERE idfase = ?");
				//Ejecución de la sentencia SQL utilizando el parámetro idfase.
				$eq->execute(array($idfase));
				return $eq->fetch(PDO::FETCH_OBJ);
			}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Este método elimina la tupla fase dado un idfase.
		public function eliminarFase($idfase)
		{
			try
			{
				//Sentencia SQL para eliminar una tupla utilizando
				//la clausula Where.
				$eq = $this->pdo->prepare("DELETE FROM fase WHERE idfase = ?");

				$eq->execute(array($idfase));
			}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Método que actualiza una tupla a partir de la clausula
		//Where y el idfase del fase.
		public function actualizarFase($data)
		{
			try
			{
				$obj = new Validar_faseControlador();

				$sql = $obj->validar_fase();

				$rows = $sql;

	    		if ($rows != null) {	

    				print "<script>alert(\"No se puede actualizar, el nombre de la fase ya esta en uso\");window.location='?c=fase';</script>";

    			} else {

				//Sentencia SQL para actualizar los datos.
				$sql = "UPDATE fase SET
							descripcion		= ?
				    	WHERE idfase 		= ?";
				//Ejecución de la sentencia a partir de un arreglo.
				$this->pdo->prepare($sql)
			    	 ->execute(
				    	array(
				    		$data->descripcion,
				    		$data->idfase
						)
					);
				}
			}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Método que registra un nuevo fase a la tabla.
		public function registrarFase($data)
		{
			try
			{
				$obj = new Validar_faseControlador();

				$sql = $obj->validar_fase();

				$rows = $sql;

    			if ($rows != null) 
    			{

    				print "<script>alert(\"El nombre de la fase ya esta en uso\");window.location='index.php?c=fase&a=nuevaFase';</script>";

    			} else {

					//Sentencia SQL.
					$sql = "INSERT INTO fase (descripcion) VALUES (?)";

					$this->pdo->prepare($sql)
		     			->execute(
						array(
                    		$data->descripcion,
                		)
					);
				} 
			}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
?>