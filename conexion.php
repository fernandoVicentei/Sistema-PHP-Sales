<?php

function Conexion(){
    $pass = "";
    $user = "root";
    $database = "tiendacomercial";
    try{
        $con = new PDO('mysql:host=localhost;dbname=' . $database, $user , $pass  );
        $con->query("set names utf8;");
        
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $con;
    }catch(PDOException $pe){        
        die("Could not connect to the database $dbname :" . $pe->getMessage());
        return false;
    }
}

function ejecutarInsertar($sentencia,$conexion){
    try{
        $data = $conexion->prepare($sentencia);
        $data->execute();
        return true;
    }catch(Exception $e){
        return false;
    } 
    //$id = $base_de_datos->lastInsertId();
}
function ejecutarObtener($sentencia,$conexion){
    
    try{
        $data = $conexion->prepare($sentencia);
        $data->execute();
        
        return $data;

    }catch(Exception $e){
        return false;
    }

}
/*
PDO::FETCH_OBJ.– El parámetro que devuelve los datos capturados como un objeto.

PDO::FETCH_ASSOC.- Si desea capturar los datos en forma de matriz.
*/


?>