<?php plantilla::inicio(); ?>
<?php
  if(!isset($_SESSION['user'])){
    redirect('web/login');
  }

  $CI=& get_instance();
  $usuario=$_SESSION['user'];
$mensaje2="";

  if($_POST){
  $sql="insert into productos(nombre, tipo, marca, tamanoAro, tamanoCuadro, color, precio, descripcion, usuario, fecha) values (?,?,?,?,?, ?, ?, ?, ?, ?)";
  $CI=& get_instance();

  $nombre=$_POST['nombre'];
  $tipo=$_POST['tipo'];
  $marca=$_POST['marca'];
  $tamanoAro=$_POST['tamanoAro'];
  $tamanoCuadro=$_POST['tamanoCuadro'];
  $color=$_POST['color'];
  $precio=$_POST['precio'];
  $descripcion=$_POST['descripcion'];
  $fecha=date('Y-m-d H:i:s');
  $user=$usuario->id;
  $rs=$CI->db->query($sql, array($nombre, $tipo, $marca, $tamanoAro, $tamanoCuadro, $color, $precio, $descripcion, $user, $fecha));
$idp=$this->db->insert_id();

if($_FILES['foto1']['size']!=0 ){
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

if($_FILES['foto2']['size']!=0 ){
  $f=new stdClass();
  $f->idProducto=$idp;
  $CI->db->insert('imagenes', $f);
  $cod=$this->db->insert_id();
  $foto=$_FILES['foto2'];
  if($foto['error']==0){
    $tmp="fotos/{$cod}.jpg";
    move_uploaded_file($foto['tmp_name'], $tmp);
  }
}


if($_FILES['foto3']['size']!=0){
  $f=new stdClass();
  $f->idProducto=$idp;
  $CI->db->insert('imagenes', $f);
  $cod=$this->db->insert_id();
  $foto=$_FILES['foto3'];
  if($foto['error']==0){
    $tmp="fotos/{$cod}.jpg";
    move_uploaded_file($foto['tmp_name'], $tmp);
  }
}

if($_FILES['foto4']['size']!=0 ){
  $f=new stdClass();
  $f->idProducto=$idp;
  $CI->db->insert('imagenes', $f);
  $cod=$this->db->insert_id();
  $foto=$_FILES['foto4'];
  if($foto['error']==0){
    $tmp="fotos/{$cod}.jpg";
    move_uploaded_file($foto['tmp_name'], $tmp);
  }
}

if($_FILES['foto5']['size']!=0){
  $f=new stdClass();
  $f->idProducto=$idp;
  $CI->db->insert('imagenes', $f);
  $cod=$this->db->insert_id();
  $foto=$_FILES['foto5'];
  if($foto['error']==0){
    $tmp="fotos/{$cod}.jpg";
    move_uploaded_file($foto['tmp_name'], $tmp);
  }
}





echo"
<script>
  alert('Publicacion guardada con exito!');
</script>";

  }
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


 <script
   src="https://code.jquery.com/jquery-3.2.1.js"
   integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
   crossorigin="anonymous"></script>

 <div class="text-right">
   <h4>Bienvenido <?php echo "{$usuario->nombre}" ?></h4>
 <a class="btn btn-danger" href="<?php echo site_url('web/salir')?>">Salir</a>

 </div>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Panel de control</p>
         <div class="list-group">
             <a href="<?php echo site_url('web/publicar_anuncio')?>" class=" active list-group-item list-group-item-info">Publicar Anuncio</a>
             <a href="<?php echo site_url('web/mi_cuenta')?>" class="list-group-item list-group-item-info">Mis Anuncios</a>
             <a href="<?php echo site_url('web/mi_perfil')?>" class="list-group-item list-group-item-info">Mi Perfil</a>
         </div>
     </div>

     <div class="col-md-6">


       <form role="form"  enctype="multipart/form-data"method="post" action="">
  <div class="form-group">

    <label for="nombre">Titulo de la publicacion</label>
    <input type="text" class="form-control" required name="nombre" id="nombre"
           placeholder="Introduce el titulo" tabindex="1">
  </div>
  <div class="form-group">
    <label for="">Tipo</label>
    <select required class="form-control"  name="tipo"id="tipo" tabindex="2">
  <option></option>
  <option>Chopper</option>
  <option>Estacionaria</option>
  <option>Mountain Bike (MTB)</option>
  <option>Mujeres</option>
  <option>Niños</option>
  <option>Recumbente</option>
  <option>Ruta</option>
  <option>Urbana</option>

</select>
  </div>

  <div class="form-group">
    <label for="">Marca</label>
    <select required class="form-control" name="marca"id="marca" tabindex="3">
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

  <div class="form-group">
    <label for="">Tamaño del Aro</label>
    <select required class="form-control" name="tamanoAro" id="tamanoAro" tabindex="4">
  <option></option>
  <option>12 pulgadas</option>
  <option>16 pulgadas</option>
  <option>20 pulgadas</option>
  <option>24 pulgadas</option>
  <option>26 pulgadas</option>
  <option>29 pulgadas</option>
  <option>700 c</option>
  <option>Otro</option>
  </select>
  </div>

  <div class="form-group">
    <label for="">Tamaño del cuadro</label>
    <select required class="form-control" name="tamanoCuadro"id="tamanoCuadro" tabindex="5">
  <option></option>
  <option>Desconocido</option>
  <option>Niños</option>
  <option>XS</option>
  <option>S</option>
  <option>M</option>
  <option>L</option>
  <option>XL</option>
  <option>XXL</option>
  </select>
  </div>

  <div class="form-group">
    <label for="color">Color</label>
    <input type="text" class="form-control" name="color"id="color"
           placeholder="Introduce el color" tabindex="6">
</div>
     <div class="form-group">
       <label for="precio">Precio</label>
       <input required type="" class="form-control" name="precio" id="precio"
              placeholder="Introduce el precio" tabindex="7">
</div>

<div class="form-group">
  <label for="descripcion">Descripcion</label>
  <textarea required class="form-control" id="descripcion" name="descripcion" rows="4" tabindex="8"></textarea>
</div>


  <div class="form-group">
    <label for="foto">Adjuntar fotos</label>
    <input type="file" accept=".jpeg,.jpg,.png"name="foto1" id="ifoto1"tabindex="9">
    <input type="file" accept=".jpeg,.jpg,.png"name="foto2"id="ifoto2"tabindex="10">
    <input type="file" accept=".jpeg,.jpg,.png"name="foto3"id="ifoto3"tabindex="11">
    <input type="file" accept=".jpeg,.jpg,.png"name="foto4"id="ifoto4"tabindex="12">
    <input type="file" accept=".jpeg,.jpg,.png"name="foto5"id="ifoto5"tabindex="13">

    <p class="help-block">Solo .jpg y .png</p>
  </div>

  <center>
    <button type="submit" class="btn btn-success"tabindex="14">Enviar</button>
  </center>
</form>
     </div>

   </div>
