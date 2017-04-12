<?php



  $CI=& get_instance();

if($_POST){


$f=new stdClass();
  $f->$nombre =$_POST['nombre'];
    $f->$comentario =$_POST['comentario'];
      $f->$fecha =time();


    $CI->db->insert('imagenes',$f);
    $cod =$this->db->insert_id();
    $foto=$_FILES['foto'];
    if($foto['error']==0):
      $tmp="fotos/{cod}.jpg";
      move_uploaded_file($foto['tmp_name'],$tmp);
}}
plantilla::inicio();
 ?>
 <div class="text-right">
<a class="btn btn-danger" href="<?php echo base_url('admin/salir';)?>">

 </div>

<fieldset>
  <legend>
    Agregar Imagen
  </legend>



  <form enctype="multipart/form-data" method="post" action="">
    <div class="col col-sm-4">
    <div class="form-group input-group">
      <label class="input grop-addon">Nombre: </label>
      <input type="text" required name="Nombre: " class="form-control" />
    </div>
    <div class="form-group input-group">
      <label class="input grop-addon">Comentario: </label>
      <textarea class="form-control" name="comentario"></textarea>
      </div>
    <div class="form-group input-group">
      <label class="input grop-addon">Imagen: </label>
      <input required type="file" name="foto: " class="form-control" />
    </div>
    <div>
<button type="submit" class="btn btn-success">Guardar</button>

    </div>
</div>
  </form>
</fieldset>


<fieldset>


<legend>

  Imagenes Agregadas
</legend>
<table clas="table">
<thead>
<tr>

  <th>Img</th>
  <th>Cod</th>
  <th>Nombre</th>
  <th>Comentario</th>
</tr>

</thead>
<tbody>
<<?php

  $imagenes=cargar_imagenes();
  foreach($imagenes as $imagen){
    echo"
    <tr>
      <td><img src='fotos/{$imagen->id}.jpg' height='50' /></td>
      <td>{$imagen->id}</td>
      <td>{$imagen->nombre}</td>
      <td>{$imagen->comentario}</td>

    </tr>";
  }

 ?>

</tbody>

</table>

</fieldset>
