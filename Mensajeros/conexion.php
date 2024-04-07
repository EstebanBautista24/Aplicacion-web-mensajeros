<?php
     require_once 'parametros.php';

    function conectar(){
        global $conn_string;
        $con = pg_connect($conn_string);
        if($con){
            echo "correcto";
        } else {
            // La conexión falló
            $error = pg_last_error();
            $codigo_error = trim($error);
            print "Ocurrió un error al conectarse a PostgreSQL: $codigo_error";
        }
        return $con;
   
    }
    conectar();
    

?>