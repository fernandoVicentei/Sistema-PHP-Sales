<style>
#container-slider
{
    position: relative;
    display: block;
    width: 100%;
    height:100%;
}
#slider {
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
    min-height: 0px;
}
#slider li {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100%;
    height: 100%;
    display: block;
    -webkit-transition: opacity 1s;
    -moz-transition: opacity 1s;
    -ms-transition: opacity 1s;
    -o-transition: opacity 1s;
    transition: opacity 1s;
    z-index: -1;
    opacity: 0;
}
#container-slider .arrowPrev, #container-slider .arrowNext{
    font-size: 30pt;
    color: rgba(204, 204, 204, 0.65);
    cursor: pointer;
    position: absolute;
    top: 50%;
    left: 50px;
    z-index: 2; 
}
#container-slider .arrowNext {
    left: initial;
    right: 50px !important;
}
.content_slider{
    padding: 15px 30px;
    color: #FFF;
    width: 100%;
    height: 100%;
}
.content_slider div{
    text-align: center;
}
.content_slider h2{
    font-family: 'arial';
    font-size: 30pt;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 20px;
}
.content_slider p {
    font-size: 15pt;
    font-family: 'arial';
    color: #FFF;
    margin-bottom: 20px;
}
#slider li .content_slider{
    background: rgba(0, 0, 0, 0.50);
    padding: 10px 125px;
}
.content_slider{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: center;
    align-items: center;
}
.btnSlider{
    color: #FFF;
    font-size: 15pt;
    font-family: 'arial';
    letter-spacing: 1px;
    padding: 10px 50px;
    border: 1px solid #CCC;
    background: rgba(37, 40, 80, 0.55);
    border-radius: 31px;
    text-decoration: none;
    transition: .5s all;
}
.btnSlider:hover{
    background: #111;
    border: 1px solid #111;
}
.listslider {
    position: absolute;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    align-items: center;
    left: 50%;
    bottom: 5%;
    list-style: none;
    z-index: 2;
    transform: translateX(-50%);
}
.listslider li {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    cursor: pointer;
    margin: 0 5px;
}
.listslider li a {
    background: #CCC;
    border-radius: 50%;
    width: 100%;
    height: 100%;
    display: block;
}
.item-select-slid {
    background: #FFF  !important;
}

@media screen and (max-width: 460px){
	.content_slider h2 {
	    font-size: 15pt !important;
	}
	.content_slider p {
	    font-size: 12pt !important;
	}
	#container-slider .arrowPrev, #container-slider .arrowNext{
		font-size: 20pt;
	}
	#container-slider .arrowPrev{
		left: 15px;
	}
	#container-slider .arrowNext{
		right: 15px !important;
	}
	#slider{
		height: 400px;
		min-height: 400px;
	}
	#slider li .content_slider{
		padding: 10px 35px;
	}
	.btnSlider{
		padding: 10px 30px;
    	font-size: 10pt;
	}
}

</style>

<div class="container  paddinglados">
    <h1  class="text-titulo">Personalizá  la Tienda  <h1>
    <div class="container paddinglados boxshadow borderRadius ">
        <div class="container-full borderTop">
          <h2 class="has-text-centered has-text-white  is-size-4"> Carrusel Principal</h2>
        </div>
        
        <div class="columns">
            <div class="column">
                <div class='buttons is-align-self-center'>
                    
                    <div class="file is-link is-medium is-centered">
                        <label class="file-label">
                        <input class="file-input" type="file" name="resume" accept="image/png,image/jpeg,image/jpg" onChange='cargarImagen(this)'>
                            <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Buscar archivo
                            </span>
                            </span>
                        </label>
                    </div>
                    <button class="button is-medium is-centered  is-success is-responsive" onClick='guardarSlider()' >
                        <span class="icon ">
                        <i class="fas fa-save"></i>
                        </span>
                        <span>Guardar Cambios</span>
                    </button>                    

                </div>
               
                <div class="paddinglados columns is-multiline is-mobile marginArriba seccionArchivos" >
                   <!-- Archivos cargados -->
                </div>
            </div>
            <div class="column">
                <h1>Vista Previa</h1>
                <div class="paddinglados contentCarrusel">

                    <section id="container-slider">	
                        <a href="javascript: funcionEjecutar('anterior');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
                        <a href="javascript: funcionEjecutar('siguiente');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
                        <ul class="listslider indicadoresItems">
                            <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>                        
                        </ul>
                        <ul id="slider" class="items">
                            <li style="background-image: url('img/banner-large.jpg');z-index:0; opacity: 1;">
                                <div class="content_slider" >                            
                                </div>
                            </li>                                        
                        </ul>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <div class="container paddinglados boxshadow borderRadius ">
        <div class="container-full borderTop">
          <h2 class="has-text-centered has-text-white  is-size-4"> Foto de la Entidad</h2>
        </div>
        
        <div class="buttons has-addons is-centered">
          <button class="button is-outlined is-primary">
                  <input class="file-input" type="file" name="resume" accept="image/png,image/jpeg,image/jpg" onChange='cargarImagenEmpresa(this)' >
              Cargar Imagen <i class="fas fa-upload" style="margin:0px 5px;" ></i>
              
          </button>
          <button class="button is-outlined is-link" onclick="guardarImagen()" >
            Guardar Cambios 
          </button>
          <button class="button is-outlined is-danger" onclick="cancelarImagenActual()" >
            Cancelar
          </button>
        </div>  

        <div class="container">
            <div class="imagen">
                <img src="" style="width:100%;height:100%" id="img">
            </div>
        </div>  
       
    </div>


    <div class="container paddinglados boxshadow borderRadius marginArriba ">
        <div class="container-full borderTop">
          <h2 class="has-text-centered has-text-white  is-size-4"> Descripcon de la Entidad</h2>
        </div>
        <div class="container paddinglados">
            
            <div class="columns">
                <div class="column">
                    <div class="field ">
                       <p>(La cantidad de caracteres maximo es 1000)</p>
                       
                    </div>   
                    <div class='field is-grouped'>
                         <button class="button is-success level-right"  onClick="verTexto()">Ver</button>
                        <button class="button is-link level-right"  onClick="guardarDescripcion()">Guardar</button>
                    </div>                  
                     <div class="field">
                        <div class="control">
                            <textarea id="desc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h1>Vista Previa</h1>
                    <p class="paddinglados" id="textovista" style="white-space: pre-wrap;">
                        
                    </p>
                </div>
            </div>           
        </div>
    </div>
</diV>

<script src="https://cdn.tiny.cloud/1/ruj4hdu6b0fbdph7lme0ib3nefat5r0ftjisjwtyb0koaux4/tinymce/6/tinymce.min.js" referrerpolicy="origin">
    
</script>

<script src="js/peticionesfetch.js"></script>

<script>

tinymce.init({
      selector: '#desc',
});

window.onload=function(){
    cargarCarruselGuardado();    
    cargarDatosGuardados();    
    cargarImagenInicio();
}

const contenedor = document.querySelector('.seccionArchivos');
const indicador=document.querySelector('.indicadoresItems');
const items= document.querySelector('.items');
const padre= document.querySelector('.contentCarrusel');
const datosDeImagenes=new Array();
const datosDeImagenesBBDD=new Array();

const imgGuardadaBD='';
var imgSeleccionada =0;
const imag= document.querySelector('#img');

function cargarImagen(e){
    const archivos=e.files;
    var idAleatorio=0;
    if (archivos.length>0) {
        idAleatorio=obtenerIdRandom();
        const primerArchivo = archivos[0];      
        datosDeImagenes.push([idAleatorio, archivos[0] ]);  
        const objectURL = URL.createObjectURL(primerArchivo);
        agregarContenidoImagenes(objectURL,idAleatorio);
   }
}

function agregarContenidoImagenes( objectURL,id ){
    const imagen=' <div class="contenido-image" style="width:50%;height:190px;">'+
                      '<a class="tag is-delete is-centered img'+id+' "  onClick="eliminarImagen(this)" ></a>'+
                      '<img src="'+objectURL+'" style="width:100%;height:85%;" >'+
                      '</div>';
    contenedor.innerHTML+=imagen;
    cargarACarrusel(objectURL,id);
}

function eliminarImagen(e){
    
    const p=e.parentNode;
    const id=e.classList[3];
    let idnumerico=Number( id.replace("img", ""));
    contenedor.removeChild(p);
    indicador.lastChild.remove();    
    let element = document.getElementById(""+id);
    items.removeChild(element);    

    for(var i=0;i<datosDeImagenes.length;i++){
        if(idnumerico === datosDeImagenes[i][0]){
            datosDeImagenes.splice(i, 1);
            break;           
        }       
    }
    for(var i=0;i<datosDeImagenesBBDD.length;i++){
        if(idnumerico === datosDeImagenesBBDD[i][0]){
            datosDeImagenesBBDD.splice(i, 1);
            break;           
        }       
    }
}

//------------------------------ LIST SLIDER -------------------------

if(document.querySelector('.listslider')){
   let link = document.querySelectorAll(".listslider li a");
   link.forEach(function(link) {
      link.addEventListener('click', function(e){
         e.anteriorentDefault();
         let item = this.getAttribute('itlist');
         let arrItem = item.split("_");
         funcionEjecutar(arrItem[1]);
         return false;
      });
    });
}

function funcionEjecutar(side){
    console.log(side)
    let parentTarget = document.getElementById('slider');
    let elements = parentTarget.getElementsByTagName('li');
    let curElement, siguienteElement;

    for(var i=0; i<elements.length;i++){
        if(elements[i].style.opacity==1){
            curElement = i;
            break;
        }
    }

    if(side == 'anterior' || side == 'siguiente'){
        if(side=="anterior"){
            siguienteElement = (curElement == 0)?elements.length -1:curElement -1;
        }else{
            siguienteElement = (curElement == elements.length -1)?0:curElement +1;
        }
    }else{
        siguienteElement = side;
        side = (curElement > siguienteElement)?'anterior':'siguiente';
    }

    //PUNTOS INFERIORES
    let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
    elementSel[curElement].classList.remove("item-select-slid");
    elementSel[siguienteElement].classList.add("item-select-slid");
    elements[curElement].style.opacity=0;
    elements[curElement].style.zIndex =0;
    elements[siguienteElement].style.opacity=1;
    elements[siguienteElement].style.zIndex =1;

}

function cargarACarrusel(url,id){
    const tamaño=indicador.children.length;
    indicador.innerHTML+='<li><a itlist="itList_'+tamaño+'" href="#"></a></li>';
    items.innerHTML+='<li style="background-image: url('+url+');" id="img'+id+'">'+
                        '<div class="content_slider" >'+                            
                           '</div>'+
                        '</li>';
}

function verTexto(){
    const texto= tinymce.activeEditor.getBody().getInnerHTML();

    if(texto.length>0){
        let textoP=document.querySelector('#textovista');
        textoP.innerHTML=texto+'';
    }

    
}

function guardarDescripcion(){
    var informacion=document.getElementById('textovista').innerHTML;

    conectarConServidor( { tipoP:'actualizarDescripcion',descEmpresa:informacion} ).
    then((e)=>{
        console.log(e);
        if(e.estado=='ok'){
            mensajeAlerta('Informacion actualizado','success');
        }else{
            mensajeAlerta('Fallo al actualizar la informacion','error');
        }        
    })
    .catch((e)=>{
        console.log('error en el server');
       mensajeAlerta('Problemas con el servidor','error');
    })

}

function cargarDatosGuardados(){
    //visualizar la descripcion guardada de la empresa
    conectarConServidor( { tipoP:'descripcionEmpresa' } ).
    then((e)=>{        
        if(e.estado!='vacio'){                
            let textoP=document.querySelector('#textovista');
             textoP.innerHTML=e[0].descripcion+'';   
        }else{
            mensajeAlerta('Fallo al obtener la informacion de la empresa','question');
        }        
    })
    .catch((e)=>{
        console.log('error en el server');
        mensajeAlerta('Problemas con el servidor','error');
    })


}

function cargarCarruselGuardado(){

    conectarConServidor( { tipoP:'obtenerImgCarrusel' } ).
    then((e)=>{        
        console.log('REINICIO '+e[0].imagenescarrusel);
        if(e[0].imagenescarrusel !=''){               
            var imagenes=(e[0].imagenescarrusel+'').split(',');   
            var idrandom=0;

            for (let index = 0; index < imagenes.length; index++) {
                idrandom=obtenerIdRandom();
                console.log(imagenes[index]);
                agregarContenidoImagenes(imagenes[index],idrandom);        
                datosDeImagenesBBDD.push([idrandom,imagenes[index]]);
            }
            mensajeAlerta('Cargando carrusel ...','success');
        }else{
            console.log('sin imagenes');
            setTimeout(function(){
                mensajeAlerta('No se encontro ninguna imagen para el carrusel','question');
                            
            }, 2000);            
        }        
    })
    .catch((e)=>{
        console.log('error en el server');
        mensajeAlerta('Problemas con el servidor','error');
    })

}


function mensajeAlerta(mensaje,tipo){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    Toast.fire({
    icon: ''+tipo,
    title: ''+mensaje
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
            }
        }else{
            noExiste=true;
        }        
    }
    return numeroRandom;    
}

function guardarSlider(){
    console.log('guardando imagen ...')
    var cantidadDeImagenes=indicador.children.length;
    var imagenURL=datosDeImagenes;    
    var formdatos=new FormData();

    //enviando imagenes  nuevas
    for(var i=0;i < imagenURL.length;i++){
        console.log(imagenURL[i][1])
        formdatos.append('imagen'+i,imagenURL[i][1]);
    }    

    //enviando imagenes existentes
    for(var i=0;i < datosDeImagenesBBDD.length;i++){
        console.log(datosDeImagenesBBDD[i][1]);
        formdatos.append('imagenExistente'+i,datosDeImagenesBBDD[i][1]);
    }  
    
    formdatos.append( 'tipoP','guardarImagenCarruselAdministrador');
    formdatos.append('imagenesCantidad', imagenURL.length );
    formdatos.append('imagenesCantidadExistente', datosDeImagenesBBDD.length );
    console.log('enviando a fetch .. ')
    enviarAlServidorXFormData(formdatos).
    then((e)=>{
        console.log(e);
        if(e.estado=='ok'){
            mensajeAlerta('Carrusel actualizado','success');
        }else{
            mensajeAlerta('Error => '+e.estado,'error');
        }        
    })
    .catch((e)=>{
        console.log('error en el server' , e);
        mensajeAlerta('Problemas con el servidor','error');
    })
    console.log('finalizando fetch .. ');
    reiniciarSlider();
    
}

function reiniciarSlider(){
    console.log('reiniciando slider ..');
    indicador.innerHTML='<li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>';
    items.innerHTML ='<li style="background-image: url(img/banner-large.jpg);z-index:0; opacity: 1;">'+
                                '<div class="content_slider" >'+                            
                                '</div>'+
                            '</li>';
    contenedor.innerHTML='';
    datosDeImagenes.splice(0,datosDeImagenes.length);
    datosDeImagenesBBDD.splice(0,datosDeImagenesBBDD.length);
    console.log(datosDeImagenes.length + ' - - ' + datosDeImagenesBBDD.length );
    console.log('fin de reiniciando slider ..');
    
    setTimeout(function(){
        cargarCarruselGuardado();                            
     }, 2000); 
      
}

// Imagen banner
function cargarImagenEmpresa(e){
    const archivos=e.files;
      if (archivos.length>0) {
          const primerArchivo = archivos[0];
          imgSeleccionada = primerArchivo;
          const objectURL = URL.createObjectURL(primerArchivo);
          imag.src=objectURL;
    }
}
    function cancelarImagenActual(){
     if(imgSeleccionada!=0){
        cargarImagenInicio();
        imgSeleccionada=0;
     }else{
      mensajeAlerta('Sin cambios realizados ... ','question');
     }   

   }
  function cargarImagenInicio(){
        conectarConServidor( { tipoP:'obtenerInfoEntidad' } ).
        then((e)=>{        
            console.log(e);
            if(e.estado!='vacio'){      
                var imagen= e.imagenbanner;
                imag.src=imagen;
                mensajeAlerta('Banner cargado correctamente ... ','success');
            }else{

                mensajeAlerta('Fallo al obtener la imagen de pago Banner','question');
            }        
        })
        .catch((e)=>{
            console.log('error en el server');
            mensajeAlerta('Problemas con el servidor','error');
        })

    }
function guardarImagen(){
    if(imgSeleccionada!=0){
      var formdatos=new FormData();
      formdatos.append('imagen0', imgSeleccionada );
      formdatos.append('imagenesCantidad', 1 );
      formdatos.append( 'tipoP','guardarImagenBanner');
      enviarAlServidorXFormData(formdatos).
      then((e)=>{
          console.log(e);
          if(e.estado=='ok'){
              mensajeAlerta('Imagen de la Entidad actualizada ... ','success');
              imgSeleccionada=0;
          }else{
              mensajeAlerta('Error => '+e.estado,'error');
          }        
      })
      .catch((e)=>{
          console.log('error en el server' , e);
          mensajeAlerta('Problemas con el servidor'+e,'error');
      })  
    }else{
      mensajeAlerta('Sin imagen para actualizar ... ','question');
    }   

  }
</script>


