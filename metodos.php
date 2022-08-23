<?php
include_once "conexion.php";
?>
<?php
$conexion=Conexion();
$datos = json_decode(file_get_contents('php://input'),true);

   if(  !empty($datos) ){
        $accion=$datos['tipoP'];         
        if($accion === 'obtener'){            
            operacionObtener($datos,$conexion);            
        }
        else if($accion === 'agregar'){
            agregarNuevoProducto($datos,$conexion);
        }             
        else if($accion === 'Oproductos'){
            obtenerProductos($conexion);
        }
        else if($accion ==='eliminarProducto'){            
            $resultado = eliminarProducto($conexion,$datos);
            echo json_encode([ 'estado'=>$resultado ]);  
        }
        else if($accion === 'actualizarDescripcion'){
            $resultado=actualizarDescripcionEmpresa($conexion,$datos);
            echo json_encode([ 'estado'=>$resultado ]);  
        }
        else if( $accion === 'descripcionEmpresa' ){
            obtenerDescripcionEmpresa($conexion);
        }
        else if($accion === 'obtenerImgCarrusel'){
            obtenerImagenesCarrusel($conexion);
        }
        else if($accion === 'imagenQRGuardada'){
            obtenerImgPago($conexion);
        }
        else if($accion === 'obtenerProductosxFiltros'){
            obtenerProductosxFiltros($conexion,$datos);
        }
        else if($accion === 'obtenerProductoxId'){
            obtenerProductoXId($conexion,$datos);
        }
        else if($accion === 'obtenerProductosxCategoria'){
            obtenerProductosxCategoria($conexion,$datos);
        }
        else if($accion === 'obtenerInfoEntidad'){
            obtenerInfoEmpresa($conexion);
        }
        else if($accion === 'nuevoUsuario' ){
            guardarUsuario($conexion,$datos);
        }
        else if($accion === 'obtenerUsuarios'){
            obtenerUsuarios($conexion);
        }
        else{                  
        }
        exit();
    }


    function operacionObtener($data,$conex){
        $id=$data['idP'];        
        $consulta='select *  from archivoproducto where idProducto='.$id.'';
        $retornado=ejecutarObtener($consulta,$conex);
        $results='';
        if($retornado->rowCount() > 0){
            $results = $retornado->fetchAll(PDO::FETCH_OBJ);
        }else{
            $results=null;
            echo json_encode($data);
            exit();
        }
        header('Content-Type: application/json charset=utf-8');
        echo json_encode($results[0]);
        exit();
    }

    function agregarNuevoProducto($data,$conex){
        $imagen=$data['imagenP'];
        header('Content-Type: application/json charset=utf-8');
        echo json_encode(['imagen'=>$imagen]);
        exit();
    }

    function obtenerProductos($conex){

        $retorno=ejecutarObtener("SELECT pr.idP,pr.nombre,pr.precio,pr.stock,pr.precioOferta,pr.marca, ep.nombreestado ,ca.descripcion AS categoria,dp.descripcion,dp.linkvideo,ca.idC  
        FROM productos AS pr  INNER JOIN detalleproducto  AS dp ON pr.idP=dp.idProducto
        left JOIN estadoproductos AS ep ON pr.idEstadoproducto= ep.idEP INNER JOIN categorias AS ca ON pr.idCategoria=ca.idC  ORDER BY pr.idP desc",$conex);
        $results='';
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results);
        }else{
            $results=null;
            echo json_encode(['estado'=>'vacio']);
        }
        exit();

    }

    function eliminarProducto($Conex,$data){

        $idProducto=$data['idP'];     
        $sentencia=" delete   from archivoproducto   where idProducto=".$idProducto ;
        $ejecutar = ejecutarInsertar($sentencia , $Conex);
        if($ejecutar){            
            $sentencia = "delete   from detalleproducto  where idProducto=".$idProducto ;
            $ejecutar = ejecutarInsertar($sentencia,$Conex);
            if($ejecutar){               
                $sentencia= "delete   from  productos where idP=".$idProducto;
                $ejecutar = ejecutarInsertar($sentencia,$Conex);
                if($ejecutar){
                    return "ok";
                }else{
                    return "Error al eliminar en la tabla de  productos";
                }
            }else{
                return 'Error al eliminar en la tabla de DetalleProducto';
            }      
        }else{
            return 'Error al eliminar  en la tabla de  Archivos';
        }
        
    }

    function actualizarDescripcionEmpresa($conex,$data){
        $descripcion=$data['descEmpresa'];
        $sentencia= "update informacion_empresa set descripcion='".$descripcion."' where idE=1";     
        $ejecutar = ejecutarInsertar($sentencia , $conex);
        if($ejecutar){            
            return 'ok'; 
        }else{
            return 'Error al actualizar el registro';
        }
    }

    function obtenerDescripcionEmpresa($conex){
        $retorno=ejecutarObtener("SELECT descripcion  FROM informacion_empresa WHERE idE=1",$conex);
        $results='';
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results);
        }else{
            $results=null;
            echo json_encode(['estado'=>'vacio']);
        }
        exit();

    }

    function obtenerImagenesCarrusel($conex){
        $sentencia ='SELECT imagenescarrusel FROM informacion_empresa WHERE idE=1';
        $retorno=ejecutarObtener($sentencia,$conex);
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results);
        }else{
            echo json_encode(['estado'=>'vacio']);
        }
        exit();

    }
    
    function obtenerImgPago($conex){
        $sentencia ='SELECT fotodepagoqr FROM informacion_empresa WHERE idE=1';
        $retorno=ejecutarObtener($sentencia,$conex);
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results);
        }else{
            echo json_encode(['estado'=>'vacio']);
        }
        exit();

    }

    function obtenerProductosxFiltros($conex,$dataset){
        $filtro=$dataset['filtro'];
        $limite=$dataset['limite'];
        $sentencia="SELECT pr.idP,pr.nombre,pr.precio,pr.stock,pr.precioOferta,pr.marca, ep.nombreestado ,arch.urlfotos
        FROM productos AS pr inner JOIN estadoproductos AS ep ON pr.idEstadoproducto= ep.idEP 
        left JOIN archivoproducto AS arch ON arch.idProducto=pr.idP  where ".$filtro."  ORDER BY RAND() LIMIT ".$limite;
        $retorno=ejecutarObtener($sentencia , $conex);
        $results='';
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results);
        }else{
            $results=null;
            echo json_encode(['estado'=>'vacio']);
        }
        exit();
    }

    function obtenerProductoXId($conex,$dataset){
        $id=$dataset['id'];
        $sentencia = "SELECT pr.idP,pr.nombre,pr.precio,pr.stock,pr.precioOferta,pr.marca, ep.nombreestado ,ca.descripcion AS categoria,dp.descripcion,dp.linkvideo,ca.idC, arch.urlfotos  
            FROM productos AS pr  INNER JOIN detalleproducto  AS dp ON pr.idP=dp.idProducto
            left JOIN estadoproductos AS ep ON pr.idEstadoproducto= ep.idEP INNER JOIN categorias AS ca ON pr.idCategoria=ca.idC  
            INNER JOIN archivoproducto AS arch ON arch.idProducto = pr.idP
            WHERE pr.idP=".$id;
        $retorno=ejecutarObtener($sentencia , $conex);
        $results='';
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results[0]);
        }else{
            $results=null;
            echo json_encode(['estado'=>'vacio']);
        }
        exit();
    }

    function obtenerProductosxCategoria($conex,$dataset){
        $id=$dataset['idCategoria'];
        $filtro=$dataset['filtros'];
        $sentencia = "SELECT pr.idP,pr.nombre,pr.precio,pr.stock,pr.precioOferta,pr.marca, ep.nombreestado ,ca.descripcion AS categoria,dp.descripcion,ca.idC,arch.urlfotos  
        FROM productos AS pr  INNER JOIN detalleproducto  AS dp ON pr.idP=dp.idProducto
        left JOIN estadoproductos AS ep ON pr.idEstadoproducto= ep.idEP INNER JOIN categorias AS ca ON pr.idCategoria=ca.idC  
        INNER JOIN archivoproducto AS arch ON arch.idProducto = pr.idP ";
        
        if($id>0){
            $sentencia.="WHERE ca.idC=".$id."";
        }
        
        if($filtro!=''){
            $sentencia.="WHERE ".$filtro."";
        }
        $sentencia.=" ORDER BY RAND()";
        
        $retorno=ejecutarObtener($sentencia , $conex);
        $results='';
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results);
        }else{
            $results=null;
            echo json_encode(['estado'=>'vacio']);
        }
        exit();
    }

    function obtenerInfoEmpresa($conex){
        $sentencia = "SELECT nombreempresa, descripcion,imagenbanner from informacion_empresa where idE=1";
        $retorno=ejecutarObtener($sentencia , $conex);
        $results='';
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results[0]);
        }else{
            $results=null;
            echo json_encode(['estado'=>'vacio']);
        }
        exit();

    }

    function guardarUsuario($conex,$dataset){
        $contrasenia=password_hash(
            base64_encode(
                hash('sha256',$dataset['pswP'], true)
            ),
            PASSWORD_DEFAULT
        );
        $sentencia="INSERT INTO usuarios (idRol,contrasenia) values (".$dataset['rolP'].",'".$contrasenia."')";
        $ejecutar = ejecutarInsertar($sentencia,$conex);
        if($ejecutar){
            $ultimoIdUsuario= $conex->lastInsertId();
            $sentencia="INSERT INTO persona (nombres,apellidos,nrocelular,ci,ubicacion,correo,idUsuario) values 
            ( '".$dataset['nombreP']."','".$dataset['apellidoP']."','".$dataset['celularP']."','".$dataset['ciP']."','".$dataset['ubicacionP']."','".$dataset['userP']."',".$ultimoIdUsuario." )";

            $ejecutar=ejecutarInsertar($sentencia,$conex);
            if($ejecutar){
                echo json_encode(['estado'=>'ok']);
            }else{
                echo json_encode(['estado'=>'Fallo al agregar a la tabla Persona '.$sentencia]);
            }
        }else{
            echo json_encode(['estado'=>'Fallo al agregar a la tabla de Usuarios']);
        }
        exit();
    }

    function obtenerUsuarios($conex){
        $sentencia="SELECT p.*,u.idRol FROM persona AS p,usuarios AS u WHERE p.idUsuario=u.idU ORDER BY p.idP desc";
        $retorno=ejecutarObtener($sentencia , $conex);
        $results='';
        if($retorno->rowCount() > 0){
            $results = $retorno->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($results);
        }else{
            $results=null;
            echo json_encode(['estado'=>'vacio']);
        }
        exit();
    }

?>
