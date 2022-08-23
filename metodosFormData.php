<?php
include_once "conexion.php";
?>
<?php
$conexion=Conexion();
$datos = $_POST['imagenesCantidad'];
$tipo=$_POST['tipoP'];
if(!empty($tipo)){
    $numeroDeImagenes = (int)$datos;
    if($tipo==='agregar'){        
        $retornoDeNombres= cargarImagenes($numeroDeImagenes);    
        $resultado = agregarNuevoProducto($conexion,$retornoDeNombres);
        echo json_encode([ 'estado'=>$resultado ]);
    }else if($tipo==='editar'){
        $retornoDeNombres='';
        $idProducto=$_POST['IdProducto'];
        if($numeroDeImagenes>0){
            $retornoDeNombres= cargarImagenes($numeroDeImagenes);
            $retornoDeNombres=reordenarImagenesExistentes($retornoDeNombres.',');
        }else{
            $retornoDeNombres=reordenarImagenesExistentes('');
        }
        $resultado=actualizarProducto($conexion,$retornoDeNombres,$idProducto);        
        echo json_encode([ 'estado'=>$resultado ]);                           
    }else if($tipo==='guardarImagenCarruselAdministrador'){

        $retornoDeNombresMasBBDD=reordenarImagenesExistentes('');
        if($retornoDeNombresMasBBDD != ''){
            eliminarImagenesDelServidor($retornoDeNombresMasBBDD,$conexion);   
        }else{
           eliminarImagenesDelServidor("vacio",$conexion);   
        }
          
        if($numeroDeImagenes>0){
            $retornoDeNombres = guardarImagenesCarruseles($numeroDeImagenes ,'C');
            $retornoDeNombresMasBBDD=  ($retornoDeNombresMasBBDD!='') ? $retornoDeNombres .','.$retornoDeNombresMasBBDD : $retornoDeNombres;
        } 

        $resultado = guardarLinkImgCarruselBD($conexion,$retornoDeNombresMasBBDD);       
        echo json_encode([ 'estado'=> $resultado ]);

    }
    else if($tipo === 'guardarImagenQR'){
        $nombreImg = guardarImagenesCarruseles($numeroDeImagenes ,'QR');
        $nombreImgAnterior= guardarImgQRBD($nombreImg,$conexion);
        $resultado = eliminarImgQR($nombreImgAnterior);
        echo json_encode([ 'estado'=> $resultado ]);
    }
    else if($tipo === 'guardarImagenBanner'){
        $nombreImg = guardarImagenesCarruseles($numeroDeImagenes ,'Entidad');
        $nombreImgAnterior= guardarImgEntidadBBDD($nombreImg,$conexion);
        $resultado = eliminarImgQR($nombreImgAnterior);
        echo json_encode([ 'estado'=> $resultado ]);
    }
    else{
    }
    exit();    
}else{
    echo json_encode(['estado'=>'vacio']);
    exit();
}


function agregarNuevoProducto($Conex,$urlfotos){
    $nombre= $_POST['nombreP'];
    $marca=$_POST['marcaP'];
    $precio=$_POST['precioP'];
    $stock=$_POST['stockP'];
    $oferta=$_POST['ofertaP'];
    $descripcion=$_POST['descripcionP'];
    $categoria=$_POST['categoriaP'];
    $estado=$_POST['estadoP'];

    $sentencia= "Insert into productos (nombre,precio,stock,precioOferta,idEstadoproducto,idCategoria,marca) values 
                ('".$nombre."',".$precio.",".$stock.",".$oferta.",".$estado.",".$categoria.",'".$marca."')";    
    $ejecutar = ejecutarInsertar($sentencia , $Conex);

    if($ejecutar){
        $ultimoIdProducto= $Conex->lastInsertId();

        $sentencia = "insert into detalleproducto (descripcion, linkvideo,idProducto ) values ('".$descripcion."',null,".$ultimoIdProducto.")";
        $ejecutar = ejecutarInsertar($sentencia,$Conex);
        if($ejecutar){
            $sentencia=" insert into archivoproducto (idProducto,urlfotos) values (".$ultimoIdProducto.",'".$urlfotos."')";
            $ejecutar = ejecutarInsertar($sentencia,$Conex);
            if($ejecutar){
                return "ok";
            }else{
                return "Error al guardar en la tabla de  ArchivosProductos";
            }

        }else{
            return 'Error al guardar en la tabla de DetalleProducto';
        }      
    }else{
        return 'Error al guardar en la tabla de  Producto';
    }

}

function cargarImagenes($cantidadImagenes){

    $nombresDeImagenes="";
    $ruta_indexphp = dirname(realpath(__FILE__));
    $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
    for ($i=0; $i <$cantidadImagenes; $i++) {         

        $file_name_extension = explode(".", $_FILES['imagen'.$i]['name']);   
        $tipo = $_FILES['imagen'.$i]['type'];
        $temp = $_FILES['imagen'.$i]['tmp_name'];

        $nombre = rand() . '.'. $file_name_extension[1];

        if ( move_uploaded_file ( $temp,   $ruta_indexphp.'/assets/'.$nombre ) ) {
            $nombresDeImagenes .= 'assets/'.$nombre.",";
            chmod(   $ruta_indexphp.'/assets/'.$nombre, 0777);
        }else{
            $nombresDeImagenes.='Error al guardar esta imagen,';
        }
    }
    return substr($nombresDeImagenes, 0, -1);    
}

function reordenarImagenesExistentes($nombresImagenesAcumulados){    
    $cantImagenes=(int)$_POST['imagenesCantidadExistente'];
    if($cantImagenes>0){
        for ($i=0; $i <$cantImagenes ; $i++) { 
            $imagenE=$_POST['imagenExistente'.$i];
            $nombresImagenesAcumulados.=''.$imagenE.',';
        }
        return substr($nombresImagenesAcumulados, 0, -1);
    }else{
        return '';
    }
    
}

function actualizarProducto($Conex,$urlfotos,$IDProducto){
    $nombre= $_POST['nombreP'];
    $marca=$_POST['marcaP'];
    $precio=$_POST['precioP'];
    $stock=$_POST['stockP'];
    $oferta=$_POST['ofertaP'];
    $descripcion=$_POST['descripcionP'];
    $categoria=$_POST['categoriaP'];
    $estado=$_POST['estadoP'];
    $idProducto=$IDProducto;
    $sentencia= "Update productos set nombre='".$nombre."',precio=".$precio.",stock=".$stock.",precioOferta=".$oferta.",
                    idEstadoproducto=".$estado.",idCategoria=".$categoria.",marca='".$marca."' where idP=".$idProducto ;    
    
    $ejecutar = ejecutarInsertar($sentencia , $Conex);
    if($ejecutar){
        $sentencia = "Update detalleproducto set descripcion='".$descripcion."'   where idProducto=".$idProducto ;
        $ejecutar = ejecutarInsertar($sentencia,$Conex);
        if($ejecutar){
            $sentencia=" Update archivoproducto set urlfotos='".$urlfotos."'  where idProducto=".$idProducto ;
            $ejecutar = ejecutarInsertar($sentencia,$Conex);
            if($ejecutar){
                return "ok";
            }else{
                return "Error al guardar en la tabla de  ArchivosProductos";
            }
        }else{
            return 'Error al guardar en la tabla de DetalleProducto';
        }      
    }else{
        return 'Error al guardar en la tabla de  Producto';
    }

}

function guardarImagenesCarruseles($cantidadImagenes,$tipoDato){
    $nombresDeImagenes="";
    $ruta_indexphp = dirname(realpath(__FILE__));
    $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
    for ($i=0; $i <$cantidadImagenes; $i++) {         

        $file_name_extension = explode(".", $_FILES['imagen'.$i]['name']);   
        $tipo = $_FILES['imagen'.$i]['type'];
        $temp = $_FILES['imagen'.$i]['tmp_name'];

        $nombre = $tipoDato.''.date('dmyhis') . '_'.rand().'.'. $file_name_extension[1];

       if ( move_uploaded_file ( $temp,   $ruta_indexphp.'/assets/imgadmin/'.$nombre ) ) {
            $nombresDeImagenes .= 'assets/imgadmin/'.$nombre.",";
            chmod(   $ruta_indexphp.'/assets/imgadmin/'.$nombre, 0777);
        }else{
            $nombresDeImagenes.='Error al guardar esta imagen,';
        } 

    }
    
    return substr($nombresDeImagenes, 0, -1);  

}

function guardarImgQRBD($img,$conex){
    $sentencia ='SELECT fotodepagoqr FROM informacion_empresa WHERE idE=1';
    $retorno=ejecutarObtener($sentencia,$conex);
    $results = ($retorno->fetchAll(PDO::FETCH_ASSOC));
    $imagenesguardadas='';
    foreach ($results as $row => $result) {
        $imagenesguardadas = $result['fotodepagoqr'] . '';
    }

    $sentencia = 'update informacion_empresa set fotodepagoqr="'.$img.'" where idE=1 ';
    $ejecutar = ejecutarInsertar($sentencia , $conex);
    if($ejecutar){
        return $imagenesguardadas;
    }else{
        return '';
    }
}
function eliminarImgQR($urlimg){
    if($urlimg!=''){
        unlink($urlimg);  
        return 'ok';
    }
    return 'Sin imagenes para eliminar';

}

function guardarImgEntidadBBDD($img,$conex){
    $sentencia ='SELECT imagenbanner FROM informacion_empresa WHERE idE=1';
    $retorno=ejecutarObtener($sentencia,$conex);
    $results = ($retorno->fetchAll(PDO::FETCH_ASSOC));
    $imagenesguardadas='';
    foreach ($results as $row => $result) {
        $imagenesguardadas = $result['imagenbanner'] . '';
    }

    $sentencia = 'update informacion_empresa set imagenbanner="'.$img.'" where idE=1 ';
    $ejecutar = ejecutarInsertar($sentencia , $conex);
    if($ejecutar){
        return $imagenesguardadas;
    }else{
        return '';
    }
}


function guardarLinkImgCarruselBD($conex,$urlfotos){
    $sentencia = 'update informacion_empresa set imagenescarrusel="'.$urlfotos.'" where idE=1 ';
    $ejecutar = ejecutarInsertar($sentencia , $conex);
    if($ejecutar){
        return "ok";
    }else{
        return 'Error al guardar las imagenes en la base de datos';
    }
}

function eliminarImagenesDelServidor($rutasExistentes,$conex){
    $sentencia ='SELECT imagenescarrusel FROM informacion_empresa WHERE idE=1';
    $retorno=ejecutarObtener($sentencia,$conex);
    $results = ($retorno->fetchAll(PDO::FETCH_ASSOC));
    $imagenesguardadas='';
    foreach ($results as $row => $result) {
        $imagenesguardadas = $result['imagenescarrusel'] . '';
    }

    if($imagenesguardadas!=''){
        $vectorrutas=explode(",",$imagenesguardadas);
        foreach ($vectorrutas as $value) {
            try{
                if( strpos($rutasExistentes, $value) === false ){
                      unlink($value);    
                }          
            }catch(Exception $e){                
            }       
        }
    }
}

?>