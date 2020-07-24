<?php
    if(isset($_POST('JSON'))){


        
    }





    function CalcularPregunta($PesoPregunta, $PesoMateria){

        $resultado = 0;
        if($PesoPregunta != 0 || $PesoMateria != 0){
            $resultado = $PesoPregunta * $PesoMateria / 10;
        }
        return $resultado;
    }


?>

