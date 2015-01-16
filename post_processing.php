<?php
    // Este es el header de la pagina que procesa el formulario de login al blog
    require_once './functions/open_db_connection.php';
    // Se incluye la pagina que contiene la funcion para conectar a la db del blog
    $username="root";
    // Se toma el nombre de usuario desde el formulario llenado anteriormente en login
    $password="c0nf14n24";
    // Se toma el password desde el formulario llenado anteriormente en login
    $link=open_db_connection($username,$password);
    // Se pasan como parametros nombre de usuario y contraseña a la funcion que 
    // abre la conexion con la db. La conexion abierta se guarda en la variable
    // $link
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Procesando nueva entrada</title>
    </head>
    <body>
        <pre>
        <?php
            print_r($_POST);
            $titulo = $_POST['title'];
            $contenido = $_POST['content'];
            $insert = "INSERT INTO principal(titulo,contenido)";
            $insert .= "VALUES('{$titulo}','{$contenido}');";
            $result=  mysqli_query($link, $insert);
            echo "La nueva entrada se ha ingresado correctamente<br />";
        ?>
        </pre>
    </body>
</html>

<?php
         mysqli_close($link);
?>