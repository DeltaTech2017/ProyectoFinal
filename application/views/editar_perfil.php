<?php plantilla::inicio(); ?>
<?php
  if(!isset($_SESSION['user'])){
    redirect('web/login');
  }


  $CI=& get_instance();
  $usuario=$_SESSION['user'];
 ?>



 <div class="text-right">
   <h4>Bienvenido <?php echo "{$usuario->nombre}" ?></h4>
   <a class="btn btn-info" href="<?php echo site_url('web/editar_clave')?>">Cambiar Clave</a>
 <a class="btn btn-danger" href="<?php echo site_url('web/salir')?>">Salir</a>


 </div>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Panel de control</p>
         <div class="list-group">
             <a href="<?php echo site_url('web/publicar_anuncio')?>" class=" list-group-item list-group-item-info">Publicar Anuncio</a>
             <a href="<?php echo site_url('web/mi_cuenta')?>" class="list-group-item list-group-item-info">Mis Anuncios</a>
             <a href="<?php echo site_url('web/mi_perfil')?>" class="active list-group-item list-group-item-info">Mi Perfil</a>
         </div>
     </div>

<div class="col-md-4">

  <?php
  $productos=cargar_items();
   foreach ($productos as $producto) {

     $sql2="select * from imagenes where idProducto = $usuario->id ";
     $rs2=$CI->db->query($sql2);
     $rs2= $rs2->result();
     $imagen=array();

     if (count($rs2)>0){
       $imagen=$rs2[0];
       $img=$imagen->id;
     }else{
       $img="persona";

     }
}

?>
<form method="post" role="form" enctype="multipart/form-data">
  <div class="form-group">
    <img height="150" width="150" id="foto11"src="/fotos/<?php echo $img?>.jpg"/>
    <input name="foto1" type="file" id="ifoto1" accept=".jpg, .png"/>
  </div>
<br />
  <div class='form-group'>
  <label class='control-label'>Nombre de Usuario</label>
  <input class="form-control" name="nombre"type="text" value="<?php echo $usuario->nombre?>"/>
  </div>


  <br />
    <div class='form-group'>
    <label class='control-label'>Correo Electronico</label>
    <input class="form-control"name="correo"type="text" value="<?php echo $usuario->correo?>"/>
    </div>

    <br />
      <div class='form-group'>
      <label class='control-label'>Provincia de Residencia</label>
      <input class="form-control"type="text" name="provincia"value="<?php echo $usuario->provincia?>"/>
      </div>

      <br />
        <div class='form-group'>
        <label class='control-label'>Telefono</label>
        <input class="form-control"type="text"name="telefono" value="<?php echo $usuario->telefono?>"/>
        </div>
        <br />
          <div class='form-group'>
          <center>
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
          </center>
          </div>
</form>


<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#foto11').attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);
    }
  }
            $("#ifoto1").change(function(){
              readURL(this);
            });


</script>



<?php
if(isset($_POST['nombre'])){
$sql="update usuarios set nombre=?, correo=?, provincia=?, telefono=? where id=$usuario->id";
$CI=& get_instance();

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$provincia=$_POST['provincia'];
$telefono=$_POST['telefono'];
$rs=$CI->db->query($sql, array($nombre,$correo, $provincia, $telefono));
$idp=$usuario->id;

if($_FILES['foto1']['size']!=0 ){
  $rs33=$CI->db->query("Select * from imagenes where idProducto = $usuario->id");
  $rs33=$rs33->result();

if (count($rs33)>0) {
  $rs44=$CI->db->query("delete from imagenes where idProducto=$usuario->id");
}

  $f=new stdClass();
  $f->idProducto=$idp;
  $CI->db->insert('imagenes', $f);
  $cod=$this->db->insert_id();
  $foto=$_FILES['foto1'];
  if($foto['error']==0){
    $tmp="fotos/{$cod}.jpg";
    move_uploaded_file($foto['tmp_name'], $tmp);
  }
}


echo"
<script>
alert('Usuario editado!');
</script>";
$usuario->nombre=$nombre;
$usuario->correo=$correo;
$usuario->provincia=$provincia;
$usuario->telefono=$telefono;
redirect('web/editar_perfil');
}


 ?>



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

</div>

   </div>
