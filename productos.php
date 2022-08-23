
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
 crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">  

 <script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>



<div class="container-full  paddinglados">
    <h1  class="text-subtitulo"> Seccion de Productos <h1>
    <diV class="paddingArriba paddinglados boxshadow borderRadius ">
        
         <button class="button is-link  is-medium derecha " id="btn"> Agregar</button>
         <div class="paddingArriba limpiar  modal-scrollable-table-body" style='font-size:18px;' >

            <table class="table " style='font-size:18px;' id="products">
                <thead class="">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>P. Oferta</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                </thead>    
                <tbody id="cuerpotabla">                
                        
                </tbody>

            </table>
        
        </div>
    </div>
</diV>


<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Informacion Producto</p>
      <button class="delete close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
    
    <form  onsubmit="llamarformulario(event)"  action='#' name="myform" >
    <div class="field">
        <label class="label">Nombre </label>
        <div class="control">
            <input class="input" type="text" placeholder="Ingresar nombre" id='nombre'   required >
        </div>
    </div>

    <div class="field">
    <label class="label">Marca </label>
    <div class="control">
        <input class="input" type="text" placeholder="Pegasus, GamingFox,etc."  id='marca' required>
    </div>
    </div>

    <div class="field">
    <label class="label">Stock (xUnidades) </label>
    <div class="control">
        <input class="input" type="input" placeholder="Ingrese aqui...." id='stock' min='1' required>
    </div>
    </div>

    <div class="field">
    <label class="label">Categoria</label>
    <div class="control">
        <div class="select is-fullwidth "  >
        <select placeholder="Elige una opcion" class="" id='categoria' >
            <option selected="select" value='1'>MOUSE</option>
            <option value='2'>PARLANTES</option>
            <option value='3'>MONITOR</option>
            <option value='4'>CPU</option>
            <option value='5'>CABLE</option>
            <option value='6'>MICROFONO</option>
            <option value='7'>TECLADO</option>
            <option value='8'>GADGETS</option>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Precio</label>
    <div class="control has-icons-left has-icons-right">
        <input class="input" type="number" placeholder="Bs 0" value="0" id='precio' min='1' required>
        <span class="icon is-small is-left">
       <attr> Bs.</attr>
        </span>
    </div>
    </div>

    <div class="control">
        <label class="label">Estado del Producto (Opcional)</label>
        <label class="radio">
            <input type="radio" name="foobar" value="oferta" id="oferta" onclick="offActivado(this);" novalidate>
            Oferta
        </label>
        <label class="radio">
            <input type="radio" name="foobar"  value="novedad" id="novedad" onclick="offActivado(this);" >
            Novedad
        </label>
        <label class="radio">
            <input type="radio" name="foobar" value="proximamente"  id="proximamente" onclick="offActivado(this);">
            Proximamente
        </label>
        <label class="radio">
            <input type="radio" name="foobar" checked value="ninguno" id="ninguno" onclick="offActivado(this);">
            Ninguno
        </label>

        <div class="is-hidden" id="off">
            <label class="label">Nuevo Precio</label>
            <div class="control has-icons-left has-icons-right">
            <input class="input is-warning " type="number" placeholder="Bs 0" value="0" id='ofertavalor'>
            <span class="icon is-small is-left">
            <attr> Bs.</attr>
                </span>
            </div>
        </div>

    </div>

    <div class="control">
        <label class="label">Archivos Multimedia</label>
        <div class="file is-info is-boxed is-centered" >
            <label class="file-label">
                <input class="file-input" type="file" name="resume" id="cargadorArchivos" accept="image/png,image/jpeg,image/jpg" onChange='cargando(this)'>
                <span class="file-cta">
                <span class="file-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </span>
                <span class="file-label">
                    Cargar Imagen
                </span>
                </span>
            </label>
        </div>
        <div class="control">
            <div class="coleccion columns is-multiline is-mobile marginArribaAbajo">
               <!-- Imagenes cargadas -->
            </div>
        </div>
    </div>

    <div class="control paddingArriba">
        <label class="label">Descripcion detallada  <small>(Maximo 500 caracteres)</small></label>
        <div class="control">
            <textarea class="textarea" placeholder="Textarea" id='detalle' maxlength='500'  required></textarea>
        </div>
    </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" type='submit' id='botonDeFormulario'>Guardar</button>
      </form>
      <button class="button cancelar">Cancelar</button>
    </footer>
  </div>
</div>


<script src="js/mensajesanimados.js">
</script>
<script src="js/peticionesfetch.js"></script>
<script>   

const modal =  document.querySelector('.modal');
const btn =  document.querySelector('#btn');
const close =   document.querySelector('.close');
const cancel =   document.querySelector('.cancelar');
const off1 =   document.querySelector('#off');
const contenedor =   document.querySelector('.coleccion');
const tabla=document.querySelector('#cuerpotabla');
const botonFormulario=document.querySelector('#botonDeFormulario');
const cargadorImagenes = document.querySelector('#cargadorArchivos');
const datosDeImagenes=new Array();
var IdProductoSeleccionado=0;

$(document).ready( function () {
    cargarProductos();        
} );

btn.addEventListener('click', function () {
    contenedor.innerHTML='';
    modal.style.display = 'block'
    botonFormulario.innerText='Guardar';
})

close.addEventListener('click',  ()=> {
    modal.style.display = 'none'
    datosDeImagenes.splice(0,datosDeImagenes.length);
})

cancel.addEventListener('click',  ()=> {
    modal.style.transition='.5s';
    modal.style.display = 'none'
   
})

window.addEventListener('click',
   function (event) {
    if (event.target.className ===  'modal-background') {
         modal.style.display = 'none';
    }
})

function cargarProductos()
{
    var datos={ tipoP:'Oproductos'};
    var productosRenderizados='';
    conectarConServidor(datos).
    then((e)=>{        
        $('#products').dataTable().fnDestroy();
        
        if(e!=null){       
            tabla.innerHTML='';
            e.forEach(element => {
                productosRenderizados += '<tr id="id'+ element.idP+'">'+
                    '<td>'+ element.idP+'</td>'+
                    '<td>' + element.nombre+ '</td>'+
                    '<td>' +element.marca+'</td>'+
                    '<td id="'+element.idC+'">'+element.categoria+'</td>'+
                    '<td>'+ element.precio+ '</td>'+
                    '<td> ' +element.nombreestado+'</td>'+
                   '<td> '+ element.precioOferta +' </td>'+
                    '<td>'+ element.stock +'</td>'+
                    '<td>'+ element.descripcion +'</td>'+
                    '<td >'+
                        '<span class="icon has-text-info" onClick="verProducto(id'+element.idP+')" >' +
                        '<i class="fas fa-edit"></i>' +
                        '</span>' +
                        '<span class="icon has-text-danger"  onClick="eliminarProducto(id'+element.idP+')" >' +
                        '<i class="fas fa-trash"></i>' +
                        '</span>' +
                    '</td>'+            
                   ' </tr>';                    
            });                         
            tabla.innerHTML+= productosRenderizados;
        }else{
            mensajeAlerta('No se encontraron productos','error');
        }             

       $('#products').DataTable({
            "bLengthChange": false,
            "bPaginate": true,
            "bInfo": false,
            destroy:true,
            responsive: true,
            "autoWidth": false, 
            language:{
                search:'Buscar:',
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Ultimo"
                },
            }
        });
    })
    .catch((e)=>{
        console.log('error en el server');
        mensajeAlerta('Problemas con el servidor','error');
    })  
    
}

function offActivado(e){
    
    if(e.value=='oferta'){
        off1.classList.remove('is-hidden');
    }else{  
        off1.classList.add('is-hidden');
    }
    
}

function cargando(e){
    const archivos=e.files;
    var idAleatorio=0;
    if (archivos.length>0) {
        idAleatorio=obtenerIdRandom();
        datosDeImagenes.push([idAleatorio, archivos[0] ]);
        const primerArchivo = archivos[0];
        const objectURL = URL.createObjectURL(primerArchivo);
        cargarImagen(objectURL,idAleatorio);      
                                               
   }
}

function eliminarProducto(e){
    var id= (e.id).replace('id','');    
    conectarConServidor({ tipoP:'eliminarProducto',idP:id}).
    then((e)=>{
        if(e.estado=='ok'){
            mensajeAlerta('Producto eliminado','success');
            modal.style.display = 'none';     
            tabla.innerHTML='';
            cargarProductos();
        }else{
            console.log(e.estado);
            mensajeAlerta('Fallo al eliminar el producto','error');
        }     
    })
    .catch((e)=>{
        console.log('error en el server');
        mensajeAlerta('Problemas con el servidor','error');
    })
}

function obtenerIdRandom(){
    var noExiste=false;
    var numeroRandom=0;
    while(noExiste !=true){
        numeroRandom=parseInt(Math.random()*100)+1;
        if(datosDeImagenes.length > 0){
            for(var i=0;i<datosDeImagenes.length;i++){
                if(numeroRandom !== datosDeImagenes[i][0]){
                    noExiste=true;
                    break;
                }
                else{
                    console.log('es igual');
                }
            }
        }else{
            noExiste=true;
        }        
    }
    return numeroRandom;    
}


function cargarImagen(data,idImagen){    
    const imagen='   <div class="contenido-image">'+
                           ' <a class="tag is-delete is-centered" onClick="eliminar(this)" id="'+idImagen+'" ></a>'+
                            '<figure class="image is-128x128">'+
                                '<img src="'+data+'" data-link="'+data+'"  style="width:128px;height:128px;">'+
                            '</figure>'+
                        '</div>';
    contenedor.innerHTML+=imagen;
}


function eliminar(e){

    var idImagen=Number(e.id);    
    const p=e.parentNode;
    for(var i=0;i<datosDeImagenes.length;i++){
        if(idImagen === datosDeImagenes[i][0]){
            datosDeImagenes.splice(i, 1);
            break;           
        }       
    }
    contenedor.removeChild(p);
}


function verProducto(e){    
    botonFormulario.innerText='Guardar Cambios';
    var informacion = e;    
    contenedor.innerHTML='';
    var id= (e.id).replace('id','');

    IdProductoSeleccionado = id;

    var nombre=informacion.children[1].innerText;
    var marca=informacion.children[2].innerText;
    var categoria=informacion.children[3].innerText;
    var categoriaId=informacion.children[3].id;
    var precio=informacion.children[4].innerText;
    var estado=informacion.children[5].innerText;
    var oferta=informacion.children[6].innerText;
    var stock=informacion.children[7].innerText;
    var descripcion=informacion.children[8].innerText;

    document.querySelector('#nombre').value=nombre;
    document.querySelector('#marca').value=marca==''?'desconocido':marca;
    document.querySelector('#precio').value= precio;
    document.querySelector('#stock').value= stock;
    document.querySelector('#ofertavalor').value= oferta ;
    document.querySelector('#detalle').value= descripcion;
    document.querySelector('#categoria').value=categoriaId;

    if(estado=='oferta'){
        off1.classList.remove('is-hidden');
    }else{
        off1.classList.add('is-hidden');
    }

    if(estado==''){
        document.querySelector('#ninguno').checked=true;
    }else if(estado=='oferta'){
        document.querySelector('#oferta').checked=true;
    }else if(estado=='novedad'){
        document.querySelector('#novedad').checked=true;
    }else if(estado=='proximamente'){
        document.querySelector('#proximamente').checked=true;
    }

    conectarConServidor({ tipoP:'obtener',idP:id}).
    then((e)=>{        
        var cadenaImagenes=''+e.urlfotos+'';
        console.log(e.urlfotos);
        var imagenes= cadenaImagenes.split(',');        
        for (let i = 0;  i< imagenes.length; i++) {
            cargarImagen(imagenes[i]);                  
        }      
    })
    .catch((e)=>{
        console.log('error')
    })
    modal.style.display = 'block';
    cargadorImagenes.value='';

}

//funcion para guardar y actualizar los productos
function llamarformulario(e){
    e.preventDefault();
    var nombre=document.querySelector('#nombre').value;
    var marca=document.querySelector('#marca').value;
    var precio=document.querySelector('#precio').value;
    var stock=document.querySelector('#stock').value;
    var oferta=document.querySelector('#ofertavalor').value;
    var descripcion=document.querySelector('#detalle').value;
    var categoria=document.querySelector('#categoria').value;

    var estado=0;
    if( document.querySelector('#ninguno').checked ){
        estado=4;
    }else if( document.querySelector('#oferta').checked ){
        estado = 2;
    }else if( document.querySelector('#novedad').checked ){
        estado = 3;
    }else if( document.querySelector('#proximamente').checked ){
        estado = 1;
    }   

    var cantidadDeImagenes=contenedor.children.length;
    var imagenURL=datosDeImagenes;
    console.log(imagenURL);
    
    var formdatos=new FormData();
    var arrayImagenes=new Array();       
    
    formdatos.append('nombreP',nombre);
    formdatos.append('marcaP',marca);
    formdatos.append('precioP',precio);
    formdatos.append('stockP',stock);
    formdatos.append('ofertaP',oferta);
    formdatos.append('descripcionP',descripcion);
    formdatos.append('categoriaP',categoria);
    formdatos.append('estadoP',estado);
    formdatos.append('imagenesCantidad', imagenURL.length );   

    //GUARDAR
    if(botonFormulario.innerText==='Guardar'){
        console.log('agregar')
        formdatos.append('tipoP','agregar');
        for(var i=0;i < imagenURL.length;i++){
            formdatos.append('imagen'+i,imagenURL[i][1]);
        }
        agregarProducto(formdatos);
    }else{
        //EDITAR
        formdatos.append('IdProducto',IdProductoSeleccionado);
        formdatos.append('tipoP','editar');
        console.log('editar');
        editarProducto(imagenURL,formdatos);
    }
    datosDeImagenes.splice(0,datosDeImagenes.length);
    cargadorImagenes.value='';
}

function agregarProducto(formDatos){
    enviarAlServidorXFormData(formDatos).
    then((e)=>{
        if(e.estado=='ok'){
            mensajeAlerta('Producto agregado','success');
            modal.style.display = 'none';     
            tabla.innerHTML='';
            cargarProductos();
        }else{
            mensajeAlerta('Fallo al agregar producto','error');
        }        
    })
    .catch((e)=>{
        console.log('error en el server');
        mensajeAlerta('Problemas con el servidor','error');
    })

}

function editarProducto(dataDeImagenes,formDatos){
    //imagenes cargadas del dispositivo
    for(var i=0;i < dataDeImagenes.length;i++){
        formDatos.append('imagen'+i,dataDeImagenes[i][1]);
        console.log( dataDeImagenes[i][1] );
    }

    var contador=0;
    var cadenaArchivo='';
    //imagenes cargadas del servidor
    for (var i = 0; i < contenedor.children.length; i++) {
        var id=contenedor.children[i].children[0].id;
        if(id=='undefined'){            
            cadenaArchivo=contenedor.children[i].children[1].children[0].dataset.link+'';        
            console.log(cadenaArchivo);    
            formDatos.append('imagenExistente'+contador,  cadenaArchivo  );
            contador++;
        }        
    }

    formDatos.append('imagenesCantidadExistente',contador);
    enviarAlServidorXFormData(formDatos).
    then((e)=>{
        if(e.estado=='ok'){
            mensajeAlerta('Producto actualizado','success');
            modal.style.display = 'none';     
            tabla.innerHTML='';
            cargarProductos();
        }else{
            console.log(e.estado);
            mensajeAlerta('Fallo al actualizar el producto','error');
        }     
    })
    .catch((e)=>{
        console.log('error en el server');
        mensajeAlerta('Problemas con el servidor','error');
    })

}



//document.querySelector('.coleccion').children[0].children[1].children[0]

</script>