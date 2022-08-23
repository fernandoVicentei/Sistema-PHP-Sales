
<?php
 $ruta=isset($_GET['m'])?$_GET['m']:'';
?>

<!DOCTYPE html>

<!-- Created By CodingNepal -->

<html lang="en" dir="ltr">

   <head>
      <meta charset="utf-8">

      <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

      <title>Sidebar Menu with sub-menu | CodingNepal</title>      
      
      <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
      <script  src="js/jquery-3.4.1.min.js"> </script>
      <link rel="stylesheet" href="css/bulma.min.css">
      <link rel="stylesheet" href="css/material-design-iconic-font.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style> 
          @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
            *{
            margin: 0;
            padding: 0;
            user-select: none;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            }
            .btnC{
            position: fixed;
            top: 0px;
            left: 0px;
            height: 45px;
            width: 45px;
            text-align: center;
            background: #1b1b1b;
            border-radius: 3px;
            cursor: pointer;
            transition: left 0.4s ease;
            z-index: 3;
            }
            .btnC.click{
            left: 260px;
            }
            .btnC span{
            color: white;
            font-size: 28px;
            line-height: 45px;
            }
            .btnC.click span:before{
            content: '\f00d';
            }
            .sidebarM{
            position: fixed;
            width: 250px;
            height: 100%;
            left: -250px;
            background: #1b1b1b;
            transition: left 0.4s ease;
            z-index: 3;
            }
            .sidebarM.show{
            left: 0px;
            }
            .sidebarM .text{
            color: white;
            font-size: 25px;
            font-weight: 600;
            line-height: 65px;
            text-align: center;
            background: #1e1e1e;
            letter-spacing: 1px;
            }
            nav ul{
            background: #1b1b1b;
            height: 100%;
            width: 100%;
            list-style: none;
            }
            nav ul li{
            line-height: 60px;
            border-top: 1px solid rgba(255,255,255,0.1);
            }
            nav ul li:last-child{
            border-bottom: 1px solid rgba(255,255,255,0.05);
            }
            nav ul li a{
            position: relative;
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding-left: 40px;
            font-weight: 500;
            display: block;
            width: 100%;
            border-left: 3px solid transparent;
            }
            nav ul li.active a{
            color: black;
            
            border-left-color: black;
            background-color:white;
            }
            nav ul li a:hover{
            background: #1e1e1e;
            }
            nav ul ul{
            position: static;
            display: none;
            }
            nav ul .feat-show.show{
            display: block;
            }
            nav ul .serv-show.show1{
            display: block;
            }
            nav ul ul li{
            line-height: 42px;
            border-top: none;
            }
            nav ul ul li a{
            font-size: 17px;
            color: #e6e6e6;
            padding-left: 80px;
            }
            nav ul li.active ul li a{
            color: #e6e6e6;
            background: #1b1b1b;
            border-left-color: transparent;
            }
            nav ul ul li a:hover{
            color: blue!important;
            background: #1e1e1e!important;
            }
            nav ul li a span{
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 22px;
            transition: transform 0.4s;
            }
            nav ul li a span.rotate{
            transform: translateY(-50%) rotate(-180deg);
            }
           /*  .content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: #202020;
            z-index: -1;
            text-align: center;
            }
            .content .header{
            font-size: 45px;
            font-weight: 600;
            }
            .content p{
            font-size: 30px;
            font-weight: 500;
            } */
            .paddingArriba{
               padding-top: 40px;
            }
            .text-titulo{
               font-size: 30px;
               text-align: center!important;
            }
            .text-subtitulo{
               font-size:20px;
               margin:20px 0px;
            }
            .derecha{
               float:right;
            }

            .paddinglados{
               padding: 5px 10px 10px 5px;
            }
            .marginArribaAbajo{
               margin:20px;
            }
            .tamaño128{
               width:128px;
               height:128px;
            }
            .contenido-image{
               padding: 5px;             
            }            
            .boxshadow{
               box-shadow: 10px 12px 15px -4px rgba(0,0,0,0.20);
               -webkit-box-shadow: 10px 12px 15px -4px rgba(0,0,0,0.20);
               -moz-box-shadow: 10px 12px 15px -4px rgba(0,0,0,0.20)
            }
            .borderRadius{
               border-radius:20px;
            }
            .marginArriba{
               margin-top:20px;
            }
            .contentCarrusel{
               width:95%;
               height:300px;
            }
            #textovista{
               border:1px solid black;
            }
            .imagen{
               width:300px;
               height:300px;   
               margin:auto;
            }
            .borderTop{
               width:100%;
               height:40px;
               background-color:rgba(77, 107, 114, 1);
               border-radius:20px 20px 0px 0px;
               margin-bottom:20px;
            }
            .fijo{
               position: fixed;
               width:100%;
               z-index: 2;
            }
            .bordes{
               border-top-width:1;
               border-right-width:0;
               border-left-width:0;
               border-color:#bbbbbb;
               border-style:solid;
            }
            .limpiar{
               clear:both;
            }
           
            .ulmenu {
               padding-left: 0rem;
            }
            .delete{
               background-color:red;
               color:white;
            }
            @media (min-width: 768px){
               .container, .container-md, .container-sm {
               max-width: 95%;
                }

            }
            
           

      </style>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>

   <body>

      <div class="btnC">
         <span class="fas fa-bars"></span>
      </div>

      <nav class="sidebarM">
         <div class="text">
            YO
         </div>
         <ul  class="ulmenu">            
            <li class="<?php  echo $ruta=='su' || $ruta==''?'active':''; ?> ">
               <a href="./admin.php?m=su" >  <i class="zmdi zmdi-account "></i> Usuarios
               <!-- <span class="fas fa-caret-down first"></span> -->
               </a>
            </li>
            <li  class="<?php  echo $ruta=='prds'?'active':''; ?> " ><a href="./admin.php?m=prds"><i class="zmdi zmdi-store"></i>
               Productos</a></li>
            <li  class="<?php  echo $ruta=='pers'?'active':''; ?> " ><a href="./admin.php?m=pers"><i class="zmdi zmdi-edit"></i>
               Personalizacion</a></li>
            <li  class="<?php  echo $ruta=='vents'?'active':''; ?> " ><a href="./admin.php?m=vents"><i class="zmdi zmdi-shopping-cart"></i>
                              Ventas y Pedidos</a></li>
            <li  class="<?php  echo $ruta=='peers'?'active':''; ?> " ><a href="./admin.php?m=peers"><i class="zmdi zmdi-widgets"></i>
               Personalizar QR</a></li>
            <li   ><a href="index.html"> <i class="zmdi zmdi-flag"></i>
               Ver Pagina </a></li>
         </ul>
      </nav>

     <div class="container-full">
        <div class="container-full">
           <div class="container-full has-background-dark fijo">
               <h1 class="has-text-white text-titulo">ADMINISTRACION</h1>
           </div>              
            <div class="container-full paddingArriba ">
               <div class="container-full paddinglados">
                  <?php                       
                        if($ruta=='su'){                           
                           require_once 'users.php';
                        }else if($ruta=='prds'){
                           require_once 'productos.php';
                        }else if($ruta=='pers'){
                           require_once 'personalice.php';
                        }else if($ruta=='vents'){
                           require_once 'vents.php';
                        }else if($ruta=='peers'){
                           require_once 'pagos.php';
                        }else{
                           $ruta=='su';
                           require_once 'users.php';
                        }
                  ?>
               </div>
            </div>
        </div>       
     </div>

      <script>
         $('.btnC').click(function(){
           $(this).toggleClass("click");
           $('.sidebarM').toggleClass("show");
         });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn').click(function(){
             $('nav ul .serv-show').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>
   </body>
</html>
