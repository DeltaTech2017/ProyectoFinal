<?php
plantilla::inicio();




 ?>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Buscar por:</p>
         <div class="list-group">
           <a href="<?php echo site_url('web/buscar_tipos')?>" class=" list-group-item">Tipos</a>
             <a href="<?php echo site_url('web/buscar_marcas')?>" class="active list-group-item">Marcas</a>
             <a href="<?php echo site_url('web/buscar_tamanos')?>" class="list-group-item">Tamaño de Aro</a>
             <a href="<?php echo site_url('web/buscar_tamanosc')?>" class="list-group-item">Tamaño de Cuadro</a>
             <a href="<?php echo site_url('web/buscar_color')?>" class="list-group-item">Color</a>
             <a href="<?php echo site_url('web/buscar_precios')?>" class="list-group-item">Precio</a>
         </div>
     </div>

     <div class="col-md-10">

         <div class="row">

<form role="form" method="post" action="">

<br /><br />
           <div class="form-group">
             <label for="">Seleccione la Marca de bicicleta que desea buscar</label>
             <select required class="form-control" name="marca" id="marca">
               <option></option>
               <option>BH</option>
               <option>Bianchi</option>
               <option>BMC</option>
               <option>Cannondale</option>
               <option>Carolina</option>
               <option>Cervelo</option>
               <option>Colnago</option>
               <option>Cube</option>
               <option>Cyfac</option>
               <option>Diamondback</option>
               <option>Eagle</option>
               <option>Ellsworth</option>
               <option>Felt</option>
               <option>Fuji</option>
               <option>Gary Fisher</option>
               <option>Giant</option>
               <option>GT</option>
               <option>Hasa</option>
               <option>Hoffman</option>
               <option>Huffy</option>
               <option>Hussar</option>
               <option>Iron Horse</option>
               <option>Jamis</option>
               <option>Julen</option>
               <option>Klein</option>
               <option>Kona</option>
               <option>KTM</option>
               <option>Lapierre</option>
               <option>LeMond</option>
               <option>Litespeed</option>
               <option>Look</option>
               <option>Marin</option>
               <option>Merida</option>
               <option>Mongoose</option>
               <option>Montecci</option>
               <option>Motobecane</option>
               <option>Niner</option>
               <option>Peugeot</option>
               <option>Pilot</option>
               <option>Pinarello</option>
               <option>Raleigh</option>
               <option>Ridley</option>
               <option>Salsa</option>
               <option>Santa Cruz</option>
               <option>Scapin</option>
               <option>Schwinn</option>
               <option>Scott</option>
               <option>Specialized</option>
               <option>Trek</option>
               <option>Wilier</option>
               <option>Yeti</option>
               <option>Otra</option>


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
     $productos=buscar_marca();
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
                  <img src='/fotos/{$img}.jpg'  style='height:250px'alt=''>
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


   }}


     ?>


   </div>
