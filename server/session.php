<?php
    session_start();
    include_once("data_base.php");

    $session_data = get_session_data(); 
    $id = $session_data['id'];
    $login = $session_data['login'];

    function get_session_data() {
        $array = array("id" => $_SESSION['id'], "login" => $_SESSION['login']);
        return $array;
    }

    function session_pass($link) {

        if (isset($_SESSION['id'])) {

            $session_data = get_session_data();
            $id = $session_data['id'];
            $login = $session_data['login'];
    
            $query = "SELECT id FROM users WHERE login='$login'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
    
            if ($id == $row[0]) {
                return true;
            }
        } 
        return false;
    }
?>