<?php
 if(!isset($_SESSION['admin'])){
  redirect('web/loginadmin');
  }
  $CI=& get_instance();
  $usuario=$_SESSION['admin'];
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
                <a class="navbar-brand" href="<?php echo site_url('web/admin')?>">Administrador</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">



                  </ul>



            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">


      <div class="text-right">
        <h4>Bienvenido <?php echo "{$usuario->nombre}          " ?><a class="btn btn-danger" href="<?php echo base_url('index.php/web/salir')?>">Salir</a></h4>

<br />
      <div class="row text-right">
        <form method="post">
          <select onchange="this.form.submit()" name="ordenara">
            <Option>Ordenar por</Option>
            <Option>ID Ascendente</Option>
            <Option>ID Descendente </Option>

          </select>
        </form>
        <br />
      </div>



      </div>

      <div class="row">

          <div class="col-md-2">
              <p class="lead">Panel de control</p>
              <div class="list-group">
                  <a href="<?php echo site_url('web/admin')?>" class="active list-group-item list-group-item-info">Anuncios</a>
                  <a href="<?php echo site_url('web/admin_usuarios')?>" class=" list-group-item list-group-item-info">Usuarios</a>
                  <a href="<?php echo site_url('web/admin_comentarios')?>" class="list-group-item list-group-item-info">Comentarios</a>


              </div>
          </div>

          <div class="col-md-10">

              <div class="row">

                <table  class="table table-striped table-bordered">

                 <thead class="thead-inverse" style="background-color:lightblue">
                 <tr>

                     <th>ID</th>
                     <th>Foto</th>
                     <th>Titulo</th>
                     <th>Precio</th>
                     <th>
                       ID Usuario
                     </th>
                     <th>
                       Cant. comentarios
                     </th>
                     <th>
                       Fecha
                     </th>
                     <th>Accion</th>
                   </tr>
                 </thead>



               <tbody>


                <?php


                $productos=cargar_todos();
                 foreach ($productos as $producto) {

                   $sql2="select * from imagenes where idProducto = $producto->id ";
                   $rs2=$CI->db->query($sql2);
                   $rs2= $rs2->result();
                   $imagen=array();

                   if (count($rs2)>0){
                     $imagen=$rs2[0];
                     $img=$imagen->id;
                   }else{
                     $img="logo";

                   }

                   $anuncios=$CI->db->query("select * from comentarios where idProducto=$producto->id");
                   $anuncios=$anuncios->result();
                   $cantanuncios=count($anuncios);

                   echo"
                   <tr>

                   <td>$producto->id</td>
                   <td>
                   <center>
                   <img width='80' height='64'src='/fotos/{$img}.jpg' />
                   </center>

                   </td>
                   <td>$producto->nombre</td>
                   <td>RD$ $producto->precio</td>
                   <td> $producto->usuario</td>
                   <td>
                   $cantanuncios
                   </td>
                   <td> $producto->fecha</td>
                   <td><center>
                   <a href='admin?p=$producto->id'><img width='32' height='32' src='/base/eliminar.png' /></a>
                   </center></td>

                   </tr>




                   ";
                 }
                 if(isset($_GET['p'])){

                   eliminar();

                 }

                function eliminar(){
                echo($strconfirm ="<script>javascript:confirm('Desea eliminar este anuncio?');</script>");

                       if ($strconfirm == true)
                       {
                         $p=$_GET['p'];
                         $CI=& get_instance();

                         $sql3="delete from productos where id = $p";
                         $rs3=$CI->db->query($sql3);
                        $sql5="delete from comentarios where idProducto = $p";
                         $rs5=$CI->db->query($sql5);
                         $sql5="delete from imagenes where idProducto = $p";
                          $rs5=$CI->db->query($sql5);

                         echo("<script>javascript:alert('Usuario eleminado');</script>");
                         redirect('web/admin');
                       }else{
                         redirect('web/admin');
                       }
}
