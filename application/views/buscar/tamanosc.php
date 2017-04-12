<?php
plantilla::inicio();




 ?>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Buscar por:</p>
         <div class="list-group">
           <a href="<?php echo site_url('web/buscar_tipos')?>" class=" list-group-item">Tipo</a>
             <a href="<?php echo site_url('web/buscar_marcas')?>" class="list-group-item">Marca</a>
             <a href="<?php echo site_url('web/buscar_tamanos')?>" class="list-group-item">Tamaño de Aro</a>
             <a href="<?php echo site_url('web/buscar_tamanosc')?>" class="active  list-group-item">Tamaño de Cuadro</a>
             <a href="<?php echo site_url('web/buscar_color')?>" class="list-group-item">Color</a>
             <a href="<?php echo site_url('web/buscar_precios')?>" class="list-group-item">Precio</a>
         </div>
     </div>

     <div class="col-md-10">

         <div class="row">

<form role="form" method="post" action="">

<br /><br />
           <div class="form-group">
             <label for="">Seleccione el Tamaño de Cuadro que desea buscar</label>
             <select required class="form-control" name="tamanoCuadro" id="tamanoCuadro">
               <option></option>
               <option>Desconocido</option>
               <option>Niños</option>
               <option>XS</option>
               <option>S</option>
               <option>M</option>
               <option>L</option>
               <option>XL</option>
               <option>XXL</option>
         </select>
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
                    <img src='/fotos/{$img}.jpg' style='height:250px'alt=''>
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
     $productos=buscar_tamanoc();
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
   }


     ?>


   </div>
