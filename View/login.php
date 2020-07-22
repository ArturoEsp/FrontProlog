


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body class="bg-login">
   <div class="form-login">
       <div class="text-login">
        <img src="../assets/images/iniciar-sesion.png">
           <h2>Acceso Restringido</h2>         
           <span>Ingresa tu cuenta</span>
       </div>

       <form action="..\Controller\validation.php?" method="POST">
            <div class="components">     
                <label>Usuario</label>
                <input class="input-text-login" name="Usuario" type="text"  required>
                <br><br>
                <label>Contraseña</label>
                <input class="input-text-login" type="password" name="Contrasena" required>

                <input type="submit" value="Ingresar" class="btnlogin">   
                <a class="forgot-pass" href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
   </div>
</body>
</html>