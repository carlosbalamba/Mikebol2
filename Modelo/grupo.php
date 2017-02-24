<?php

	require_once '../controlador/validar_grupo.controlador.php';

	class Grupo
	{
		//Atributo para conexión a SGBD
		private $pdo;

		//Atributos del objeto grupo
		public $idgrupo;
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
		//grupo en caso de error se muestra por pantalla.
		public function listarGrupo()
		{
			try
			{
				$result = array();
				
				//Sentencia SQL para selección de datos.
				$eq = $this->pdo->prepare("SELECT * FROM grupo");
				
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

		//Este método obtiene los datos del grupo a partir del idgrupo
		//utilizando SQL.
		public function obtenerGrupo($idgrupo)
		{
			try
			{
				//Sentencia SQL para selección de datos utilizando
				//la clausula Where para especificar el idgrupo del grupo.
				$eq = $this->pdo->prepare("SELECT * FROM grupo WHERE idgrupo = ?");

				//Ejecución de la sentencia SQL utilizando el parámetro idgrupo.
				$eq->execute(array($idgrupo));

				return $eq->fetch(PDO::FETCH_OBJ);
			} 
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Este método elimina la tupla grupo dado un idgrupo.
		public function eliminarGrupo($idgrupo)
		{
			try
			{
				//Sentencia SQL para eliminar una tupla utilizando
				//la clausula Where.
				$eq = $this->pdo->prepare("DELETE FROM grupo WHERE idgrupo = ?");

				$eq->execute(array($idgrupo));

			} 
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Método que actualiza una tupla a partir de la clausula
		//Where y el idgrupo del grupo.
		public function actualizarGrupo($data)
		{
			try
			{
				$obj = new Validar_grupoControlador();

				$sql = $obj->validar_grupo();

				$rows = $sql;

				if ($rows != null) 
				{

					print "<script>alert(\"No se puede actualizar, el nombre del grupo ya esta en uso\");window.location='index.php?c=grupo';</script>";

					} else {

					//Sentencia SQL para actualizar los datos.
					$sql = "UPDATE grupo SET
								descripcion     = ?
							WHERE idgrupo 		= ?";

					//Ejecución de la sentencia a partir de un arreglo.
					$this->pdo->prepare($sql)
						->execute(
						array(
							$data->descripcion,
							$data->idgrupo
						)
					);
				}
			} 
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Método que registra un nuevo grupo a la tabla.
		public function registrarGrupo($data)
		{
			try
			{
				$obj = new Validar_grupoControlador();

				$sql = $obj->validar_grupo();

				$rows = $sql;

				if ($rows != null) 
				{

					print "<script>alert(\"El nombre del grupo ya esta en uso\");window.location='index.php?c=grupo&a=nuevoGrupo';</script>";

					} else {

					//Sentencia SQL.
					$sql = "INSERT INTO grupo (descripcion) VALUES (?)";

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