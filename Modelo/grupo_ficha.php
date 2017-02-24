<?php

require_once '../controlador/validar_grupo_ficha.controlador.php';

class Grupo_ficha
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto grupo_ficha
    public $idgrupo_ficha;
    public $grupo_ficha;

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
	public function listarGrupo_ficha()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$eq = $this->pdo->prepare("SELECT * FROM grupo_ficha");
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

	//Este método obtiene los datos del grupo_ficha a partir del idgrupo_ficha
	//utilizando SQL.
	public function obtenerGrupo_ficha($idgrupo_ficha)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el idgrupo_ficha del grupo_ficha.
			$eq = $this->pdo->prepare("SELECT * FROM grupo_ficha WHERE idgrupo_ficha = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro idgrupo_ficha.
			$eq->execute(array($idgrupo_ficha));
			return $eq->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla grupo dado un idgrupo_ficha.
	public function eliminarGrupo_ficha($idgrupo_ficha)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$eq = $this->pdo
			           ->prepare("DELETE FROM grupo_ficha WHERE idgrupo_ficha = ?");

			$eq->execute(array($idgrupo_ficha));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el idgrupo_ficha del grupo.
	public function actualizarGrupo_ficha($data)
	{
		try
		{
			$obj = new Validar_grupo_fichaControlador();

			$sql = $obj->validar_grupo_ficha();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"No se puede actualizar, el nombre del grupo de la ficha ya esta en uso\");window.location='?c=grupo_ficha';</script>";

    		} else {

			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE grupo_ficha SET
						grupo_ficha      	= ?
				    WHERE idgrupo_ficha 	= ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->grupo_ficha,
				    	$data->idgrupo_ficha
					)
				);
		}
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo grupo_ficha a la tabla.
	public function registrarGrupo_ficha($data)
	{
		try
		{
			$obj = new Validar_grupo_fichaControlador();

			$sql = $obj->validar_grupo_ficha();

			$rows = $sql;

    		if ($rows != null) {

    			print "<script>alert(\"El nombre del grupo de la ficha ya esta en uso\");window.location='index.php?c=grupo_ficha&a=nuevogrupo_ficha';</script>";

    		} else {

			//Sentencia SQL.
			$sql = "INSERT INTO grupo_ficha (grupo_ficha) VALUES (?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->grupo_ficha,
                )
			);
		 }
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}