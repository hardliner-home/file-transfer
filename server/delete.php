<?php    
    include("session.php");

    if (session_pass($link)) {

        if (isset($_POST['file'])) {

            $file_name = $_POST['file'];
            $file = "$path/$login/$file_name";

            if (file_exists($file)) {
                
                $query = "DELETE FROM data WHERE name='$file_name'";
                $result = mysqli_query($link, $query);
                unlink($file);

                $query = "SELECT total_space FROM users WHERE id='$id'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                $total_space = $row[0];

                $query = "SELECT SUM(size) FROM data WHERE id='$id'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                $empty_space = $total_space - $row[0];
    
                $query = "UPDATE users SET free_space ='$empty_space' WHERE id='$id'";
                $result = mysqli_query($link, $query);

                echo "delete => ok";
            }
        }     
    }
    else {
        header("Location: http://localhost/123/server/sign_in.php");
        exit;
    }
?>