<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Vocacional</title>
</head>



<body>
    <?php include 'menu-header.html'; ?>
    <?php include_once '../Controller/cURLRequest.php';?>
    
    <div class="contenedor-preguntas">
        <h2>Test Vocacional</h2>
        <span>Contesta las preguntas sobre tus habilidades personales</span>

        <div class="form-preguntas">
            <form>
                <?php
                
                    $json = new stdClass();
                    $curl = new stdClass();
                    $curl->URL = "http://apache/ProyectoProlog/public/api/getpreguntas";
                    $curl->VERBO = "GET";
                    $curl->DATA = json_encode($json);
                
                    $data = new cURLRequest();
                    $resultado = $data->ApiRest($curl);

                    $jsonresultado = json_decode($resultado->body);
                
                    //$respuestas = new stdClass();
                    $array = [];
                    echo"<form action=\"../Controller/respuestas.php\" method=\"POST\">";
                    foreach ($jsonresultado as $obj) {
                        $IdPregunta = $obj->IdPregunta;
                        $IdMateria = $obj->IdMateria;
                        $pregunta = $obj->Pregunta;
                        echo
                            "
                                <label value=\"\" name=\"Pregunta\" class=\"label-pregunta\">$IdPregunta. $pregunta</label>
                                <div class=\"range-wrap\" style=\"width: 100%;\">
                                    <input type=\"range\" name=\"PesoRespuesta\" class=\"range\" min=\"0\" max=\"10\" step=\"1\">
                                    <output class=\"bubble\"></output>
                                </div>
                                
                            ";
                        $array[] = array("IdPregunta"=>$IdPregunta,"PesoRespuesta"=>$_POST['PesoRespuesta']);
                        
                    }
                    echo"       <input type=\"submit\" value=\"Ingresar\" class=\"btnlogin\">
                            </form>";
                    var_dump($array);
                ?>
            </form>
        </div>
    </div>


</body>

<script>
    const allRanges = document.querySelectorAll(".range-wrap");
    allRanges.forEach(wrap => {
        const range = wrap.querySelector(".range");
        const bubble = wrap.querySelector(".bubble");

        range.addEventListener("input", () => {
            setBubble(range, bubble);
        });
        setBubble(range, bubble);
    });

    function setBubble(range, bubble) {
        const val = range.value;
        const min = range.min ? range.min : 0;
        const max = range.max ? range.max : 10;
        const newVal = Number(((val - min) * 10) / (max - min));
        bubble.innerHTML = val;

        if (val > 8) {
            bubble.innerHTML = "Simona la mona"; //Siempre
        } else if (val >= 7) {
            bubble.innerHTML = "sip"; //De Acuerdo
        } else if (val >= 4) {
            bubble.innerHTML = "Hay maso"; // A veces
        } else if (val >= 1) {
            bubble.innerHTML = "nel krnal"; // En desacuerdo
        } else {
            bubble.innerHTML = "nelson mandela"; //Nunca
        }

        // Sorta magic numbers based on size of the native UI thumb

    }
</script>

</html>