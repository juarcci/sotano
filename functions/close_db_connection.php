<?php
    function close_db_connection($result,$link) {
        
        mysqli_free_result($result);
        mysqli_close($link);

    }
?>