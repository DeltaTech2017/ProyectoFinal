<?php plantilla::inicio(); ?>
<?php
  if(!isset($_SESSION['user'])){
    redirect('web/login');
  }
 ?>




 <div class="text-right">
   <h4>Bienvenido <?php echo "" ?></h4>
 <a class="btn btn-danger" href="<?php echo site_url('web/salir')?>">Salir</a>

 </div>

 <div class="row">

     <div class="col-md-3">
         <p class="lead">Panel de control</p>
         <div class="list-group">
             <a href="<?php echo site_url('web/publicar_anuncio')?>" class=" active list-group-item list-group-item-info">Publicar Anuncio</a>
             <a href="#" class="list-group-item list-group-item-info">Mis Anuncios</a>
             <a href="#" class="list-group-item list-group-item-info">Category 3</a>
         </div>
     </div>
   </div>
