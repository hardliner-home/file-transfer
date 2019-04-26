<?php
    session_start();
    include_once("data_base.php");
    session_destroy();
    // header("Location: ".$net_path."/data/sign_in.php");
    exit;
?>