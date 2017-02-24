<?php

	require_once '../controlador/validar_persona.controlador.php';

class Perfil_persona
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto perfil_persona
    public $nombres;
    public $apellidos;
    public $idtipo_documento;
    public $num_documento;
    public $idnum_ficha;
    public $eps;
    public $telefono;
    public $correo;
    public $idequipo;
    public $password;
    public $idestado;

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
	//perfil_persona en caso de error se muestra por pantalla.
	public function ListarPerfil_persona()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$eq = $this->pdo->prepare("SELECT `perfil_persona`.`nombres`, `perfil_persona`.`apellidos`, `tipo_documento`.`documento`, `perfil_persona`.`num_documento`, `num_ficha`.`ficha`, `perfil_persona`.`eps`, `perfil_persona`.`telefono`, `perfil_persona`.`correo`, `equipo`.`nombre_equipo`, `rol`.`descripcion_rol`, `estado`.`descripcion` FROM `perfil_persona` 
				LEFT JOIN `user` ON `perfil_persona`.`correo` = `user`.`correo` 
				LEFT JOIN `equipo` ON `perfil_persona`.`idequipo` = `equipo`.`idequipo` 
				LEFT JOIN `num_ficha` ON `perfil_persona`.`idnum_ficha` = `num_ficha`.`idnum_ficha`
			 	LEFT JOIN `tipo_documento` ON `user`.`idtipo_documento` = `tipo_documento`.`idtipo_documento` LEFT JOIN `rol` ON `user`.`idrol` = `rol`.`idrol` LEFT JOIN `estado` ON `user`.`idestado` = `estado`.`idestado`
			  	");
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

	//Este método obtiene los datos del perfil_persona a partir del correo
	//utilizando SQL.
	public function obtenerPerfil_persona($correo)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el correo del perfil_persona.
			$eq = $this->pdo->prepare("SELECT `perfil_persona`.`nombres`, `perfil_persona`.`apellidos`, `tipo_documento`.`documento`, `perfil_persona`.`num_documento`, `num_ficha`.`ficha`, `perfil_persona`.`eps`, `perfil_persona`.`telefono`, `perfil_persona`.`correo`, `equipo`.`nombre_equipo`, `rol`.`descripcion_rol`, `estado`.`descripcion` FROM `perfil_persona` 
				LEFT JOIN `user` ON `perfil_persona`.`correo` = `user`.`correo` 
				LEFT JOIN `equipo` ON `perfil_persona`.`idequipo` = `equipo`.`idequipo` 
				LEFT JOIN `num_ficha` ON `perfil_persona`.`idnum_ficha` = `num_ficha`.`idnum_ficha`
			 	LEFT JOIN `tipo_documento` ON `user`.`idtipo_documento` = `tipo_documento`.`idtipo_documento` LEFT JOIN `rol` ON `user`.`idrol` = `rol`.`idrol` LEFT JOIN `estado` ON `user`.`idestado` = `estado`.`idestado` WHERE `user`.`correo` = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro correo.
			$eq->execute(array($correo));
			return $eq->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método activar o incativar la tupla perfil_persona dado un correo.
	public function cambiar_estado_perfil_persona($data)
	{
		try
		{
			//Sentencia SQL para inactivar o activar una tupla utilizando
			//la clausula Where.
			$sql = "UPDATE user SET idestado = ? WHERE correo = ?";

				$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->idestado,
				    	$data->correo
					)
				); 

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el correo del perfil persona.
	public function actualizarPerfil_persona($data)
	{
		try
		{
			$obj = new Validar_personaControlador();

            $sql = $obj->validar_persona();

            $rows = $sql;

            if ($rows != null) {

                print "<script>alert(\"No se puede actualizar, el número de documento y el tipo de documento que seleccionaste ya esta en uso, tambien puede ser que el correo electrónico ya esta en uso\");window.location='?c=perfil_persona';</script>";

            } else {

			//Sentencia SQL para actualizar los datos.
			 $sql = "UPDATE user SET
						correo         		= ?,
						idtipo_documento    = ?
				    WHERE correo	= ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->correo,
				    	$data->idtipo_documento,
				    	$data->correo
					)
				); 

			     $sql1 = "UPDATE perfil_persona SET
						nombres         = ?,
						apellidos       = ?,
						num_documento   = ?,
						idnum_ficha     = ?,
						eps         	= ?,
						telefono        = ?,
						correo         	= ?
				    WHERE correo = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql1)
			     ->execute(
				    array(
				    	$data->nombres,
				    	$data->apellidos,
				    	$data->num_documento,
				    	$data->idnum_ficha,
				    	$data->eps,
				    	$data->telefono,
				    	$data->correo,
				    	$data->correo
					)
				);

		} 
		}
		catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo perfil_persona a la tabla.
	public function registrarPerfil_persona($data)
	{
		try
		{
			$obj = new Validar_personaControlador();

            $sql = $obj->validar_persona();

            $rows = $sql;

            if ($rows != null) {

                print "<script>alert(\"El número de documento y el tipo de documento que seleccionaste ya esta en uso, tambien puede ser que el correo electrónico ya esta en uso\");window.location='index.php?c=perfil_persona&a=nuevoPerfil_persona';</script>";

            } else {

			//Sentencia SQL.
			$sql = "INSERT INTO user (correo, password, idrol, idtipo_documento, idestado) VALUES (?, ?, 1, ?, 0)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->correo,
                    $data->password,
                    $data->idtipo_documento
                )
			);

		     $sql = "INSERT INTO perfil_persona (nombres, apellidos, num_documento, idnum_ficha, eps, telefono, correo, idequipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombres,
                    $data->apellidos,
                    $data->num_documento,
                    $data->idnum_ficha,
                    $data->eps,
                    $data->telefono,
                    $data->correo,
                    $data->idequipo
                )
			);
		}
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}