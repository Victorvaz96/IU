<?php 

include '../Vistas/MenuPrincipal_SHOW_Vista.php';
include '../Idiomas/idiomas.php';
include '../Modelos/Usuario_Model.php';
session_start();
		if (isset($_REQUEST['idiomas']))
		{  				
				 $idiom=new idiomas();
				 $_SESSION['idioma']=$_REQUEST['idiomas'];
				 $menu=new panel();
				 $menu->constructor($idiom);
		}
		//viene del boton index
 		if(isset($_POST['login']) and isset($_POST['usuario']) and isset($_POST['password']))
 		{		
 				$user=$_POST['usuario'];
 				$pass=$_POST['password'];
 				$model=new Usuario();
 				$resultado=$model->comprobarUsuario($user,$pass);
 				if($resultado==true){
 				$_SESSION['usuario']=$user;
 				$idiom=new idiomas();
 				$menus=new panel();
 				$menus->constructor($idiom);
 				}
 				else {
 					echo"<script>window.location=\"../index.php\"</script>";
 				}
 		}

 	//viene de acceder del boton menu principal o index.php
 	 	if(isset($_POST['principal']))
 	 		{
 	 			$idiom=new idiomas();
 	 			$menus=new panel();
 				$menus->constructor($idiom);

			}
			if(isset($_REQUEST['salir'])){
				session_destroy();
				echo "<script> window.location=\".././index.php\"</script>";
			}

			if(isset($_REQUEST['acceso'])){

				$idiom=new idiomas();
				$panelprincipal=new panel();
				$panelprincipal->constructor($idiom);
			}
	
?>