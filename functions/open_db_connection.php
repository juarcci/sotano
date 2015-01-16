<?php
    function open_db_connection($user, $password) {
    
        define("HOST", "localhost");
        define("DATABASE", "tiopepe");

        $link = mysqli_connect(HOST, $user, $password, DATABASE);

        if (mysqli_connect_errno()) {
            die("Fallo la conexion a la db: " . mysqli_connect_error . " (" . mysqli_connect_errno() . ")");
        }
        
        return $link;
    }
?>
