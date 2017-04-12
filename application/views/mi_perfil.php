<?php plantilla::inicio(); ?>
<?php
  if(!isset($_SESSION['user'])){
    redirect('web/login');
  }


  $CI=& get_instance();
  $usuario=$_SESSION['user'];
 ?>



 <div class="text-right">
   <h4>Bienvenido <?php echo "{$usuario->nombre}" ?></h4>
   <a class="btn btn-info" href="<?php echo site_url('web/editar_perfil')?>">Editar Perfil</a>
 <a class="btn btn-danger" href="<?php echo site_url('web/salir')?>">Salir</a>


 </div>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Panel de control</p>
         <div class="list-group">
             <a href="<?php echo site_url('web/publicar_anuncio')?>" class=" list-group-item list-group-item-info">Publicar Anuncio</a>
             <a href="<?php echo site_url('web/mi_cuenta')?>" class="list-group-item list-group-item-info">Mis Anuncios</a>
             <a href="<?php echo site_url('web/mi_perfil')?>" class="active list-group-item list-group-item-info">Mi Perfil</a>
         </div>
     </div>

<div class="col-md-4">

  <?php
  $productos=cargar_items();
   foreach ($productos as $producto) {

     $sql2="select * from imagenes where idProducto = $usuario->id ";
     $rs2=$CI->db->query($sql2);
     $rs2= $rs2->result();
     $imagen=array();

     if (count($rs2)>0){
       $imagen=$rs2[0];
       $img=$imagen->id;
     }else{
       $img="persona";

     }
}


  echo"
  <form class='form' method='post' role='form'>
<div class='form-group'>
<img width='150' id='foto' height='150'src='/fotos/{$img}.jpg' />

</div>

<div class='form-group'>
<label class='control-label'>Nombre de Usuario</label>
<p class='form-control-static'>{$usuario->nombre}</p>
</div>


<div class='form-group'>
<label class='control-label'>Correo Electronico</label>
<p class='form-control-static'>{$usuario->correo}</p>
</div>

<div class='form-group'>
<label class='control-label'>Provincia de Residencia</label>
<p class='form-control-static'>{$usuario->provincia}</p>
</div>

<div class='form-group'>
<label class='control-label'>Telefono</label>
<p class='form-control-static'>{$usuario->telefono}</p>
</div>


</form>


  ";


  if(isset($_POST['anuncio'])){
    $productos=cargar_pornombre();

    if(count($productos)==0){

  echo"
      <div style='color:red'>

        No se encontraron productos!
      </div>
      ";
    }else{


      foreach ($productos as $producto) {

        $sql2="select * from imagenes where idProducto = $producto->id ";
        $CI =& get_instance();
        $rs2=$CI->db->query($sql2);
        $rs2= $rs2->result();
        $imagen=array();

        if (count($rs2)>0){
          $imagen=$rs2[0];
          $img=$imagen->id;
        }else{
          $img="logo";

        }


         echo"

         <div class='col-sm-4 col-lg-4 col-md-4'>
             <div class='thumbnail'>
                 <img src='/fotos/{$img}.jpg'style='height:250px' alt=''>
                 <div class='caption'>
                     <h4 class='pull-right'>RD$ {$producto->precio}</h4>
                     <h4><a href='<?php echo site_url('web/ver_anuncio')?>{$producto->nombre}</a>
                     </h4>
                     <p>{$producto->descripcion} </p>
                 </div>


                 </div>
                 </div>
         ";

    }
  }


  }
   ?>

</div>

   </div>
