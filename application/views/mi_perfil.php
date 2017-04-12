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
  echo"
  <form class='form' role='form'>
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

   ?>

</div>

   </div>
