<title>Delta Bikes</title>
<link href="<?php echo base_url('base')  ?>/logo.png" rel="icon" />

<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url('base')  ?>/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php echo base_url('base')  ?>/css/shop-homepage.css" rel="stylesheet">

<?php
$mensaje="";
$mensaje2="";
$nombreuser="";

if(isset($_POST['usuario'])){
  $sql="select * from admins where usuario = ? and clave= ? ";
  $CI =& get_instance();
  $correo=$_POST['usuario'];
  $clave=$_POST['clave'];
  $rs=$CI->db->query($sql, array($correo, $clave));


  $rs=$rs->result();
  if(count($rs)>0){
    $_SESSION['admin']=$rs[0];


redirect('web/admin');

  }else{

    $mensaje="Usuario o clave no Validos";
  }

}?>

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
								<a href="#" class="active" id="login-form-link">Login Administrador</a>
							</div>

						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" required name="usuario" id="usuario" tabindex="1" class="form-control" placeholder="Usuario" value="">
									</div>
									<div class="form-group">
										<input type="password" required name="clave" id="clave" tabindex="2" class="form-control" placeholder="Clave">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="<?php echo site_url('web/login')?>" tabindex="5" class="forgot-password">VOLVER</a>
                      </div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
