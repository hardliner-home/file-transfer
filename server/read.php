<?php
    include_once("session.php");

    if (session_pass($link)) {         

        $query = "SELECT name, type, size FROM data WHERE id='$id'";
        $result = mysqli_query($link, $query);
        $rows = mysqli_num_rows($result); // количество полученных строк
        if ($rows != 0) {
            $json = array();
            for ($i = 0; $i < $rows; $i++) { // пееребор данных

                $row = mysqli_fetch_row($result);
                for ($j = 0 ; $j < 3 ; ++$j) {
                    
                    switch ($j) {
                        case 0:
                            $json['file'][$i]['name'] = $row[$j];
                            break;
                        case 1:
                            $json['file'][$i]['type'] = $row[$j];
                            break;
                        case 2:
                            $json['file'][$i]['size'] = $row[$j];
                            break;
                    }
                }
            }
            echo json_encode($json);
        }
    }
    else {
        header("Location: http://localhost/123/client/sign_in.php");
        exit;
    }
    close_connnection($result, $link);
?>