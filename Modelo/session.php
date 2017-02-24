<?php
class Session
{
	//Atributo para conexión a SGBD
	private $pdo;

	//Atributos del objeto session
    public $usuario;
    public $password;

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
	//user en caso de error se muestra por pantalla.
	public function obtenerInicioSession()
	{
		try
		{
		
		$usuario  = $_POST['usuario'];
		$password = $_POST['password'];

			$result = array();
			//Sentencia SQL para selección de datos.
			$eq = $this->pdo->prepare("SELECT correo, id_rol FROM user WHERE correo = '$usuario' AND password = '$password'");
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
}