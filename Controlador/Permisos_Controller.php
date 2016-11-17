<?php

include("../Vistas/Permisos_Update_Vista.php");
include("../Idiomas/idiomas.php");
include("../Modelos/Permisos_Model.php");
session_start();


 	if(isset($_REQUEST['Permisos']))
 	{	$funcionalidad="";
 		$idiom=new idiomas();
 		$model=new Permisos();
 		$model->crearArrrayGrupo();
 		include("../Archivos/ArrayGrupo_usuarios.php");
 		$clase=new consult();
 		$formgrupo=$clase->array_consultar();
 		//$model->crearArrayAccion_Funcionalidad();
 		$model->crearArrayFuncionalidad();
 		include("../Archivos/ArrayFuncionalidad.php");
 		$clase1=new consult1();
 		$formfuncionalidad=$clase1->array_consultar();
 		$vista=new PermisosUpdate();
 		$vista->crear($formfuncionalidad,$formgrupo,NULL,$idiom,$funcionalidad);

	}
	if(isset($_REQUEST['Funcionalidad'])and !isset($_POST['formacciones'])){
		$idiom=new idiomas();
		$funcionalidad=$_POST['funcion'];
 		$model=new Permisos();
		$model->crearArrayAccion_Funcionalidad($funcionalidad);
		include("../Archivos/ArrayAccion_Funcionalidad.php");
		$clase=new consult2();
		$form=$clase->array_consultar();
		include("../Archivos/ArrayGrupo_usuarios.php");
 		$clase=new consult();
 		$formgrupo=$clase->array_consultar();
 		$model->crearArrayFuncionalidad();
 		include("../Archivos/ArrayFuncionalidad.php");
 		$clase1=new consult1();
 		$formfuncionalidad=$clase1->array_consultar();
		$vista=new PermisosUpdate();
 		$vista->crear($formfuncionalidad,$formgrupo,$form,$idiom,$funcionalidad);
	}
	if(isset($_REQUEST['Funcionalidad']) and isset($_POST['formacciones']) and isset($_POST['grupo']))
	{
			echo "dentro";
			$funcionalidad=$_REQUEST['Funcionalidad'];
			$acciones=$_POST['formacciones'];
			$grupo=$_POST['grupo'];
			$alta;
			$baja;
			$consultar;
			$modificar;
			$view;
			foreach($acciones as $accion){
   					if($accion=="ALTA")
   					{
   						echo "alta";
   					}
   						
					}
	}
?>