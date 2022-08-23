
var data = document.querySelectorAll(".nav .items")

var contexto='';



async function fetchData(categoria,otrosFiltros){
    contexto='';
    var dato='';
     var retorno = await conectarConServidor({tipoP:'obtenerProductosxCategoria',idCategoria:categoria,filtros:otrosFiltros}).
     then((e)=>{
         console.log(e);
         e.forEach(element => {           
            var imagen=element.urlfotos.split(',');  
            dato+='<div class="column is-half-mobile is-one-quarter-desktop">'+
                    ' <div class="card "> '+
                        ' <span class="price has-background-dark has-text-white"> Disponible</span> '+
                        ' <div class="image is-square "> '+
                        '     <img src="'+imagen[0] +'" alt=""> '+
                        ' </div> '+
                        '<div class="card-infos">'+
                        '<h4 class="has-text-black has-text-centered has-text-weight-bold"> '+element.nombre +' </h4>'+
                        ' <h1 class="has-text-centered is-family-monospace"> Bs. '+ element.precio+ ' </h1>'+
                        '    <div class="card-buttons">'+
                        '        <a href="javascript:;" class="btn btn--mini-rounded" onClick="agregarI('+element.idP+','+element.precio+',1 ,this )" data="'+element.nombre+','+imagen[0]+'"><i'+
                                '           class="zmdi zmdi-shopping-cart" ></i></a>'+
                                '   <a href="producto.html?prds='+element.idP+'" class="btn btn--mini-rounded"><i'+
                                '           class="zmdi zmdi-eye"></i></a>'+
                            ' </div>'+
                        ' </div>'+
                        '</div> '+
                    '</div>';
    
        });
        return dato;
     }).catch((ee)=>{
         console.log('Error al traer los productos ',ee);
         return 'Error al traer la informacion';
     })     
    return retorno;
}


async function obtenerProductosxFiltros(cantidad,filtros){
    var imagen='';

    var retorno= await conectarConServidor( { tipoP:'obtenerProductosxFiltros',filtro:filtros, limite:cantidad } ).
    then((e)=>{               
        if(e!=null){            
            contexto='';       
            console.log(e);
            e.forEach(element => {
                imagen =element.urlfotos.split(',');      
                contexto += ' <div class="carousel__elemento">'+
                '<div class="card">'+
                    '<span class="price"> Bs. '+element.precio+'</span>'+                             
                    '<div class="is-square image">'+
                       ' <img src="'+imagen[0]+'" alt="">'+
                    '</div>'+
                    '<div class="card-infos">'+
                        '<h4 class="has-text-black has-text-centered has-text-weight-bold "> Bs. '+element.precio+' </h4>'+
                        '<p class="has-text-centered ">'+element.nombre+'</p>'+
                            '<div class="card-buttons">'+
                                '<a href="javascript:;" class="btn btn--mini-rounded" onClick="agregarI('+element.idP+','+element.precio+',1 ,this )" data="'+element.nombre+','+imagen[0]+'" ><i class="zmdi zmdi-shopping-cart" ></i></a>'+
                               ' <a href="producto.html?prds='+element.idP+'" class="btn btn--mini-rounded"><i class="zmdi zmdi-eye"></i></a>'+
                            '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';      
            });          
            return contexto.toString();    
        }    
    })
    .catch((e)=>{           
        return 'vacio';            
    })
    return retorno;    
}

async function obtenerDatosEntidad(){
  
     var retorno = await conectarConServidor({tipoP:'obtenerInfoEntidad'}).
     then((e)=>{         
        return e;
     }).catch((ee)=>{
         console.log('Error al traer los productos ',ee);
         return 'Error al traer la informacion';
     })     
    return retorno;
}