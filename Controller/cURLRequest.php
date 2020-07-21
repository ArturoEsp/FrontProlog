<?php

class cURLRequest{

    public function ApiRest($query){

        $ch = curl_init();        
        $optArray = array(
            CURLOPT_URL =>$query->URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST=>$query->VERBO,
            CURLOPT_POSTFIELDS=>$query->DATA,
            CURLOPT_HTTPHEADER=>array('Content-type: application/json'),
        );         
        $response = new stdClass();
        curl_setopt_array($ch, $optArray);   
        $response->body = curl_exec($ch);        
        $response->responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);  
        return $response;     
    }



}

?>