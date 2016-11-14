<?php 

class panel{ 
    
	function constructor($idioma){ 

        include('../plantilla/cabecera.php');
        $clase=new cabecera();
        $clase->crear($idioma);
        ?>

       
        <?php 
            echo "<a href=\"MenuPrincipal_Controller.php?salir=salir\"><input type=\"image\" align=\"right\" src=\"..\Archivos\salir.png\" height=\"30\" width=\"30\"></a>";
            echo "<a href=\"MenuPrincipal_Controller.php?idiomas=gallego\"><input type=\"image\" align=\"right\" src=\"..\Archivos\galicia.png\" height=\"30\" width=\"30\"></a>";
            echo "<a href=\"MenuPrincipal_Controller.php?idiomas=español\"><input type=\"image\" align=\"right\" src=\"..\Archivos\\españa.gif\" height=\"30\" width=\"30\"></a>";
            echo "<a href=\"MenuPrincipal_Controller.php?idiomas=ingles\"><input type=\"image\" align=\"right\" src=\"..\Archivos\ingles.png\" height=\"30\" width=\"30\"></a>";
        
		?>
        <?php
        include'../plantilla/pie.php';
	?>

 <?php
 }
  }
?>