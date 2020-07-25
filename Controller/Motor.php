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

    $varid = 'id' . $IdPregunta;
    $varpeso = 'Peso' . $IdPregunta;

    $array[] = array("IdPregunta" => $_GET[$varid], "Peso" => $_GET[$varpeso], "IdMateria" => $IdMateria);
}

foreach ($array as $value) {

    $array2 = json_decode(GetPesoMateria($value['IdMateria']));

    foreach ($array2 as $obj) {
        $varMat = $obj->Peso;
        $varPre = $value['Peso'];
        //CalcularPregunta($obj->Peso,GetPesoMateria($value['IdMateria']));
        $Resul += CalcularPregunta(json_decode($varMat),json_decode($varPre));
        //var_dump($Resultado);
            
    }
    CalculaResultado($Resul);
    break;
    // CalcularPregunta($value['Peso'], $PesoPregunta);
}


function CalculaResultado($Resul){
    $json = new stdClass();
    $respuestas = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getTotal";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();
    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);

    foreach ($jsonresultado as $obj) {
        $Nombre = $obj->Nombre;
        $PesoTotal = $obj->PesoTotal;
        //var_dump($PesoTotal);
        $valorCarrera = (100 / $PesoTotal) * $Resul;

        echo "El porcentaje de la carrera: ".$Nombre." es: ".$valorCarrera."%<br>";
    }
    

}
//$jsonRespuestas = json_encode($array);
//var_dump($jsonRespuestas);




function CalcularPregunta($PesoPregunta, $PesoMateria)
{
    $var1=$PesoPregunta;
    $var2=$PesoMateria;
    //var_dump($var1);
    //var_dump($var2);
    
    $resultado = 0.0;
    if ($PesoPregunta != 0 || $PesoMateria != 0) {
        $resultado = ($var1 * $var2) / 10.0;
        //var_dump($resultado);
    }
    return $resultado;
}


function GetPesoMateria($idmateria)
{
    $json = new stdClass();
    $json->IdMateria = $idmateria;
    $respuestas = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getMotor";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();
    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);
    return json_encode($jsonresultado);
}
