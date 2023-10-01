<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<div class="contenedor">
    <form action="" method="post">
        <h2>Login</h2>
        <label for="email">email</label>
        <input type="email" name="email" id="email">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" name="ingresar" value="INGRESAR">
    </form>
    <a href="form_registro.html"> registrarse </a>
    <?php
    if(isset($_POST['ingresar'])){
        session_start();
        require_once('includes/conexion.php');
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND token = 1";
        $query = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($query)>0){
            $registro = mysqli_fetch_array($query);
            if(password_verify($pass,$registro['contrasenia'])){
                    $_SESSION['usuario'] = $registro['nombre'];
                    header('location:inicio.php');
            }else{
                    echo "Contraseña incorrecta";
                    session_destroy();
                    }
        }else{
            echo '<div class="error">usuario no existe o no esta validado</div>';
            session_destroy();
        }
    }
    ?>
    </div>
</body>
</html>

