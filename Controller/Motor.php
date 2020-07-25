<?php
    
    include '../Controller/cURLRequest.php';


    //if(($_GET['PesoRespuesta'])=='true'){
        $json = new stdClass();
        $respuestas = new stdClass();
        $curl = new stdClass();
        $curl->URL = "http://apache/ProyectoProlog/public/api/getpreguntas";
        $curl->VERBO = "GET";
        $curl->DATA = json_encode($json);
                
        $data = new cURLRequest();
        $resultado = $data->ApiRest($curl);
        
        $jsonresultado = json_decode($resultado->body);

        $array = array();       
        foreach ($jsonresultado as $obj) {   
        $IdPregunta = $obj->IdPregunta;
        $IdMateria = $obj->IdMateria;
        $pregunta = $obj->Pregunta;
        
        $varid = 'id'.$IdPregunta;  
        $varpeso = 'Peso'.$IdPregunta;  

        $array [] = array("IdPregunta"=>$_GET[$varid],"Peso"=>$_GET[$varpeso]);
        }
        $jsonRespuestas = json_encode($array);
        var_dump($jsonRespuestas);
    //}




    function CalcularPregunta($PesoPregunta, $PesoMateria){

        $resultado = 0;
        if($PesoPregunta != 0 || $PesoMateria != 0){
            $resultado = $PesoPregunta * $PesoMateria / 10;
        }
        return $resultado;
    }


?>

