<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
 crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> 
 <link rel="stylesheet" href="css/styleW.css">

<div class="container paddinglados">
  <div class="container paddinglados boxshadow borderRadius ">
    <div class="container-full borderTop">
        <h2 class="has-text-centered has-text-white  is-size-4">Usuarios del Sistema</h2>
    </div>
  <div class="">
     <button class="button is-link  is-medium derecha " id="btn1"> Nuevo Usuario</button>

     <div class="paddingArriba limpiar  " style='font-size:18px;'>
        <table class="table " id="usuarios">
          <thead>
            <tr>
              <th>Nombre Completo</th>              
              <th>Nro. Celular</th>
              <th>CI</th>
              <th>Ubicacion</th>
              <th>Correo</th>
              <th>Rol</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="datostabla">
            
            
           
          </tbody>
        </table>
     </div>
    </div>
  </div>
</diV>


<div class="modal " >
  <div class="modal-background"></div>
  <div class="modal-card">

    <header class="modal-card-head ">
      <p class="modal-card-title">Informacion de Usuario</p>
      <button class="delete close cerrar"  aria-label="close"></button>
    </header>

    <section class="modal-card-body">
      <form id="formulario" onsubmit="llamarformulario(event)" >

          <div class="tab">Datos Personales:
            <p><input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingresa tu nombres" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" ></p>
            <p><input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="Ingresa tus apellidos"> </p>
            <p> <input type="number" class="form-control" id="celular" name="celular" placeholder="Ingresa tu numero de celular" > <p>
            <p> <input type="text" class="form-control" id="ci" name="ci"  placeholder="Ingresa tu carnet de identidad"> </p>
            <p> <input type="text" class="form-control" id="ubicacion" name="ubicacion"  placeholder="Ingresa tu ubicacion"> </p>
          </div>

          <div class="tab">Datos como Usuario:
            <p><input type="text" class="form-control" id="user" name="user"  placeholder="Ingresa un nombre de usuario"  pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" required></p>
            <p> <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa una contraseña" required> </p>
            <p> 
              <select class="form-control" id="roles" name="roles" placeholder="Selecciona un item">
                   <option value="" disabled="disabled">Selecciona una opcion</option> 
                  <option value="1">Administrador</option>
                  <option value="2">Usuario</option>
                  <option value="3">Cliente</option>
              </select> 
          </p>
          </div>         
        
          <div style="overflow:auto;">
            <div style="float:right; margin-top: 15px;">
                <button type="button" class="previous">Previous</button>
                <button type="button" class="next">Next</button>
                <button type="button" class="submit">Submit</button>
            </div>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:10px;">
            <span class="step">1</span>
            <span class="step">2</span>
          </div>

      </form>
    </section>
  </div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/multiformulario.js?v2"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
<script src="js/peticionesfetch.js"></script>
<script src="js/mensajesanimados.js">
</script>


<script>

const btn =  document.querySelector('#btn1');
const modal =  document.querySelector('.modal');
const close =   document.querySelector('.close');
const tabla= document.querySelector('#datostabla');

btn.addEventListener('click', function () {
    vaciarFormulario();
    modal.style.display = 'block';    
    activar();   
})

close.addEventListener('click',  ()=> {
    modal.style.display = 'none'
    
})

function llamarformulario(e){
  if( document.querySelector("#user").value.length > 3 &&  document.querySelector("#password").value.length > 7 && Number(document.querySelector("#roles").value) > 0 ){
    e.preventDefault();

    var user= document.querySelector("#user").value.replace(/[^a-zA-Z 0-9.]+/g,' ');
    var psw=document.querySelector("#password").value.replace(/[^a-zA-Z 0-9.]+/g,' ');
    var nombre=document.querySelector("#nombres").value.replace(/[^a-zA-Z 0-9.]+/g,' ');
    var apellido=document.querySelector("#apellidos").value.replace(/[^a-zA-Z 0-9.]+/g,' ');
    var celular=document.querySelector("#celular").value;
    var ci=document.querySelector("#ci").value;
    var ubicacion=document.querySelector("#ubicacion").value.replace(/[^a-zA-Z 0-9.]+/g,' ');
    var rol= Number(document.querySelector("#roles").value);

    var json={
      userP:user,
      pswP:psw,
      nombreP:nombre,
      apellidoP:apellido,
      celularP:celular,
      ciP:ci,
      ubicacionP:ubicacion,
      rolP:rol
    };
    guardarNuevo(json);
    modal.style.display = 'none';


  }else{
  }
}

function guardarNuevo(json){
  
  var enviar= Object.assign({tipoP:'nuevoUsuario'}, json);
  conectarConServidor( enviar ).
    then((e)=>{
        console.log(e);
        if(e.estado=='ok'){            

            mensajeAlerta('Nuevo usuario, Agregado','success');
            recargarTabla();
        }else{
            mensajeAlerta('Fallo al agregar un nuevo usuario. Detalle ->'+e.estado,'error');
        }        
    })
    .catch((e)=>{
        console.log('error en el server');
       mensajeAlerta('Problemas con el servidor. Detalle -> '+e,'error');
    })
}

function recargarTabla(){
  var datosString='';
  conectarConServidor( {tipoP:'obtenerUsuarios'} ).
    then((e)=>{        
        $('#usuarios').dataTable().fnDestroy();
        if(e!=null){
            tabla.innerHTML='';
              e.forEach(element => {
                  datosString += '<tr id="id'+ element.idP+'">'+
                      '<td>'+ element.nombres+' '+element.apellidos+'</td>'+
                      '<td>' + element.nrocelular+ '</td>'+
                      '<td>' +element.ci+'</td>'+
                      '<td >'+element.ubicacion+'</td>'+
                      '<td>'+ element.correo+ '</td>'+
                      '<td> ' +element.idRol+'</td>'+                                    
                      '<td >'+
                          '<span class="icon has-text-info"  onClick="verUsuario('+element.idP+')" >' +
                          '<i class="fas fa-edit"></i>' +
                          '</span>' +
                          '<span class="icon has-text-danger" >' +
                          '<i class="fas fa-trash"></i>' +
                          '</span>' +
                      '</td>'+            
                    ' </tr>';                    
            }); 
            tabla.innerHTML= datosString;                      

        }else{
            mensajeAlerta('No se encontro la informacion requeria. Detalle ->'+e.estado,'question');
        }      

        $('#usuarios').DataTable({
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
       mensajeAlerta('Problemas con el servidor. Detalle -> '+e,'error');
    })

}

function vaciarFormulario(){
  document.querySelector("#user").value='';
  document.querySelector("#password").value='';
  document.querySelector("#nombres").value='';
  document.querySelector("#apellidos").value='';
  document.querySelector("#celular").value='';
  document.querySelector("#ci").value='';
  document.querySelector("#ubicacion").value='';
}

function verUsuario(e){
  console.log(e);
  

}
</script>
<script>

var formula='';
$(document).ready(function(){
     

      var val={
        rules: {
                nombres: "required",
                apellidos: {
                      required: true,                      
                    },
                celular: {
                  required:true,
                  minlength:7,
                  maxlength:15,
                  digits:true
                },
                ci:{                  
                  required:true,
                  minlength:8,
                  maxlength:20,
                 
                },
                ubicacion:{                  
                  required:true,
                  minlength:10,
                  maxlength:50,                  
                },
                user:{                  
                  required:true,
                  minlength:4,
                  maxlength:16,
                },
                password:{
                  required:true,
                  minlength:8,
                  maxlength:10,
                },
                
                roles: { required:true, }
                } ,                 
              messages: {
                    nombres:    "Debe ingresar su nombre ... ",
                    apellidos: {
                      required:   "Debe ingresar su apellido ...",                      
                    },
                    celular:{
                      required:   "Debe ingresar su Nro telefonico",
                      minlength:  "Debe ingresar minimo 7 digitos",
                      maxlength:  "Debe ingresar maximo 15 digitos",
                      digits:   "Solo es permitido numeros"
                    },
                    ci:{
                      required:   "Debe ingresar su CI",
                      minlength:  "Debe ingresar minimo 8 digitos",
                      maxlength:  "Debe ingresar maximo 20 digitos",                      
                    },
                    ubicacion:{
                      required:   "Debe ingresar una pequeña descripcion de su ubicacion Ej (Av Brasil Frente al Surtidor)",
                      minlength:  "Debe ingresar minimo 10 digitos",
                      maxlength:  "Debe ingresar maximo 50 digitos",                      
                    },
                    user:{
                      required:   "Debe de ingresar un nombre de usuario ",
                      minlength:  "Debe ingresar minimo 4 digitos",
                      maxlength:  "Debe ingresar maximo 16 digitos",
                    },
                    password:{
                      required:   "Debe ingresar una contraseña",
                      minlength:  "Debe ingresar minimo 8 digitos",
                      maxlength:  "Debe ingresar maximo 10 digitos",
                    },
                    roles:{
                     
                      required:"Seleccionda un rol para el usuario",
                    }

              }
            }

      formula = $("#formulario").multiStepForm
          (
            {
              defaultStep:0,
              beforeSubmit : function(form, submit){
                console.log('exitos');
              },
              validations:val,
            }
          ).navigateTo(0);      
     recargarTabla();
});

function activar(){
      formula.navigateTo(0);      
}


</script>


