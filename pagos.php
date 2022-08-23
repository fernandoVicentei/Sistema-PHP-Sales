<div class="container  paddinglados">
     <h1  class="text-titulo">Modo de Pago <b>x QR</b>  <h1>
    <div class="container paddinglados boxshadow borderRadius ">
     
      <div class="container-full borderTop">
          <h2 class="has-text-centered has-text-white  is-size-4"> Foto QR Transacciones</h2>
        </div>
        <div class="buttons has-addons is-centered">
          <button class="button is-outlined is-primary">
                  <input class="file-input" type="file" name="resume" accept="image/png,image/jpeg,image/jpg" onChange='cargarImagen(this)' >
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
              <img src="img/qr.png" style="width:100%;height:100%" id="img">
          </div>
      </div>  
    </div>

</diV>

<script src="js/peticionesfetch.js"></script>
<script src="js/mensajesanimados.js"></script>

<script>
  const imgGuardadaBD='';
  var imgSeleccionada =0;
  const imag= document.querySelector('#img');

  window.onload=function(){
    cargarImagenInicio();
  }

  function cargarImagenInicio(){

    conectarConServidor( { tipoP:'imagenQRGuardada' } ).
    then((e)=>{        
        if(e.estado!='vacio'){                
           
           var imagen= e[0].fotodepagoqr;
           imag.src=imagen;
           mensajeAlerta('QR cargado correctamente ... ','success');

        }else{
            mensajeAlerta('Fallo al obtener la imagen de pago QR','question');
        }        
    })
    .catch((e)=>{
        console.log('error en el server');
        mensajeAlerta('Problemas con el servidor','error');
    })

  }

  function cargarImagen(e){
      const archivos=e.files;
      if (archivos.length>0) {
          const primerArchivo = archivos[0];
          imgSeleccionada = primerArchivo;
          const objectURL = URL.createObjectURL(primerArchivo);
          imag.src=objectURL;
    }
  }

  function guardarImagen(){
    if(imgSeleccionada!=0){
      var formdatos=new FormData();
      formdatos.append('imagen0', imgSeleccionada );
      formdatos.append('imagenesCantidad', 1 );
      formdatos.append( 'tipoP','guardarImagenQR');

      enviarAlServidorXFormData(formdatos).
      then((e)=>{
          console.log(e);
          if(e.estado=='ok'){
              mensajeAlerta('Imagen de Pago actualizada ... ','success');
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
  

  function cancelarImagenActual(){
     if(imgSeleccionada!=0){
        cargarImagenInicio();
        imgSeleccionada=0;
     }else{
      mensajeAlerta('Sin cambios realizados ... ','question');
     }
    

  }



</script>




  