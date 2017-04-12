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


<form method="post" role="form" >

<br />
  <div class='form-group'>
  <label class='control-label'>Clave anterior</label>
  <input class="form-control"required name="canterior"type="password" />
  </div>


  <br />
    <div class='form-group'>
    <label class='control-label'>Clave Nueva</label>
    <input class="form-control" required name="cnueva"type="password" />
    </div>

    <br />
      <div class='form-group'>
      <label class='control-label'>Repita Clave Nueva</label>
      <input class="form-control" required type="password" name="cnueva2"/>
      </div>

      <br />

          <div class='form-group'>
          <center>
            <button type="submit" class="btn btn-success">Guardar</button>
          </center>
          </div>
</form>



<?php

if($_POST){
  $CI=& get_instance();
  $canterior=$_POST['canterior'];
  $nueva=$_POST['cnueva'];
  $nueva2=$_POST['cnueva2'];

if ($nueva==$nueva2) {

  $sql="select * from usuarios where id=$usuario->id and clave='$canterior'";
  $rs=$CI->db->query($sql);
  $rs=$rs->result();

  if(count($rs)>0){

    $sql2="update usuarios set clave='$nueva' where id=$usuario->id";
    $rs2=$CI->db->query($sql2);
     echo "<script>alert('Clave actualizada');</script>";
     redirect('web/mi_perfil');

  }else {
    echo "<script>alert('Clave anterior incorrecta!');</script>";

  }

}
else{
echo "<script>alert('Las claves nuevas no coinciden!');</script>";

}

}

 ?>
