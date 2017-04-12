<?php
session_start();
$CI=& get_instance();
$codigo=0;

function buscar_producto(){
  $color=$_POST['anuncio'];
  $CI=& get_instance();
  $sql="select *from productos where nombre='{$color}'";
  $rs=$CI->db->query($sql);
return $rs->result();
}



function cargar_productos(){
  $CI=& get_instance();
  if(!empty($_POST['ordenar'])){
    if($_POST['ordenar']=='Fecha de publicacion <'){
    $sql="select * from productos order by id asc ";

    }else if($_POST['ordenar']=='Fecha de publicacion >'){
    $sql="select * from productos order by id desc ";

    }else if($_POST['ordenar']=='Precio <'){
    $sql="select * from productos order by precio asc ";}

    else if($_POST['ordenar']=='Precio >'){
    $sql="select * from productos order by precio desc ";}
  }

else{

  $sql="select * from productos order by id desc ";
}



$rs =$CI->db->query($sql);
return $rs->result();


}





function cargar_items(){
  $users=$_SESSION['user'];
  $CI=& get_instance();
  $sql="select * from productos where usuario={$users->id}";
$rs =$CI->db->query($sql);
return $rs->result();}



function cargar_todos(){


    $CI=& get_instance();
    if(!empty($_POST['ordenara'])){
      if($_POST['ordenara']=='ID Ascendente'){
      $sql="select * from productos order by id asc ";

    }else if($_POST['ordenara']=='ID Descendente'){
      $sql="select * from productos order by id desc ";

    }}

  else{

    $sql="select * from productos order by id asc ";

}
$rs =$CI->db->query($sql);
return $rs->result();




}


function cargar_todos_users(){

  $CI=& get_instance();
  $sql="select * from usuarios";
$rs =$CI->db->query($sql);
return $rs->result();}

function cargar_todos_comentarios(){

  $CI=& get_instance();
  $sql="select * from comentarios";
$rs =$CI->db->query($sql);
return $rs->result();}

function cargar_pornombre(){
  $nombre=$_POST['anuncio'];
  $CI=& get_instance();
  $sql="select * from productos where nombre like '%{$nombre}%'";
$rs =$CI->db->query($sql);
return $rs->result();}

function buscar_tipo(){
  $tipo=$_POST['tipo'];
  $CI=& get_instance();
  $sql="select *from productos where tipo='{$tipo}'";
  $rs=$CI->db->query($sql);
return $rs->result();
}


function buscar_tamano(){
  $tipo=$_POST['tamanoAro'];
  $CI=& get_instance();
  $sql="select *from productos where tamanoAro='{$tipo}'";
  $rs=$CI->db->query($sql);
return $rs->result();
}


function buscar_tamanoc(){
  $tipo=$_POST['tamanoCuadro'];
  $CI=& get_instance();
  $sql="select *from productos where tamanoCuadro='{$tipo}'";
  $rs=$CI->db->query($sql);
return $rs->result();
}

function buscar_color(){
  $color=$_POST['color'];
  $CI=& get_instance();
  $sql="select *from productos where color='{$color}'";
  $rs=$CI->db->query($sql);
return $rs->result();
}



function buscar_marca(){
  $marca=$_POST['marca'];
  $CI=& get_instance();
  $sql="select *from productos where marca='{$marca}'";
  $rs=$CI->db->query($sql);
return $rs->result();
}

function buscar_precio(){
  $CI=& get_instance();
  $precio1=$_POST['precio1'];
  $precio2=$_POST['precio2'];

if (empty($_POST['precio2'])) {
  $precio2=999999999;
  $sql="select *from productos where precio between {$precio1} and {$precio2}";
  $rs=$CI->db->query($sql);
}


else{
  $sql="select *from productos where precio between {$precio1} and {$precio2}";
  $rs=$CI->db->query($sql);
return $rs->result();}
}




class plantilla{
  static $instancia;


  static function inicio(){
    self::$instancia=new plantilla();

  }



  function __construct(){

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta property="og:url"           content="http://deltabikes.000webhostapp.com/index.php/web" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Delta Bikes" />
        <meta property="og:description"   content="Pagina de Bicicletas" />
        <meta property="og:image"         content="https://deltabikes.000webhostapp.com/fotos/logo.jpg" />

        <script>

        FB.ui({
  method: 'share',
  href: 'https://developers.facebook.com/docs/',
}, function(response){});
        </script>

      <title>Delta Bikes</title>
      <link href="<?php echo base_url('base')  ?>/logo.png" rel="icon" />

      <!-- Bootstrap Core CSS -->
      <link href="<?php echo base_url('base')  ?>/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="<?php echo base_url('base')  ?>/css/shop-homepage.css" rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

  </head>

  <body>

      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

          <div class="container">

              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <img class="navbar-brand" src="<?php echo base_url('base')?>/logo.png">
                  <a class="navbar-brand" href="<?php echo base_url('')?>">Delta Bikes</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">

                      <li class="mi_cuenta">
                          <a href="<?php echo site_url('web/mi_cuenta')?>">Mi Cuenta</a>
                      </li>
                      <li class="nosotros">
                          <a href="<?php echo site_url('web/nosotros')?>">Nosotros</a>
                      </li>
                    </ul>

                  <form class="navbar-form navbar-right" method="post">
                    <input class="form-control mr-sm-2" type="text" name="anuncio" placeholder="Buscar Anuncio">
                    <a ><button type="submit">Buscar</button></a>
                  </form>

              </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
      </nav>

      <!-- Page Content -->
      <div class="container">



  <?php
  }

  function __destruct(){

    ?>

<div class="container">

      <hr>

      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; Delta Tech 2017</p>
              </div>
          </div>
      </footer>

  </div>
  <!-- /.container -->

  <!-- jQuery -->
  <script src=<?php echo base_url('base')  ?>/"js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src=<?php echo base_url('base')  ?>/"js/bootstrap.min.js"></script>

</body>

</html>
    <?php
  }

}

function cargar_imagenes(){
  $CI=& get_instance();
  $sql="select*from imagenes";
$rs =$CI->db->query($sql);
return $rs->result();

}
