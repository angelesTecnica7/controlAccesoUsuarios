<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario</title>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 
</head>
<body>
    <?php
    if(isset($_POST['registrar'])){
    require_once('includes/conexion.php');
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $email = $_POST['email'];
    $token_val = time();

    $foto = "silueta.jpg";

    $sql_insert = "INSERT INTO usuarios (foto, nombre, contrasenia, email, token) VALUES ('$foto', '$usuario', '$contrasenia', '$email', '$token_val')";
    $insert = mysqli_query($conexion, $sql_insert) ? print('<script>alert("usuario registrado")</script>') : print('<script>alert("ERROR usuario NO registrado")</script>');
    ?>

<script>
    let url_final = 'https://formsubmit.co/ajax/<?php echo $email; ?>'
    let usuario = '<?php echo $usuario; ?>'
    let mensaje = 'valide su correo:  http://localhost/1_2023/SistControlAccesoUsuarios/registrar.php?token=<?php echo $token_val; ?>'
  
    $.ajax({
    method: 'POST',
    url: url_final,
    dataType: 'json',
    accepts: 'application/json',
    data: {
        name: usuario,
        message: mensaje,
    },
    success: (data) => window.location = 'registrar.php?send=1',
    error: (err) => window.location = 'registrar.php?send=0'
    });
   
</script>
<?php
    }
    if(isset($_GET['send'])){
        if($_GET['send']==1){
           echo "<h2>registro exitoso, dirijase a su correo electronico para validarlo</h2>";
        }else{
            echo "No se ha podido enviar el correo de verificación, por favor intentelo nuevamente";
        }
    }

    if(isset($_GET['token'])){
        echo "usuario validado, ya puede operar el sistema";
    }
?>
</body>
</html>
