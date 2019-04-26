<?php
    include_once("data_base.php");
    // ini_set('display_errors','off');
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    $salt = "abcdefghijklmnopqrstyvwxyz";
    $hash = md5("$password"."$salt");

    $query = "INSERT INTO users (login, password, hash, path) VALUES ('$login', '$password', '$hash', '$login')";
    if ($result = mysqli_query($link, $query)) {

        // если зарегистрировались = переходим на страницу входа
        // + создаем директорию пользователя на сервере

        mkdir("$path/$login", 0777);

        // header("Location: ".$net_path."/data/sign_in.php");
        echo "sign_in.php";
        exit;
    }
    else {
        // ошибка регистрации
    }
    close_connnection($result, $link);
?>