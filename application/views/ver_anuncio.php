<?php plantilla::inicio();

$CI=& get_instance();
$codigo=$_GET['codigo'];

if($_POST){
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




?>

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
<div class="col-md-9">

    <div class="thumbnail">
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">

        <div class="caption-full">
            <h4 class="pull-right"><?php echo "RD$ {$producto->precio}" ?></h4>
            <h4><a href="#"><?php echo "{$producto->nombre}" ?></a>
            </h4>
            <p><?php echo "{$producto->descripcion}" ?></p>
            <br />
            <p>Fecha de Publicacion: <?php echo "{$producto->fecha}" ?></p>
            <br />
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

        </form>

<div class="row center-block" >

    <div class="col-sm-2 text-center">
          <a href="#" ><img src="<?php echo base_url('base')?>/compartirfacebook.png"/></a>
        </div>


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



<hr>
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
