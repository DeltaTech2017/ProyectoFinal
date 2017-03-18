<?php

plantilla::inicio();
 ?>


         <div class="row">

             <div class="col-md-3">
                 <p class="lead">Shop Name</p>
                 <div class="list-group">
                     <a href="#" class="list-group-item">Category 1</a>
                     <a href="#" class="list-group-item">Category 2</a>
                     <a href="#" class="list-group-item">Category 3</a>
                 </div>
             </div>

             <div class="col-md-9">

                 

                 <div class="row">

                     <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail">
                             <img src="http://placehold.it/320x150" alt="">
                             <div class="caption">
                                 <h4 class="pull-right">$24.99</h4>
                                 <h4><a href="#">First Product</a>
                                 </h4>
                                 <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                             </div>
                             <div class="ratings">
                                 <p class="pull-right">15 reviews</p>
                                 <p>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                 </p>
                             </div>
                         </div>
                     </div>

                     <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail">
                             <img src="http://placehold.it/320x150" alt="">
                             <div class="caption">
                                 <h4 class="pull-right">$64.99</h4>
                                 <h4><a href="#">Second Product</a>
                                 </h4>
                                 <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                             </div>
                             <div class="ratings">
                                 <p class="pull-right">12 reviews</p>
                                 <p>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star-empty"></span>
                                 </p>
                             </div>
                         </div>
                     </div>

                     <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail">
                             <img src="http://placehold.it/320x150" alt="">
                             <div class="caption">
                                 <h4 class="pull-right">$74.99</h4>
                                 <h4><a href="#">Third Product</a>
                                 </h4>
                                 <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                             </div>
                             <div class="ratings">
                                 <p class="pull-right">31 reviews</p>
                                 <p>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star-empty"></span>
                                 </p>
                             </div>
                         </div>
                     </div>

                     <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail">
                             <img src="http://placehold.it/320x150" alt="">
                             <div class="caption">
                                 <h4 class="pull-right">$84.99</h4>
                                 <h4><a href="#">Fourth Product</a>
                                 </h4>
                                 <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                             </div>
                             <div class="ratings">
                                 <p class="pull-right">6 reviews</p>
                                 <p>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star-empty"></span>
                                     <span class="glyphicon glyphicon-star-empty"></span>
                                 </p>
                             </div>
                         </div>
                     </div>

                     <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail">
                             <img src="http://placehold.it/320x150" alt="">
                             <div class="caption">
                                 <h4 class="pull-right">$94.99</h4>
                                 <h4><a href="#">Fifth Product</a>
                                 </h4>
                                 <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                             </div>
                             <div class="ratings">
                                 <p class="pull-right">18 reviews</p>
                                 <p>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star"></span>
                                     <span class="glyphicon glyphicon-star-empty"></span>
                                 </p>
                             </div>
                         </div>
                     </div>

                     <div class="col-sm-4 col-lg-4 col-md-4">
                         <h4><a href="#">Like this template?</a>
                         </h4>
                         <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                         <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                     </div>

                 </div>

             </div>

         </div>

     </div>
     <!-- /.container -->

<<?php


  $imagenes = cargar_imagenes();

$url=base_url('');
  foreach($imagenes as $imagen){

$foto="fotos/{$imagen->id}.jpg";

if(!is_file($foto)){
  $foto="http://placehold.it/750x450/?text=no_foto";

}else{

  $foto="{$url}/{$foto}";
}

echo <<<FOTO

<div class="col-md-3 portfolio-item">
    <a href="{$url}/web/ver_foto{$imagen->id}">
        <img class="img-responsive" src="{$foto}" alt="">
    </a>
</div>

FOTO;
  }

 ?>
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
