<script
			  src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous"></script>

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
 <a id="salir"  class="btn btn-danger" href="<?php base_url('web/salir'); ?>">Salir</a>


<script>
$( "#salir" ).click(function() {
  alert( "Handler for .click() called." );


  FB.logout(function(response) {
              // user is now logged out
});


});




</script>

 </div>

 <div class="row">

     <div class="col-md-2">
         <p class="lead">Panel de control</p>
         <div class="list-group">
             <a href="<?php echo site_url('web/publicar_anuncio')?>" class=" list-group-item list-group-item-info">Publicar Anuncio</a>
             <a href="<?php echo site_url('web/mi_cuenta')?>" class="active list-group-item list-group-item-info">Mis Anuncios</a>
             <a href="<?php echo site_url('web/mi_perfil')?>" class="list-group-item list-group-item-info">Mi Perfil</a>
         </div>
     </div>


     <div class="col-md-10">

         <div class="row">

           <table  class="table table-striped table-bordered">

           	<thead class="thead-inverse" style="background-color:lightblue">
           	<tr>

           			<th>ID</th>
                <th>Foto</th>
           			<th>Titulo</th>
           			<th>Precio</th>
                <th>Accion</th>
              </tr>
           	</thead>



          <tbody>


           <?php


           $productos=cargar_items();
            foreach ($productos as $producto) {

              $sql2="select * from imagenes where idProducto = $producto->id ";
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
              <tr>

              <td>$producto->id</td>
              <td>
              <center>
              <img width='80' height='64'src='/fotos/{$img}.jpg' />
              </center>

              </td>
              <td>$producto->nombre</td>
              <td>RD$ $producto->precio</td>
              <td><center>
              <a href='mi_cuenta?p=$producto->id'><img width='32' height='32' src='/base/eliminar.png' /></a>
              <a href='editar_anuncio?edit=$producto->id'><img width='32' height='32' src='/base/edit_256.png' /></a>
              </center></td>

              </tr>




              ";
            }

            if(isset($_GET['p'])){

              eliminar();

            }

function eliminar(){
  echo($strconfirm ="<script>javascript:confirm('Desea eliminar este anuncio?');</script>");

                  if ($strconfirm == true)
                  {
                    $p=$_GET['p'];
                    $CI=& get_instance();
                    $sql3="delete from productos where id = $p";
                    $rs3=$CI->db->query($sql3);
                    $sql4="delete from imagenes where idProducto = $p";
                    $rs4=$CI->db->query($sql4);
                    $sql5="delete from comentarios where idProducto = $p";
                    $rs5=$CI->db->query($sql5);
                    echo("<script>javascript:alert('Anuncio eleminado');</script>");
                    redirect('web/mi_cuenta');
                  }else{
                    redirect('web/mi_cuenta');
                  }



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
            </tbody>
             </table>
          </div>
   </div>
