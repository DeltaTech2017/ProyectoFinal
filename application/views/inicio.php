<?php

plantilla::inicio();

$CI=& get_instance();





 ?>


 <script>
 $(document).ready(function(){

  function load_country_data(page)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>ajax_pagination/pagination/"+page,
    method:"GET",
    dataType:"json",
    success:function(data)
    {
     $('#country_table').html(data.country_table);
     $('#pagination_link').html(data.pagination_link);
    }
   });
  }

  load_country_data(1);

  $(document).on("click", ".pagination li a", function(event){
   event.preventDefault();
   var page = $(this).data("ci-pagination-page");
   load_country_data(page);
  });

 });
 </script>



         <div class="row">

             <div class="col-md-2">
                 <p class="lead">Buscar por:</p>
                 <div class="list-group">
                   <a href="<?php echo site_url('web/buscar_tipos')?>" class="list-group-item">Tipo</a>
                     <a href="<?php echo site_url('web/buscar_marcas')?>" class="list-group-item">Marca</a>
                     <a href="<?php echo site_url('web/buscar_tamanos')?>" class="list-group-item">Tamaño de Aro</a>
                     <a href="<?php echo site_url('web/buscar_tamanosc')?>" class="list-group-item">Tamaño de Cuadro</a>
                     <a href="<?php echo site_url('web/buscar_color')?>" class="list-group-item">Color</a>
                     <a href="<?php echo site_url('web/buscar_precios')?>" class="list-group-item">Precio</a>

                 </div>
                 <a target="_blank" ><img src="/fotos/banner2.gif"</a>
             </div>

             <div class="col-sm-8">
<div class="row text-right">
  <form method="post">
    <select onchange="this.form.submit()" name="ordenar">
      <Option>Ordenar por</Option>
      <Option>Fecha de publicacion <</Option>
      <Option>Fecha de publicacion ></Option>
      <Option>Precio <</Option>
      <Option>Precio ></Option>
    </select>
  </form>
  <br />
</div>

<style>
.clase{
width:250;
height:300;
}

</style>

                 <div class="row">
                   <br />
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

                          <div class='col-sm-6 col-lg-6 col-md-6'>
                              <div class='thumbnail'>
                                  <img class='responsive' src='/fotos/{$img}.jpg' style='height:250px' alt=''>
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

                   $productos=cargar_productos();
                  $items=0;

                    foreach ($productos as $producto) {

                      $CI=& get_instance();
                      $sql="select * from comentarios where idProducto = $producto->id ";
                      $rs=$CI->db->query($sql);
                      $rs= $rs->result();
                      $cantidad=count($rs);

                      $sql2="select * from imagenes where idProducto = $producto->id ";
                      $rs2=$CI->db->query($sql2);
                      $rs2= $rs2->result();

                      if (count($rs2)>0){
                        $imagen=$rs2[0];
                        $img=$imagen->id;
                      }else{
                        $img="logo2";

                      }






                      echo"
                      <div class='col-sm-6 col-lg-6 col-md-6 id=''>
                          <div class='thumbnail clase'>
                              <img  class='img-responsive ' src='fotos/{$img}.jpg' style='height:250px'/>
                              <div class='caption'>
                                  <h4 class='pull-right'>RD$ {$producto->precio}</h4>
                                  <p>
                                  <h4><a href='index.php/web/ver_anuncio?codigo={$producto->id}'>{$producto->nombre}</a>
                                  </h4>
                                  </p>

                                  <p>{$producto->descripcion} </p>
                                  <div class='ratings'>
                                      <p class='pull-right'>{$cantidad} comentarios</p>
                                      </div>
                              </div>


                                  </p>
                              </div>
                              </div>";
                              $items++;

}}
                    ?>


                 </div>

             </div>

             <div class="col-md-1" align="right">

            <a target="_blank" href="http://eventos.tuboleta.com.do/"><img src="/fotos/banner1.gif"</a>
             </div>

         </div>

     </div>
     <!-- /.container -->


</div>


    <hr>

    <!-- Pagination -->
    <div class="row text-center">



        <a target="_blank" href="http://www.cam.ac.uk/"><img src="/fotos/banner3.gif"</a>

    </div>
    <!-- /.row -->
