<?php
plantilla::inicio();




 ?>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Buscar por:</p>
         <div class="list-group">
           <a href="<?php echo site_url('web/buscar_tipos')?>" class=" list-group-item">Tipos</a>
             <a href="<?php echo site_url('web/buscar_marcas')?>" class=" list-group-item">Marcas</a>
             <a href="<?php echo site_url('web/buscar_tamanos')?>" class="list-group-item">Tamaño de Aro</a>
             <a href="<?php echo site_url('web/buscar_tamanosc')?>" class="list-group-item">Tamaño de Cuadro</a>
             <a href="<?php echo site_url('web/buscar_color')?>" class="list-group-item">Color</a>
             <a href="<?php echo site_url('web/buscar_precios')?>" class=" active list-group-item">Precio</a>
         </div>
     </div>

     <div class="col-md-10">

         <div class="row">

<form role="form" method="post" action="">

<br /><br />
           <div class="form-group">
             <label for="">Indique el rango de precio que desea buscar</label>

           </div>
           <div class="form-group">
             <input type="number" required placeholder="Desde" name="precio1"/>
             <input type="number"required placeholder="Hasta" name="precio2"/>
           </div>

           <center>
             <button type="submit" class="btn btn-success">Buscar</button>
           </center>
</form>

     </div>
     <br />
   </div>

   <div class="col-md-10">
     <?php

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
                    <img src='/fotos/{$img}.jpg' style='height:250px' alt=''>
                    <div class='caption'>
                        <h4 class='pull-right'>RD$ {$producto->precio}</h4>
                        <h4><a href='index.php/web/ver_anuncio?codigo={$producto->id}'>{$producto->nombre}</a>
                        </h4>
                        <p>{$producto->descripcion} </p>
                    </div>


                    </div>
                    </div>
            ";

       }
     }


     }else{
     if($_POST){
       if ($_POST['precio1']>$_POST['precio2']) {
         echo"
                <div style='color:red'>

                  El primer numero no puede ser mayor que el segundo!
                </div>
                ";
       }else{
     $productos=buscar_precio();
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
                  <img src='/fotos/{$img}.jpg' style='height:250px' alt=''>
                  <div class='caption'>
                      <h4 class='pull-right'>RD$ {$producto->precio}</h4>
                      <h4><a href='index.php/web/ver_anuncio?codigo={$producto->id}'>{$producto->nombre}</a>
                      </h4>
                      <p>{$producto->descripcion} </p>
                  </div>


                  </div>
                  </div>
          ";
        }
     }

}
     }}


     ?>


   </div>
