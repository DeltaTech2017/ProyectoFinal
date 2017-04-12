<?php

plantilla::inicio();

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

 <div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
              <div style="color:red">

                              </div>
              <div style="color:green">

                              </div>
							<div class="col-xs-6">

								<h3>Recuperar Clave</h3>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email"required name="email2" id="email2" tabindex="1" class="form-control" placeholder="Ingrese su correo" value="">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Enviar">
											</div>
										</div>
									</div>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
