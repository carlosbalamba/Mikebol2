<?php

	require_once '../controlador/validar_admin_instructor.controlador.php';

	class admin_instructor
	{
		//Atributo para conexión a SGBD
		private $pdo;

		//Atributos del objeto perfil_persona
    	public $nombres;
    	public $apellidos;
    	public $idtipo_documento;
    	public $num_documento;
    	public $correo;
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
		public function ListarAdmin_instructor()
		{
			try
			{
				$result = array();
				//Sentencia SQL para selección de datos.
				$eq = $this->pdo->prepare("SELECT `admin_e_instructor`.`nombres`, `admin_e_instructor`.`apellidos`, `tipo_documento`.`documento`, `admin_e_instructor`.`num_documento`, `user`.`correo`, `rol`.`descripcion_rol`, `estado`.`descripcion` 
					FROM `admin_e_instructor`
					LEFT JOIN `user` ON `admin_e_instructor`.`correo` = `user`.`correo` 
					LEFT JOIN `rol` ON `user`.`idrol` = `rol`.`idrol` 
					LEFT JOIN `tipo_documento` ON `user`.`idtipo_documento` = `tipo_documento`.`idtipo_documento` 
					LEFT JOIN `estado` ON `user`.`idestado` = `estado`.`idestado` 
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
		public function obtenerAdmin_instructor($correo)
		{
			try
			{
				//Sentencia SQL para selección de datos utilizando
				//la clausula Where para especificar el correo del perfil_persona.
				$eq = $this->pdo->prepare("SELECT `admin_e_instructor`.`nombres`, `admin_e_instructor`.`apellidos`, `tipo_documento`.`documento`, `admin_e_instructor`.`num_documento`, `user`.`correo`, `rol`.`descripcion_rol`, `estado`.`descripcion`
					FROM `admin_e_instructor`
					LEFT JOIN `user` ON `admin_e_instructor`.`correo` = `user`.`correo` 
					LEFT JOIN `rol` ON `user`.`idrol` = `rol`.`idrol` 
					LEFT JOIN `tipo_documento` ON `user`.`idtipo_documento` = `tipo_documento`.`idtipo_documento` 
					LEFT JOIN `estado` ON `user`.`idestado` = `estado`.`idestado` WHERE `user`.`correo` = ?");
			
					//Ejecución de la sentencia SQL utilizando el parámetro correo.
				$eq->execute(array($correo));
			
				return $eq->fetch(PDO::FETCH_OBJ);
			}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Este método activar o incativar la tupla perfil_persona dado un correo.
		public function cambiar_estado_admin_instructor($data)
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

			} 
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		//Método que actualiza una tupla a partir de la clausula
		//Where y el correo del perfil persona.
		public function actualizarAdmin_instructor($data)
		{
			try
			{
				$obj = new Validar_admin_instructorControlador();

            	$sql = $obj->validar_admin_instructor();

            	$rows = $sql;

            	if ($rows != null) 
            	{

                	print "<script>alert(\"No se puede actualizar, el número de documento y el tipo de documento que seleccionaste ya esta en uso, tambien puede ser que el correo electrónico ya esta en uso\");window.location='?c=admin_instructor';</script>";

            	} else {

				//Sentencia SQL para actualizar los datos.
				$sql = "UPDATE user SET
							correo         		= ?,
							idtipo_documento    = ?
				    	WHERE correo			= ?";

				//Ejecución de la sentencia a partir de un arreglo.
				$this->pdo->prepare($sql)
			    	 ->execute(
				    	array(
				    		$data->correo,
				    		$data->idtipo_documento,
				    		$data->correo
						)
					); 

			    $sql1 = "UPDATE admin_e_instructor SET
							nombres         = ?,
							apellidos       = ?,
							correo   		= ?,
							num_documento   = ?
				    	WHERE correo 		= ?";

				//Ejecución de la sentencia a partir de un arreglo.
				$this->pdo->prepare($sql1)
			    	 ->execute(
				    	array(
				    		$data->nombres,
				    		$data->apellidos,
				    		$data->correo,
				    		$data->num_documento,
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
		public function registrarAdmin_instructor($data)
		{
			try
			{
				$obj = new Validar_admin_instructorControlador();

            	$sql = $obj->validar_admin_instructor();

            	$rows = $sql;

            	if ($rows != null) {

                	print "<script>alert(\"El número de documento y el tipo de documento que seleccionaste ya esta en uso, tambien puede ser que el correo electrónico ya esta en uso\");window.location='index.php?c=perfil_persona&a=nuevoPerfil_persona';</script>";

            	} else {

					//Sentencia SQL.
					$sql = "INSERT INTO user (correo, password, idrol, idtipo_documento, idestado) VALUES (?, ?, ?, ?, 0)";

					$this->pdo->prepare($sql)
		     			->execute(
						array(
                    		$data->correo,
                    		$data->password,
                    		$data->idrol,
                    		$data->idtipo_documento
                		)
					);

		     		$sql = "INSERT INTO admin_e_instructor (nombres, apellidos, correo, num_documento) VALUES (?, ?, ?, ?)";

					$this->pdo->prepare($sql)
		     			->execute(
						array(
                    		$data->nombres,
                    		$data->apellidos,
                    		$data->correo,
                    		$data->num_documento,
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