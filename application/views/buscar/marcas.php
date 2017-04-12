<?php
plantilla::inicio();


 ?>
 <div class="row">

     <div class="col-md-2">
         <p class="lead">Buscar por:</p>
         <div class="list-group">
           <a href="<?php echo site_url('web/buscar_tipos')?>" class="list-group-item">Tipo</a>
             <a href="<?php echo site_url('web/buscar_marcas')?>" class="active list-group-item">Marca</a>
             <a href="<?php echo site_url('web/buscar_tamanos')?>" class="list-group-item">Tamaño</a>
             <a href="<?php echo site_url('web/buscar_color')?>" class="list-group-item">Color</a>
             <a href="<?php echo site_url('web/buscar_precios')?>" class="list-group-item">Precio</a>
         </div>
     </div>
