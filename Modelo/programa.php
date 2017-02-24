<?php

require_once '../controlador/validar_programa.controlador.php';

class programa
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto programa
    public $idnom_programa;
    public $programa;

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
	//programa en caso de error se muestra por pantalla.
	public function listarPrograma()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$eq = $this->pdo->prepare("SELECT * FROM nom_programa");
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

	//Este método obtiene los datos del programa a partir del idprograma
	//utilizando SQL.
	public function obtenerPrograma($idnom_programa)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el idprograma del programa.
			$eq = $this->pdo->prepare("SELECT * FROM nom_programa WHERE idnom_programa = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$eq->execute(array($idnom_programa));
			return $eq->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla programa dado un idprograma.
	public function eliminarPrograma($idnom_programa)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$eq = $this->pdo->prepare("DELETE FROM nom_programa WHERE idnom_programa = ?");

			$eq->execute(array($idnom_programa));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el idprograma del programa.
	public function actualizarPrograma($data)
	{
		try
		{
			$obj = new Validar_programaControlador();

			$sql = $obj->validar_programa();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"No se puede actualizar, el nombre del programa ya esta en uso\");window.location='?c=programa';</script>";

    		} else {

			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE nom_programa SET
						programa         = ?
				    WHERE idnom_programa = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->programa,
				    	$data->idnom_programa
					)
				);
		} 
		}catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo programa a la tabla.
	public function registrarPrograma($data)
	{
		try
		{
			$obj = new Validar_programaControlador();

			$sql = $obj->validar_programa();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"El nombre del programa ya esta en uso\");window.location='index.php?c=programa&a=nuevoPrograma';</script>";

    		} else {

			//Sentencia SQL.
			$sql = "INSERT INTO nom_programa (programa) VALUES (?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->programa,
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
