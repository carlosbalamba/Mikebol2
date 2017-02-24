<?php
class Perfil_capitan
{
    //Atributo para conexión a SGBD
    private $pdo;

    //Atributos del objeto registro capitan
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

    //Método que registra un nuevo capitan a la tabla.
    public function registrarPerfil_capitan($data)
    {
        try
        {
            //Sentencia SQL.
            $sql = "INSERT INTO user (correo, password, idrol, idtipo_documento, idestado) VALUES (?, ?, 3, ?, 0)";

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
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}