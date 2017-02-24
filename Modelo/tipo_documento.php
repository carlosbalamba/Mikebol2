<?php

require_once '../controlador/validar_tipo_documento.controlador.php';

class Tipo_documento
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto tipo_documento
    public $idtipo_documento;
    public $documento;

	//Método de conexión a SGBD.
	public function __CONSTRUCT()
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
	//tipo_documento en caso de error se muestra por pantalla.
	public function ListarTipo_documento()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$eq = $this->pdo->prepare("SELECT `tipo_documento`.`idtipo_documento`, `tipo_documento`.`documento`, `estado`.`descripcion`
FROM `tipo_documento`
LEFT JOIN `estado` ON `tipo_documento`.`idestado` = `estado`.`idestado` ");
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

	//Este método obtiene los datos del tipo_documento a partir del idtipo_documento
	//utilizando SQL.
	public function obtenerTipo_documento($idtipo_documento)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el idtipo_documento del tipo_documento.
			$eq = $this->pdo->prepare("SELECT `tipo_documento`.`idtipo_documento`, `tipo_documento`.`documento`, `estado`.`descripcion`
FROM `tipo_documento`
LEFT JOIN `estado` ON `tipo_documento`.`idestado` = `estado`.`idestado`  WHERE idtipo_documento = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$eq->execute(array($idtipo_documento));
			return $eq->fetch(PDO::FETCH_OBJ);
		} 
		catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla tipo_documento dado un idtipo_documento.
	public function eliminarTipo_documento($idtipo_documento)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$eq = $this->pdo->prepare("DELETE FROM tipo_documento WHERE idtipo_documento = ?");
			$eq->execute(array($idtipo_documento));
		} 
		catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el idtipo_documento del tipo_documento.
	public function actualizarTipo_documento($data)
	{
		try
		{

			$obj = new Validar_tipo_documentoControlador();

			$sql = $obj->validar_tipo_documento();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"No se puede actualizar, el nombre del tipo de documento ya esta en uso\");window.location='?c=tipo_documento';</script>";

    		} else {

			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE tipo_documento SET
						documento  	       = ?
				    WHERE idtipo_documento = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->documento,
				    	$data->idtipo_documento
					)
				);
		}
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo tipo_documento a la tabla.
	public function registrarTipo_documento($data)
	{
		try
		{
			$obj = new Validar_tipo_documentoControlador();

			$sql = $obj->validar_tipo_documento();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"El nombre del tipo de documento ya esta en uso\");window.location='index.php?c=tipo_documento&a=nuevoTipo_documento';</script>";

    		} else {

			//Sentencia SQL.
			$sql = "INSERT INTO tipo_documento (idtipo_documento, documento, idestado) VALUES (?, ?, 0)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idtipo_documento,
                    $data->documento,
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