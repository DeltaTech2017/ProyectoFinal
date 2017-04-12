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

              echo"
              <tr>

              <td>$producto->id</td>
              <td>
              <center>
              <img width='32' height='32'src='/tienda/base/logo.png' />
              </center>

              </td>
              <td>$producto->nombre</td>
              <td>RD$ $producto->precio</td>
              <td><center>
              <a href='mi_cuenta?p=$producto->id'><img width='32' height='32' src='https://es.opensuse.org/images/b/be/Icon-trash.png' /></a>
              <a href='editar_anuncio?edit=$producto->id'><img width='32' height='32' src='http://www.fancyicons.com/download/?id=369&t=png&s=256' /></a>
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
                    echo("<script>javascript:alert('Anuncio eleminado');</script>");

  }



}

            ?>
            </tbody>
             </table>
          </div>
   </div>
