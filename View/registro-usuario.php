<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Registrar Usuario</title>
</head>
<body>
    <?php
include 'menu-header.html';
?>
    <div class="container-form">
        <h2>Registrar nuevo usuario</h2>
        <span>Ingresa tus datos correspondientes</span>
        <br>
        <div class="form-principal">
            <form class="frm" action="..\Controller\validation.php?option=login">
                <div class="input-field">
                    <label>Nombre</label>
                    <input type="text" value="" maxlength="30" class="input-text">
                </div>

                <div class="input-field">
                    <label>Usuario</label>
                    <input type="text" value="" maxlength="15" class="input-text">
                </div>

                <div class="input-field">
                    <label>Contraseña</label>
                    <input type="password" value="" maxlength="15" class="input-text">
                </div>

                <input type="submit" value="Registrarse" class="btn-form">
                
            </form>
        </div>
    </div>

</body>
</html>