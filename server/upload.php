<?php
    include("session.php");

    header('Content-type: text/html; charset=UTF-8');

    function ru_to_en($str) {

        $rus = array(
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 
            'Ё', 'Ж', 'З', 'И', 'Й', 'К', 
            'Л', 'М', 'Н', 'О', 'П', 'Р', 
            'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 
            'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 
            'Э', 'Ю', 'Я', 'а', 'б', 'в', 
            'г', 'д', 'е', 'ё', 'ж', 'з', 
            'и', 'й', 'к', 'л', 'м', 'н', 
            'о', 'п', 'р', 'с', 'т', 'у', 
            'ф', 'х', 'ц', 'ч', 'ш', 'щ', 
            'ъ', 'ы', 'ь', 'э', 'ю', 'я'
        );

        $lat = array(
            'A', 'B', 'V', 'G', 'D', 'E', 
            'E', 'Gh', 'Z', 'I', 'Y', 'K', 
            'L', 'M', 'N', 'O', 'P', 'R', 
            'S', 'T', 'U', 'F', 'H', 'C', 
            'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 
            'E', 'Yu', 'Ya', 'a', 'b', 'v', 
            'g', 'd', 'e', 'e', 'gh', 'z', 
            'i', 'y', 'k', 'l', 'm', 'n', 
            'o', 'p', 'r', 's', 't', 'u', 
            'f', 'h', 'c', 'ch', 'sh', 'sch', 
            'y', 'y', 'y', 'e', 'yu', 'ya'
        );

        return str_replace($rus, $lat, $str);
    }

    if (session_pass($link)) {

        if (isset($_FILES['file'])) { 

            for ($i = 0; $i < count($_FILES['file']['name']) ; $i++) {
                
                $file_name = str_replace(' ','_', strtolower(ru_to_en($_FILES['file']['name'][$i])));
                $file_size = $_FILES['file']['size'][$i];
                $file_tmp = $_FILES['file']['tmp_name'][$i];
                // $file_type = $_FILES['file']['type'][$i];
                $ext = explode(".", $file_name);
                $file_ext = end($ext);

                $uploaddir = "$path/$login/";
                
                // если размер файла больше 200мб
                if ($file_size < 1677721600) { 
                    // ТУТ ПЕРЕДЕЛАТЬ В SQL сделать функции 
                    // работа с памятью при загрузке(считаем оставшееся 
                    // место и сравниваем с текущим значением файла)
    
                    $query = "SELECT total_space FROM users WHERE id='$id'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result, MYSQLI_NUM);
                    $total_space = $row[0];
    
                    $query = "SELECT SUM(size) FROM data WHERE id='$id'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result, MYSQLI_NUM);
                    $empty_space = $total_space - $row[0];
    
                    if ($empty_space > $file_size) {

                        $query = "SELECT name FROM data WHERE id='$id'";
                        $result = mysqli_query($link, $query);
                        $rows = mysqli_num_rows($result);

                        if ($rows != 0) {

                            for ($i = 0; $i < $rows; $i++) {
                                $files_list[$i] = mysqli_fetch_row($result)[0];
                            }

                            $i = 1;
                            $flag = 0;

                            while (in_array($file_name, $files_list)) {
                                $ex = explode('.', $file_name);

                                if ($flag == 0) {
                                    $ex[count($ex) - 2] = $ex[count($ex) - 2].$i;
                                    $file_name = implode('.', $ex);
                                    $flag = 1;
                                }

                                if ($flag == 1) {
                                    $ex[count($ex) - 2] = substr($ex[count($ex) - 2], 0, -1).$i;
                                    $file_name = implode('.', $ex);
                                }
                                $i++;
                            }
                            unset($i);
                        }

                        $file_basename = basename($file_name); 
                        $uploadfile = $uploaddir . $file_basename;

                        if (move_uploaded_file($file_tmp, $uploadfile)) {

                            $query = "INSERT INTO data (id, name, type, size) VALUES ('$id', '$file_name', '$file_ext', '$file_size')";
                            $result = mysqli_query($link, $query);
    
                            $empty_space -= $file_size;
    
                            $query = "UPDATE users SET free_space ='$empty_space' WHERE id='$id'";
                            $result = mysqli_query($link, $query);
                            
                            // echo json_encode("{"file": {"name": "$file_basename", "type: "$file_ext"}"}");
                            $cur_data = array("name" => "$file_basename", "type" => "$file_ext");
                            echo json_encode($cur_data);
                            exit;
                        }
                    } 
                }
            }
        }
    }
    else {
        // header("Location: ".$path."/data/sign_in.php");
        exit;
    }
    close_connnection($result, $link);
?>