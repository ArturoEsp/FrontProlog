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
                <input value="¿Te gusta la matemáticas?" name="1" class="label-pregunta">

                <div class="range-wrap" style="width: 100%;">
                    <input type="range" class="range" min="50" max="60" step="2">
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

        // Sorta magic numbers based on size of the native UI thumb
        bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
    }
</script>

</html>