
<?php 

include ("Idiomas/idiomas.php");
include("Vistas/MenuPrincipal_SHOW_Vista.php");
session_start();

if(isset($_SESSION['usuario']))
{
	/*$idiom=new idiomas();
	$panelprincipal=new panel();
	$panelprincipal->constructor($idiom);*/
	header("location:Controlador\MenuPrincipal_Controller.php?acceso=acceso");

}else 
{


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<style>
	
	body{

		padding-top:40px;
		padding.bottom: 40px;
	}
	.login{
		max-width: 330px;
		padding: 15px;
		margin:0 auto;
	}
	#sha{
		max-width: 340px;
		-webkit-box-shadow: 	0px 0px 18px 0px rgba(48,50,50,0.48);
		-moz-box-shadow: 	 	0px 0px 18px 0px rgba(48,50,50,0.48);
		box-shadow: 			0px 0px 18px 0px rgba(48,50,50,0.48);
		border-radius:6%;
	}
	#avatar{
		width:96px;
		height:96px;
		margin:0px auto 10px;
		display: block;
		border-radius:50%;
	}

	</style>

	<script src="Archivos\md5-min.js"></script>
	<script type="text/javascript">
	/*function encriptar(){
		//alert("dentro");
		//alert(document.getElementById('password').value);
		if(document.getElementById('password').value!=null){ 
			//alert(document.getElementById('password').value);
		document.getElementById('password').value=hex_md5(document.getElementById('password').value);
		//alert(document.getElementById('password').value);
		}
		//alert(document.getElementById('password').value);
		}*/

	</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>


<div class="container well" id="sha"> 

	<div class="row">
 		<div class="col-xs-12"> 
			<img src="Archivos\avatar.png" class="img-responsive" id="avatar">
 		</div>
	</div>
		<form class="login" method="post" action="Controlador/MenuPrincipal_Controller.php">
		
		<div class="form-group"> 
			<label for="usuario">Usuario:</label>
			<input type="text" class="form-control" id="usuario"name="usuario" placeholder="Introduzca Usuario" required autofocus>
		</div>

		<div class="form-group">
			<label for="password">Contraseña:</label>
			<input type="password" class="form-control" name="password" placeholder="Introduzca una contraseña" id="password" required>
		</div>
		<div class="checkbox">

		
		<!--<input type="submit" class="btn btn-primary" name="login" onclick="encriptar();" value="Entrar"></input>-->
		<input type="submit" class="btn btn-primary" name="login"  value="Entrar"></input>
		<input type="submit" class="btn btn-primary" name="registrar" value="Registrarse"></input>
		</form>

		
 </div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
<?php 
}
?>