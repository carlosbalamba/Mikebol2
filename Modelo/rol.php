<?php

require_once '../controlador/validar_rol.controlador.php';

class rol
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto rol
    public $idrol;
    public $descripcion_rol;

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
	//rol en caso de error se muestra por pantalla.
	public function listarRol()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$eq = $this->pdo->prepare("SELECT * FROM rol");
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

	//Este método obtiene los datos del rol a partir del idrol
	//utilizando SQL.
	public function obtenerRol($idrol)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el idrol del rol.
			$eq = $this->pdo->prepare("SELECT * FROM rol WHERE idrol = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$eq->execute(array($idrol));
			return $eq->fetch(PDO::FETCH_OBJ);
		} 
		catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla rol dado un idrol.
	public function eliminarRol($idrol)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$eq = $this->pdo->prepare("DELETE FROM rol WHERE idrol = ?");

			$eq->execute(array($idrol));
		} 
		catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el idrol del rol.
	public function actualizarRol($data)
	{
		try
		{
			$obj = new Validar_rolControlador();

			$sql = $obj->validar_rol();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"No se puede actualizar, el nombre del rol ya esta en uso\");window.location='?c=rol';</script>";

    		} else {

			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE rol SET
						descripcion_rol		= ?
				    WHERE idrol 		= ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->descripcion_rol,
				    	$data->idrol
					)
				);
		}
		} 
		catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo rol a la tabla.
	public function registrarRol($data)
	{
		try
		{
			$obj = new Validar_rolControlador();

			$sql = $obj->validar_rol();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"El nombre del rol ya esta en uso\");window.location='index.php?c=rol&a=nuevoRol';</script>";

    		} else {

			//Sentencia SQL.
			$sql = "INSERT INTO rol (descripcion_rol) VALUES (?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->descripcion_rol,
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