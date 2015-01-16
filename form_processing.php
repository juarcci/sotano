<?php
    // Este es el header de la pagina que procesa el formulario de login al blog
    require_once './functions/open_db_connection.php';
    // Se incluye la pagina que contiene la funcion para conectar a la db del blog
    $username=$_POST['username'];
    // Se toma el nombre de usuario desde el formulario llenado anteriormente en login
    $password=$_POST['password'];
    // Se toma el password desde el formulario llenado anteriormente en login
    $link=open_db_connection($username,$password);
    // Se pasan como parametros nombre de usuario y contraseña a la funcion que 
    // abre la conexion con la db. La conexion abierta se guarda en la variable
    // $link
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sotano Blog</title>
    </head>
    <body>
        <h1>Blog de El Sotano Rock</h1>
        <a href="new_post.php">Nueva entrada</a>
        <?php
            $query="SELECT * FROM principal ORDER BY idprincipal DESC";
            // Query sobre la db
            $result = mysqli_query($link, $query);
            // Se guarda en la variable $result el resultado de la query 
            // anteriormente ejecutada.
        ?>
        <?php
            while ($fila = mysqli_fetch_assoc($result)){ 
                    foreach($fila as $atrib => $dato) {
                        switch ($atrib) {
                            case "idprincipal":
                                break;
                            case "titulo":
                                echo "<h2>{$dato}<br /></h2>";
                                break;
                            case "contenido":
                            case "fecha":
                                echo "{$dato}<br /><br />";
                                break;
                        }
                    }
                    echo "<hr />";       
            }
            // Con este bucle While se exhibe el contenido del array generado
            // a partir de la query realizada anteriormente.
        ?>
    </body>
</html>

<?php
    require_once './functions/close_db_connection.php';
    // Se incluye a la pagina que contiene a la funcion que libera los resultados
    // de la query y a la que cierra la conexion con la db.
    close_db_connection($result,$link);
    // Se ejecuta la función de liberación de resultados ($result) y 
    // cierre de la db ($link).
?>

