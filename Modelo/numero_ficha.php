<?php

require_once '../controlador/validar_numero_ficha.controlador.php';

class Numero_ficha
{
    //Atributo para conexión a SGBD
    private $pdo;

    //Atributos del objeto numero_ficha
    public $idnum_ficha;
    public $ficha;
    public $idnom_programa;
    public $idgrupo_ficha;

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
    //numero_ficha en caso de error se muestra por pantalla.
    public function listarNumero_ficha()
    {
        try
        {
            $result = array();
            //Sentencia SQL para selección de datos.
            $eq = $this->pdo->prepare("SELECT `num_ficha`.`idnum_ficha`, `num_ficha`.`ficha`, `grupo_ficha`.`grupo_ficha`, `nom_programa`.`programa`, `estado`.`descripcion`
FROM `tipo_documento`
LEFT JOIN `estado` ON `tipo_documento`.`idestado` = `estado`.`idestado` 
LEFT JOIN `num_ficha` ON `estado`.`idestado` = `num_ficha`.`idestado` 
LEFT JOIN `grupo_ficha` ON `num_ficha`.`idgrupo_ficha` = `grupo_ficha`.`idgrupo_ficha` 
LEFT JOIN `nom_programa` ON `num_ficha`.`idnom_programa` = `nom_programa`.`idnom_programa` ");
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

    //Este método obtiene los datos del numero_ficha a partir del idnumero_ficha
    //utilizando SQL.
    public function obtenerNumero_ficha($idnum_ficha)
    {
        try
        {
            //Sentencia SQL para selección de datos utilizando
            //la clausula Where para especificar el idnumero_ficha del numero_ficha.
            $eq = $this->pdo->prepare("SELECT `num_ficha`.`idnum_ficha`, `num_ficha`.`ficha`, `grupo_ficha`.`grupo_ficha`, `nom_programa`.`programa`, `estado`.`descripcion`
FROM `tipo_documento`
LEFT JOIN `estado` ON `tipo_documento`.`idestado` = `estado`.`idestado` 
LEFT JOIN `num_ficha` ON `estado`.`idestado` = `num_ficha`.`idestado` 
LEFT JOIN `grupo_ficha` ON `num_ficha`.`idgrupo_ficha` = `grupo_ficha`.`idgrupo_ficha` 
LEFT JOIN `nom_programa` ON `num_ficha`.`idnom_programa` = `nom_programa`.`idnom_programa` WHERE idnum_ficha = ?");
            //Ejecución de la sentencia SQL utilizando el parámetro idnumero_ficha.
            $eq->execute(array($idnum_ficha));
            return $eq->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Este método elimina la tupla numero_ficha dado un idnumero_ficha.
    public function eliminarNumero_ficha($idnum_ficha)
    {
        try
        {
            //Sentencia SQL para eliminar una tupla utilizando
            //la clausula Where.
            $eq = $this->pdo
                       ->prepare("DELETE FROM num_ficha WHERE idnum_ficha = ?");

            $eq->execute(array($idnum_ficha));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que actualiza una tupla a partir de la clausula
    //Where y el idnumero_ficha del numero_ficha.
    public function actualizarNumero_ficha($data)
    {
        try
        {

            $obj = new Validar_numero_fichaControlador();

            $sql = $obj->validar_numero_ficha();

            $rows = $sql;

            if ($rows != null) {

                print "<script>alert(\"No se puede actualizar, el numero de la ficha ya esta en uso\");window.location='?c=numero_ficha';</script>";

            } else {


            //Sentencia SQL para actualizar los datos.
            $sql = "UPDATE num_ficha SET 
                        ficha               = ?, 
                        idgrupo_ficha       = ?, 
                        idnom_programa      = ?
                        WHERE idnum_ficha   = ?";
            //Ejecución de la sentencia a partir de un arreglo.
            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->ficha,
                        $data->idgrupo_ficha,
                        $data->idnom_programa,
                        $data->idnum_ficha
                    )
                );
        }
         }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    //Método que registra un nuevo numero_ficha a la tabla.
    public function registrarNumero_ficha($data)
    {
        try
        {
            $obj = new Validar_numero_fichaControlador();

            $sql = $obj->validar_numero_ficha();

            $rows = $sql;

            if ($rows != null) {

                print "<script>alert(\"El numero de la ficha ya esta en uso\");window.location='index.php?c=numero_ficha&a=nuevoNumero_ficha';</script>";

            } else {

            //Sentencia SQL.
            $sql = "INSERT INTO num_ficha (ficha, idgrupo_ficha, idnom_programa, idestado) VALUES (?, ?, ?, 0)";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->ficha,
                    $data->idgrupo_ficha,
                    $data->idnom_programa,
                )
            );

        } 
    }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}