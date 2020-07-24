<?php
include_once 'cURLRequest.php';

if (isset($_POST['Pregunta']) && ($_POST['Materia']) != 0){

    $json = new stdClass();
    $json->IdMateria = $_POST["Materia"];
    $json->Pregunta = $_POST["Pregunta"];
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/setpreguntas";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);

    header('Location: ../View/base-conocimientos.php');
}else{
    header('Location: ../View/base-conocimientos.php');
}
?>