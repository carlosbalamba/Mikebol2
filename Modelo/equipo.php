<?php

	require_once '../controlador/validar_equipo.controlador.php';

	class Equipo
	{
		//Atributo para conexión a SGBD
		private $pdo;

		//Atributos del objeto equipo
    	public $idequipo;
    	public $nombre_equipo;

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
		//equipo en caso de error se muestra por pantalla.
		public function listarEquipo()
		{
			try
			{
				$result = array();
				//Sentencia SQL para selección de datos.
				$eq = $this->pdo->prepare("SELECT * FROM equipo");
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

		//Este método obtiene los datos del equipo a partir del idequipo
		//utilizando SQL.
		public function obtenerEquipo($idequipo)
		{
			try
			{
				//Sentencia SQL para selección de datos utilizando
				//la clausula Where para especificar el idequipo del equipo.
				$eq = $this->pdo->prepare("SELECT * FROM equipo WHERE idequipo = ?");
				//Ejecución de la sentencia SQL utilizando el parámetro idequipo.
				$eq->execute(array($idequipo));
			return $eq->fetch(PDO::FETCH_OBJ);
			}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Este método elimina la tupla equipo dado un idequipo.
		public function eliminarEquipo($idequipo)
		{
			try
			{
				//Sentencia SQL para eliminar una tupla utilizando
				//la clausula Where.
				$eq = $this->pdo->prepare("DELETE FROM equipo WHERE idequipo = ?");

				$eq->execute(array($idequipo));
			} 
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Método que actualiza una tupla a partir de la clausula
		//Where y el idequipo del equipo.
		public function actualizarEquipo($data)
		{
			try
			{

				$obj = new Validar_equipoControlador();

				$sql = $obj->validar_equipo();

				$rows = $sql;

    			if ($rows != null) 
    			{

    				print "<script>alert(\"No se puede actualizar, el nombre del equipo ya esta en uso\");window.location='?c=equipo';</script>";

    			} else {

				//Sentencia SQL para actualizar los datos.
				$sql = "UPDATE equipo SET
							nombre_equipo	= ?
				    	WHERE idequipo 		= ?";
				//Ejecución de la sentencia a partir de un arreglo.
				$this->pdo->prepare($sql)
			    	 ->execute(
				    	array(
				    		$data->nombre_equipo,
				    		$data->idequipo
						)
					);
				} 
			}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Método que registra un nuevo equipo a la tabla.
		public function RegistrarEquipo($data)
		{
			try
			{

  				$obj = new Validar_equipoControlador();

				$sql = $obj->validar_equipo();

				$rows = $sql;

    			if ($rows != null) 
    			{

    				print "<script>alert(\"El nombre del equipo ya esta en uso\");window.location='index.php?c=equipo&a=NuevoEquipo';</script>";

    			} else {

					//Sentencia SQL.
					$sql = "INSERT INTO equipo (nombre_equipo) VALUES (?)";

					$this->pdo->prepare($sql)
		     			->execute(
						array(
                    		$data->nombre_equipo,
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