<?php
$mensaje="";
$mensaje2="";
$nombreuser="";

if($_GET){
  $sql="select * from usuarios where correo = ? and clave= ? ";
  $CI =& get_instance();
  $correo=$_GET['email'];
  $clave=md5($_GET['clave']);
  $rs=$CI->db->query($sql, array($correo, $clave));

  $rs=$rs->result();
  if(count($rs)>0){
$_SESSION['user']=$rs[0];


redirect('web/mi_cuenta');

  }else{

    $mensaje="Usuario o clave no Validos";
  }

}

if($_POST){
$sql="insert into usuarios(nombre, correo, clave) values (?,?,?)";
$CI=& get_instance();

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$clave=md5($_POST['clave']);
$rs=$CI->db->query($sql, array($nombre, $correo, $clave));
$mensaje2="Usuario Registrado con exito!";

}
plantilla::inicio();



 ?>
 <script
   src="https://code.jquery.com/jquery-3.1.1.js"
   integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
   crossorigin="anonymous"></script>

   <style>
   body {
   padding-top: 50px;
   }
   .panel-login {
   border-color: #ccc;
   -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
   -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
   box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
   }
   .panel-login>.panel-heading {
   color: #00415d;
   background-color: #fff;
   border-color: #fff;
   text-align:center;
   }
   .panel-login>.panel-heading a{
   text-decoration: none;
   color: #666;
   font-weight: bold;
   font-size: 15px;
   -webkit-transition: all 0.1s linear;
   -moz-transition: all 0.1s linear;
   transition: all 0.1s linear;
   }
   .panel-login>.panel-heading a.active{
   color: #029f5b;
   font-size: 18px;
   }
   .panel-login>.panel-heading hr{
   margin-top: 10px;
   margin-bottom: 0px;
   clear: both;
   border: 0;
   height: 1px;
   background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
   background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
   background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
   background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
   }
   .panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
   height: 45px;
   border: 1px solid #ddd;
   font-size: 16px;
   -webkit-transition: all 0.1s linear;
   -moz-transition: all 0.1s linear;
   transition: all 0.1s linear;
   }
   .panel-login input:hover,
   .panel-login input:focus {
   outline:none;
   -webkit-box-shadow: none;
   -moz-box-shadow: none;
   box-shadow: none;
   border-color: #ccc;
   }
   .btn-login {
   background-color: #59B2E0;
   outline: none;
   color: #fff;
   font-size: 14px;
   height: auto;
   font-weight: normal;
   padding: 14px 0;
   text-transform: uppercase;
   border-color: #59B2E6;
   }
   .btn-login:hover,
   .btn-login:focus {
   color: #fff;
   background-color: #53A3CD;
   border-color: #53A3CD;
   }
   .forgot-password {
   text-decoration: underline;
   color: #888;
   }
   .forgot-password:hover,
   .forgot-password:focus {
   text-decoration: underline;
   color: #666;
   }

   .btn-register {
   background-color: #1CB94E;
   outline: none;
   color: #fff;
   font-size: 14px;
   height: auto;
   font-weight: normal;
   padding: 14px 0;
   text-transform: uppercase;
   border-color: #1CB94A;
   }
   .btn-register:hover,
   .btn-register:focus {
   color: #fff;
   background-color: #1CA347;
   border-color: #1CA347;
   }



   </style>








<html>


  <script>
  $(function() {

      $('#login-form-link').click(function(e) {
  		$("#login-form").delay(100).fadeIn(100);
   		$("#register-form").fadeOut(100);
  		$('#register-form-link').removeClass('active');
  		$(this).addClass('active');
  		e.preventDefault();
  	});
  	$('#register-form-link').click(function(e) {
  		$("#register-form").delay(100).fadeIn(100);
   		$("#login-form").fadeOut(100);
  		$('#login-form-link').removeClass('active');
  		$(this).addClass('active');
  		e.preventDefault();
  	});

  });


  </script>

  <body>
    <div class="alert " ><center>
			<h1>Ingrese al Sistema</h1></center> </div></header>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
              <div style="color:red">

                <?php echo $mensaje; ?>
              </div>
              <div style="color:green">

                <?php echo $mensaje2; ?>
              </div>
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Registrar</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="get" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="E-Mail" value="">
									</div>
									<div class="form-group">
										<input type="password" name="clave" id="clave" tabindex="2" class="form-control" placeholder="Clave">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Olvido Clave?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Usuario" value="">
									</div>
									<div class="form-group">
										<input type="email" name="correo" id="correo" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="clave" id="clave" tabindex="2" class="form-control" placeholder="Clave">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registrar">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</html>
