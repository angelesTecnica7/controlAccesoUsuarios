<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="https://formsubmit.co/angeles@tecnica7.edu.ar" method="POST" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="nombre usuario" required>
        <input type="email" name="email" placeholder="correo electronico">
        <input type="file" name="attachment" accept="image/*">
          <!-- campos de configuracion -->
          <input type="hidden" name="_subject" value="Importante! validación de correo">
          <input type="hidden" name="_captcha" value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_next" value="http://localhost/1_2023/SistControlAccesoUsuarios/form_registro_html.php?send=1">
          
        <button type="submit">Send</button>
   </form>
   <?php
   if(isset($_GET['send'])){
       echo "<h2>Consulta enviada, en breve nos comunicaremos con usted</h2>";    
   }
   ?>
</body>
</html>