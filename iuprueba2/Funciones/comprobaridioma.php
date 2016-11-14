<?php 
class comprobacion{

function comprobaridioma($idioma){

$idiom=$idioma->español();

if (isset($_SESSION['idioma'])){
    if($_SESSION['idioma']=="español"){
        $idiom=$idioma->español();
    }elseif($_SESSION['idioma']=="gallego"){
        $idiom=$idioma->gallego();
    }elseif($_SESSION['idioma']=="ingles"){
       $idiom=$idioma->ingles();
    }
}
return $idiom;
}

}