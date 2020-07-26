<?php

include '../Controller/cURLRequest.php';
include '../View/menu-header.html';

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
    $preguntas = new stdClass();
    $IdPregunta = $obj->IdPregunta;
    $IdMateria = $obj->IdMateria;
    $pregunta = $obj->Pregunta;

    $varid = 'id' . $IdPregunta;
    $varpeso = 'Peso' . $IdPregunta;

    $array[] = array("IdPregunta" => $_GET[$varid], "Peso" => $_GET[$varpeso], "IdMateria" => $IdMateria);
}


$curl = new stdClass();
$curl->URL = "http://apache/ProyectoProlog/public/api/getDis";
$curl->VERBO = "GET";

$data = new cURLRequest();
$resultado = $data->ApiRest($curl);

$jsonres = json_decode($resultado->body);
$resultados = array();

foreach($jsonres as $val){
    $Id=$val->IdCarrera;
    $Resul = 0;
    foreach ($array as $value) {
        $array2 = json_decode(GetPesoMateria($value['IdMateria'],$Id));
        foreach ($array2 as $obj) {
            $varMat = $obj->Peso;
            $varPre = $value['Peso'];

            $Resul += CalcularPregunta($varMat,$varPre);
            
        }
        
    }
    CalculaResultado($Resul,$Id);
}




//var_dump($resultados);
function CalculaResultado($Resul,$id){
    $json = new stdClass();
    $json->IdCarrera = $id;
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
        $valorCarrera = (100 / $PesoTotal) * $Resul;
    }
    echo"
        
        <div class=\"container\" style=\"text-align:center;background-color:#245483;padding: 10px;color: #fff;width:$valorCarrera%;margin:10px auto;\">
            <h3>$Nombre: $valorCarrera%</h3>
        </div>
    ";
}

function CalcularPregunta($PesoPregunta, $PesoMateria)
{
    $var1=$PesoPregunta;
    $var2=$PesoMateria;
    
    $resultado = 0.0;
    if ($PesoPregunta != 0 || $PesoMateria != 0) {
        $resultado = ($var1 * $var2) / 10.0;
    }
    return $resultado;
}


function GetPesoMateria($idmateria,$idcarrera)
{
    $json = new stdClass();
    $json->IdMateria = $idmateria;
    $json->IdCarrera = $idcarrera;
    $respuestas = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getFinal";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();
    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);
    //var_dump(json_encode($jsonresultado));
    return json_encode($jsonresultado);
}
/*
function imprime(){
    header("location: ../View/resultados.php");
    echo"
            <div class=\"w3-third\">
                <div class=\"w3-card-4 w3-padding w3-center\">
                <img src=\"..\assets\images\primer.png\"  width=\"60%\">
                    <h2>$valorCarrera%</h2>
                    <p>
                    <br>
                        <h4>$Nombre</h4>
                        <br>
                    </p>
                </div>
            </div>";
}*/
?>