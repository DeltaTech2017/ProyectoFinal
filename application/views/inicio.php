<?php

plantilla::inicio();

$CI=& get_instance();





 ?>


         <div class="row">

             <div class="col-md-2">
                 <p class="lead">Buscar por:</p>
                 <div class="list-group">
                   <a href="<?php echo site_url('web/buscar_tipos')?>" class="list-group-item">Tipo</a>
                     <a href="<?php echo site_url('web/buscar_marcas')?>" class="list-group-item">Marca</a>
                     <a href="<?php echo site_url('web/buscar_tamanos')?>" class="list-group-item">Tamaño</a>
                     <a href="<?php echo site_url('web/buscar_color')?>" class="list-group-item">Color</a>
                     <a href="<?php echo site_url('web/buscar_precios')?>" class="list-group-item">Precio</a>
                 </div>
             </div>

             <div class="col-md-10">

                 <div class="row">
                   <?php
                   $productos=cargar_productos();
                  $items=0;

                    foreach ($productos as $producto) {

                      $CI=& get_instance();
                      $sql="select * from comentarios where idProducto = $producto->id ";
                      $rs=$CI->db->query($sql);
                      $rs= $rs->result();
                      $cantidad=count($rs);


                      echo"
                      <div class='col-sm-4 col-lg-6 col-md-4'>
                          <div class='thumbnail'>
                              <img width='32' height='32'src='/tienda/base/logo.png' />
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

}
                    ?>


                 </div>

             </div>

         </div>

     </div>
     <!-- /.container -->


</div>


    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->
