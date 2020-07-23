<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Vocacional</title>
</head>



<body>
    <?php include 'menu-header.html'; ?>

    <div class="contenedor-preguntas">
        <h2>Test Vocacional</h2>
        <span>Contesta las preguntas sobre tus habilidades personales</span>

        <div class="form-preguntas">
            <form>
                <label value="" name="Pregunta" class="label-pregunta">¿Te gusta la matemáticas?</label>
                <div class="range-wrap" style="width: 100%;">
                    <input type="range" class="range" min="0" max="10" step="1">
                    <output class="bubble"></output>
                </div>

                <label value="" name="Pregunta" class="label-pregunta">¿Te gusta la fisica?</label>
                <div class="range-wrap" style="width: 100%;">
                    <input type="range" class="range" min="0" max="10" step="1">
                    <output class="bubble"></output>
                </div>
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