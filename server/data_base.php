<?php

    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "file-transfer");

    $path = "C:/Server/data/htdocs/123/server/user_data";
    $n_path = "http://localhost/123/server/user_data";
    
    function close_connnection($result, $link) {
        mysqli_free_result($result);
        mysqli_close($link);
        return true;
    }
?>