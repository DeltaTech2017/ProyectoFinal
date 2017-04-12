<?php
plantilla::inicio();



if($_POST){
$tipo="";
  $CI=& get_instance();
  $tipo=$_POST['tipo'];
  function buscar_tipo(){

    $CI=& get_instance();
    $sql="select * from productos where tipo='{$tipo}'";
  $rs =$CI->db->query($sql);
  return $rs->result();
  }


  cargar();



   }




 ?>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Buscar por:</p>
         <div class="list-group">
           <a href="<?php echo site_url('web/buscar_tipos')?>" class="active list-group-item">Tipos</a>
             <a href="<?php echo site_url('web/buscar_marcas')?>" class="list-group-item">Marcas</a>
             <a href="<?php echo site_url('web/buscar_tamanos')?>" class="list-group-item">Tamaño</a>
             <a href="<?php echo site_url('web/buscar_color')?>" class="list-group-item">Color</a>
             <a href="<?php echo site_url('web/buscar_precios')?>" class="list-group-item">Precio</a>
         </div>
     </div>

     <div class="col-md-10">

         <div class="row">

<form role="form"method="post" action="">

<br /><br />
           <div class="form-group">
             <label for="">Seleccione el Tipo de bicicleta que desea buscar</label>
             <select required class="form-control"  name="tipo"id="tipo">
           <option></option>
           <option>Chopper</option>
           <option>Estacionaria</option>
           <option>Mountain Bike (MTB)</option>
           <option>Mujeres</option>
           <option>Niños</option>
           <option>Recumbente</option>
           <option>Ruta</option>
           <option>Urbana</option>

         </select>
           </div>

           <center>
             <button type="submit" class="btn btn-success">Buscar</button>
           </center>
</form>





      <?php
      function cargar(){

      $productos=buscar_tipo();
       foreach ($productos as $producto) {

         echo"

         <div class='col-sm-4 col-lg-4 col-md-4'>
             <div class='thumbnail'>
                 <img src='http://placehold.it/320x150' alt=''>
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
       ?>
     </div>
   </div>
