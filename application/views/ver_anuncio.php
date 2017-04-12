<?php plantilla::inicio();

$CI=& get_instance();
$codigo=$_GET['codigo'];

if(isset($_POST['nombre'])){
  $sql="insert into comentarios(idProducto, nombre, comentario, fecha) values (?,?,?,?)";
  $CI=& get_instance();

  $nombre=$_POST['nombre'];
  $comentario=$_POST['comentario'];
  $fecha=date('Y-m-d H:i:s');
  $rs=$CI->db->query($sql, array($codigo, $nombre, $comentario, $fecha));

}

if($codigo==0){

  redirect(base_url(''));
}

$sql="select * from productos where id = $codigo";
$sql2="select * from comentarios where idProducto = $codigo";


$rs=$CI->db->query($sql);
$rs2=$CI->db->query($sql2);

$rs= $rs->result();
$rs2=$rs2->result();



$producto=$rs[0];


$sql3="select * from usuarios where id = $producto->usuario";
$rs3=$CI->db->query($sql3);
$rs3=$rs3->result();


$usuario=$rs3[0];


$comentarios=$rs2;
$cantidad=count($rs2);
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
               <img src='/fotos/{$img}.jpg'  style='height:250px'alt=''>
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


}



?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta property="og:url"           content="http://deltabikes.000webhostapp.com/index.php/web" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Delta Bikes" />
  <meta property="og:description"   content="Pagina de Bicicletas" />
  <meta property="og:image"         content="https://deltabikes.000webhostapp.com/fotos/logo.jpg" />

  <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


  <script>


  FB.ui({
method: 'share',
href: 'https://developers.facebook.com/docs/',
}, function(response){});
  </script>



<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>




<script>

$(function() {

  $('#register-form-link').click(function(e) {
    $("#register-form").show();

    e.preventDefault();
  });

});



</script>

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
<div class="col-md-8">

    <div class="thumbnail">
      <?php
      $sql2="select * from imagenes where idProducto = $producto->id ";
      $CI =& get_instance();
      $rs2=$CI->db->query($sql2);
      $rs2= $rs2->result();
      $imagen=array();

      if (count($rs2)>0){
        $imagen=$rs2[0];
        $img=$imagen->id;
      }else{
        $img="logo2";

      }

       ?>

       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
       <script src="<?php echo base_url('base')  ?>/js/bootstrap.js"></script>

       <div id="myCarousel"class="carousel">

<?php

if (count($rs2)==1) {
  echo"
  <ol class='carousel-indicators'>
    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>

  </ol>

  <div class='carousel-inner'>

    <div class='item active'>
      <img  class='img-responsive' style='height:400px' src='/fotos/{$img}.jpg' alt=''>

    </div>
  </div>
  ";
}else
if (count($rs2)==2) {
  $img2=$rs2[1];
  echo"
  <ol class='carousel-indicators'>
    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
    <li data-target='#myCarousel' data-slide-to='1' ></li>

  </ol>

  <div class='carousel-inner'>

    <div class='item active'>
          <img  class='img-responsive' style='height:400px' src='/fotos/{$img}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img2->id}.jpg' alt=''>
    </div>

</div>
    <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
      <span class='icon-prev'></span>
    </a>


    <a class='carousel-control right' href='#myCarousel' data-slide='next'>
      <span class='icon-next'></span>
    </a>

  ";
}else if (count($rs2)==2) {
  $img2=$rs2[1];
  echo"
  <ol class='carousel-indicators'>
    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
    <li data-target='#myCarousel' data-slide-to='1' ></li>

  </ol>

  <div class='carousel-inner'>

    <div class='item active'>
          <img  class='img-responsive' style='height:400px' src='/fotos/{$img}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img2->id}.jpg' alt=''>
    </div>

</div>
    <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
      <span class='icon-prev'></span>
    </a>


    <a class='carousel-control right' href='#myCarousel' data-slide='next'>
      <span class='icon-next'></span>
    </a>

  ";
}else if (count($rs2)==3) {
  $img2=$rs2[1];
  $img3=$rs2[2];
  echo"
  <ol class='carousel-indicators'>
    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
    <li data-target='#myCarousel' data-slide-to='1' ></li>
    <li data-target='#myCarousel' data-slide-to='2' ></li>

  </ol>

  <div class='carousel-inner'>

    <div class='item active'>
          <img  class='img-responsive' style='height:400px' src='/fotos/{$img}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img2->id}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img3->id}.jpg' alt=''>
    </div>

</div>
    <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
      <span class='icon-prev'></span>
    </a>


    <a class='carousel-control right' href='#myCarousel' data-slide='next'>
      <span class='icon-next'></span>
    </a>

  ";
}else if (count($rs2)==4) {
  $img2=$rs2[1];
  $img3=$rs2[2];
  $img4=$rs2[3];
  echo"
  <ol class='carousel-indicators'>
    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
    <li data-target='#myCarousel' data-slide-to='1' ></li>
    <li data-target='#myCarousel' data-slide-to='2' ></li>
    <li data-target='#myCarousel' data-slide-to='3' ></li>

  </ol>

  <div class='carousel-inner'>

    <div class='item active'>
          <img  class='img-responsive' style='height:400px' src='/fotos/{$img}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img2->id}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img3->id}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img4->id}.jpg' alt=''>
    </div>

</div>
    <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
      <span class='icon-prev'></span>
    </a>


    <a class='carousel-control right' href='#myCarousel' data-slide='next'>
      <span class='icon-next'></span>
    </a>

  ";
}else if (count($rs2)==5) {
  $img2=$rs2[1];
  $img3=$rs2[2];
  $img4=$rs2[3];
  $img5=$rs2[4];
  echo"
  <ol class='carousel-indicators'>
    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
    <li data-target='#myCarousel' data-slide-to='1' ></li>
    <li data-target='#myCarousel' data-slide-to='2' ></li>
    <li data-target='#myCarousel' data-slide-to='3' ></li>
<li data-target='#myCarousel' data-slide-to='4' ></li>
  </ol>

  <div class='carousel-inner'>

    <div class='item active'>
          <img  class='img-responsive' style='height:400px' src='/fotos/{$img}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img2->id}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img3->id}.jpg' alt=''>
    </div>

    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img4->id}.jpg' alt=''>
    </div>
    <div class='item'>
        <img  class='img-responsive' style='height:400px' src='/fotos/{$img5->id}.jpg' alt=''>
    </div>

</div>
    <a class='carousel-control left' href='#myCarousel' data-slide='prev'>
      <span class='icon-prev'></span>
    </a>


    <a class='carousel-control right' href='#myCarousel' data-slide='next'>
      <span class='icon-next'></span>
    </a>

  ";
}






?>




       </div>

        <div class="caption-full">
            <h4 class="pull-right"><?php echo "RD$ {$producto->precio}" ?></h4>
            <h4><a href="#"><?php echo "{$producto->nombre}" ?></a>
            </h4>

            <p><strong>Tipo: </strong><?php echo"$producto->tipo" ?></p>
            <p><strong>Marca: </strong><?php echo"$producto->marca"?></p>
            <p><strong>Tamaño del Cuadro: </strong><?php echo"$producto->tamanoCuadro"?></p>
            <p><strong>Tamaño de los Aros: </strong><?php echo"$producto->tamanoAro"?></p>
            <p><strong>Color: </strong><?php echo"$producto->color" ?></p>
            <p><?php echo "{$producto->descripcion}" ?></p>

<hr />

            <form class='form' role='form'>
          <div class='form-group'>
          <label class='control-label'>Nombre del vendedor</label>
          <p class='form-control-static'><?php echo "{$usuario->nombre}" ?></p>
          </div>


          <div class='form-group'>
          <label class='control-label'>Telefono del Vendedor</label>
          <p class='form-control-static'><?php echo "{$usuario->telefono}" ?></p>
          </div>
          <div class='form-group'>
          <label class='control-label'>Ubicacion</label>
          <p class='form-control-static'><?php echo "{$usuario->provincia}" ?></p>
          </div>

          <div class="pull-right">
            <p>Fecha de Publicacion: <?php echo "{$producto->fecha}" ?></p>
          </div>
        </form>






<div class="row center-block" >

  <div class="col-sm-2 text-center">
    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdeltabikes.000webhostapp.com&layout=button&size=small&mobile_iframe=true&appId=287575934996971&width=81&height=20"
    width="81" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>


</div>

</div>


<div class="ratings">
    <p class="pull-right"><?php echo $cantidad ?> Comentarios</p>

</div>
</div>







        <div class="well">

          <div class="text-right">
              <a href="#" class="btn btn-info"id="register-form-link">Comentar</a>
          </div>




            <div class="row">
                <div class="col-md-4">
                  <form id="register-form" role="form" method="post" style="display: none;">
                    <div class="form-group">
  										<input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Ingrese su Nombre" value="">
  									</div>

                    <div class="form-group">
                      <textarea class="form-control" rows="3" tabindex="2"id="comentario" name="comentario">

                      </textarea>
                      </div>


                        <button type="submit" tabindex="3"class="btn btn-success">Enviar</button>


                  </form>


                </div>
              </div>



            <hr>
<?php foreach ($comentarios as $comentario): ?>


            <div class="row">
                <div class="col-md-12">

                    <strong><?php echo $comentario->nombre ?></strong>
                    <span class="pull-right"><?php echo $comentario->fecha ?></span>
                    <p><?php echo $comentario->comentario ?></p>
                </div>
            </div>
<?php endforeach; ?>
            <hr>


</div>
      </div>


    </div>
