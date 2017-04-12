<?php plantilla::inicio();
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
               <img src='/fotos/{$img}.jpg'style='height:250px' alt=''>
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

<div class="col-lg-10">
  <center>
    <h3>Quienes somos</h3>
  </center>

<div class="row">
  <div class="col-sm-3">

    <img src="/fotos/logo2.jpg"/>
  </div>

  <div class="col-sm-8">
    <p>
      Somos una pagina web destinada a la publicacion gratuita de anuncios de venta de bicicletas.
      Nuestra pagina ofrece un amplio catalogo de bicicletas por toda la Republica Dominicana. Estamos
      comprometidos con ofrecer un servicio de calidad a todo el publico que nos visita y a toda la
      comunidad deportista que se dedica al ciclismo.<br /><br />
      Nuestro valores mas preciados son:
      <ul>
        <li>Confianza</li>
        <li>Honestidad</li>
        <li>Rapidez</li>
        <li>Eficacia</li>

      </ul>

      </p>
      <p class="pull-right">

        <ul class="pull-right">
          <strong>Delta Tech Team 2017:</strong><br />

          Aneudys Ortiz 2015-2538<br />
          Cesar Terrero 2015-2707<br />
          Rene Polanco 2015-2755


        </ul>
      </p>

  </div>
</div>

<div class="col-sm-6">
  <br /><br /><br />
  <form method="post">
    <div class="form-group">
      <h4>Comunicarse con Nosotros</h4>
    </div>
    <div class='form-group'>
    <label class='control-label'>Ingrese su nombre</label>
    <input class="form-control"required name="canterior" tabindex="1"type="text" />
    </div>

    <div class='form-group'>
    <label class='control-label'>Ingrese su correo electronico</label>
    <input class="form-control"required name="canterior" tabindex="2"type="email" />
    </div>

    <div class='form-group'>
      <label class='control-label'>Redacte su mensaje</label>
      <textarea class="form-control" rows="3" required tabindex="3"id="comentario" name="comentario">

      </textarea>
    </div>
    <center>
      <button type="submit" tabindex="3"class="btn btn-success">Enviar</button>

    </center>

  </div>

  </form>
</div>


</div>



</div>

<?php if($_POST){

  echo "<script>alert('Su mensaje fue enviado');</script>";
} ?>
