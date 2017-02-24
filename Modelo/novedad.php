<?php

require_once '../controlador/validar_novedad.controlador.php';

class Novedad
{
    //Atributo para conexión a SGBD
    private $pdo;

    //Atributos del objeto novedad
    public $idnovedad;
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
    //novedad en caso de error se muestra por pantalla.
    public function listarNovedad()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $eq = $this->pdo->prepare("SELECT * FROM novedad");
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

    //Este método obtiene los datos de la novedad a partir del idnovedad
    //utilizando SQL.
    public function obtenerNovedad($idnovedad)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el idnovedad del novedad.
            $eq = $this->pdo->prepare("SELECT * FROM novedad WHERE idnovedad = ?");
            //Ejecución de la sentencia SQL utilizando el parámetro nit.
            $eq->execute(array($idnovedad));
            return $eq->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Este método elimina la tupla novedad dado un idnovedad.
    public function eliminarNovedad($idnovedad)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $eq = $this->pdo
                       ->prepare("DELETE FROM novedad WHERE idnovedad = ?");

            $eq->execute(array($idnovedad));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el idnovedad del novedad.
    public function actualizarNovedad($data)
    {
        try
        {
            $obj = new Validar_novedadControlador();

            $sql = $obj->validar_novedad();

            $rows = $sql;

            if ($rows != null) {

                print "<script>alert(\"No se puede actualizar, el nombre de la novedad ya esta en uso\");window.location='?c=novedad';</script>";

            } else {

            //Sentencia SQL para actualizar los datos.
            $sql = "UPDATE novedad SET
                        descripcion     = ?
                    WHERE idnovedad     = ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->descripcion,
                        $data->idnovedad
                    )
                );
        }
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra un nuevo novedad a la tabla.
    public function registrarNovedad($data)
    {
        try
        {
            $obj = new Validar_novedadControlador();

            $sql = $obj->validar_novedad();

            $rows = $sql;

            if ($rows != null) {

                print "<script>alert(\"El nombre de la novedad ya esta en uso\");window.location='index.php?c=novedad&a=nuevaNovedad';</script>";

            } else {

            //Sentencia SQL.
            $sql = "INSERT INTO novedad (descripcion) VALUES (?)";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->descripcion,
                )
            );
        }
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}