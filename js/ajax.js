window.onload = function () {
    //alert("cargado...");
    LoadMaterias();
    LoadCarreras();
    LoadCarreraMaterias();
    LoadTableCarreraMaterias();
    LoadTablePreguntas();
    LoadMateriasSelect();
}

function LoadMaterias() {
    $.ajax({
        url: '../Controller/queryMateria.php',
        type: 'POST',
        beforeSend: function () {
            $("#msg-materias").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#table-materias").html(response);
            $("#msg-materias").html("");
        }
    });
}

function LoadCarreras() {
    $.ajax({
        url: '../Controller/queryCarrera.php',
        type: 'POST',
        beforeSend: function () {
            $("#msg-carreras").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#table-carreras").html(response);
            $("#msg-carreras").html("");
        }
    });
}


function InsertarCarrera(nombre) {
    var parametros = {
        "Nombre": nombre
    };
    $.ajax({
        data: parametros,
        url: '../Controller/carreras.php',
        type: 'POST',
        beforeSend: function () {
            $("#msg-carreras").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#msg-carreras").html("Registro insertado correctamente.");
            LoadCarreras();
        }
    });
}


function InsertarMateria(nombre) {
    var parametros = {
        "NombreMateria": nombre
    };
    $.ajax({
        data: parametros,
        url: '../Controller/materias.php',
        type: 'POST',
        beforeSend: function () {
            $("#msg-materias").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#msg-materias").html("Registro insertado correctamente.");
            LoadMaterias();
        }
    });
}

function LoadCarreraMaterias() {
    var parametros = {
        'select': '1'
    };
    $.ajax({
        data: parametros,
        url: '../Controller/queryCarreraMaterias.php',
        type: 'POST',
        beforeSend: function () {
            // $("#msg-carreras").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#CarreraMaterias").html(response);
            $("#CarreraMaterias2").html(response);
        }
    });
}

function LoadMateriasSelect() {
    var parametros = {
        'select': 'materias'
    };
    $.ajax({
        data: parametros,
        url: '../Controller/queryCarreraMaterias.php',
        type: 'POST',
        beforeSend: function () {
            // $("#msg-carreras").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#idMateria2").html(response);
        }
    });
}

function LoadTableCarreraMaterias() {
    var parametros = {
        'table': '1'
    };
    $.ajax({
        data: parametros,
        url: '../Controller/queryCarreraMaterias.php',
        type: 'POST',
        beforeSend: function () {
            $("#table-carreramaterias").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#table-carreramaterias").html(response);
            //LoadCarreras(); 


        }
    });
}

function InsertarCarreraMateria(idcarrera, idmateria, peso) {

    var parametros = {
        "IdCarrera": idcarrera,
        "IdMateria": idmateria,
        "Peso": peso
    };
    $.ajax({
        data: parametros,
        url: '../Controller/CarreraMateria.php',
        type: 'POST',
        beforeSend: function () {

        },
        success: function (response) {
            LoadTableCarreraMaterias();
        }
    });
}


function LoadTablePreguntas() {
    var parametros = {
        'table': '1'
    };
    $.ajax({
        data: parametros,
        url: '../Controller/queryPreguntas.php',
        type: 'POST',
        beforeSend: function () {
            $("#table-preguntas").html("Procesando, espere por favor");
        },
        success: function (response) {
            $("#table-preguntas").html(response);

        }
    });
}

function InsertarPregunta(idmateria, pregunta) {
    var parametros = {
        'IdMateria': idmateria,
        'Pregunta': pregunta,
        'add': '1'
    };
    $.ajax({
        data: parametros,
        url: '../Controller/queryPreguntas.php',
        type: 'POST',
        beforeSend: function () {
            $("#msg").html("Procesando, espere por favor");
        },
        success: function (response) {
            LoadTablePreguntas();
        }
    });
}

function EliminarPregunta(id){
    var parametros = {
        'IdPregunta': id,
        'delete': '1'
    };
    $.ajax({
        data: parametros,
        url: '../Controller/queryPreguntas.php',
        type: 'POST',
        beforeSend: function () {
            $("#msg").html("Procesando, espere por favor");
        },
        success: function (response) {
            LoadTablePreguntas();
        }
    });
}