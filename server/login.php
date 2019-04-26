<?php
    session_start();
    include_once("data_base.php");

    $login = $_POST["login"];
    $password = $_POST["password"];
    
    $query = "SELECT COUNT(id), id, path FROM users WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    if ($row[0] == 1) {
        
        // Такой пользвотель есть
        // Нужно записать данные в сессиию($_SESSION) и, если нужно, куки($_COOKIE)

        $_SESSION['id'] = $row[1];
        $_SESSION['path'] = $row[2];
        $_SESSION['login'] = $login;

        header("Content-Type: application/json");
        echo json_encode(["require" => "true"]);
        // ответ - окэй
    }
    else {
        header("Content-Type: application/json");
        echo json_encode(["require" => "false"]);
        // ответ - отказ
    }
    close_connnection($result, $link);

