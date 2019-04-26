<?php    
    include("session.php");

    # Проверяем наличие сессии и проверяем ее на правильность
    # после примим из POST имя файла и загрузим его

    if (session_pass($link)) {

        if (isset($_GET['file'])) {

            $file_name = $_GET['file'];
            $file = "$path/$login/$file_name";
            var_dump($file);

            if (file_exists($file)) {

                # сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
                # если этого не сделать файл будет читаться в память полностью!

                if (ob_get_level()) {
                    ob_end_clean();
                }

                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));

                if (readfile($file)) {
                    $error = "0";
                }
                header("Location: http://localhost/123/server/index.php");
                exit;
            }
        }     
    }
    else {
        header("Location: http://localhost/123/server/sign_in.php");
        exit;
    }
?>