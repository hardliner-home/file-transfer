<?php

    $routes = [
        'GET' => [
            '/' => 'main',
            '/about' => 'about',
            '/logout' => 'logout',
            '/sign_up' => 'sign_up',
            '/api/user/get_files' => 'get_files',
            '/api/user/download/(/w+)' => 'download' // -
        ],
        'POST' => [
            '/api/sign_in' => 'sign_in',
            '/api/user/upload' => 'upload',
            '/api/user/delete' => 'delete',
            '/api/register' => 'register' // -
        ],
        'DELETE' => [
            '/api/user/delete/(/w+)' => 'delete', // -
        ]
    ];


    // // Получение данных из тела запроса
    // function getFormData($reqType) {

    //     // GET или POST: данные возвращаем как есть
    //     if ($reqType === 'GET') return $_GET;
    //     if ($reqType === 'POST') return $_POST;

    //     // PUT, PATCH или DELETE
    //     $data = array();
    //     $exploded = explode('&', file_get_contents('php://input'));

    //     foreach($exploded as $pair) {
    //         $item = explode('=', $pair);
    //         if (count($item) == 2) {
    //             $data[urldecode($item[0])] = urldecode($item[1]);
    //         }
    //     }
    //     return $data;
    // }


    $reqType = $_SERVER['REQUEST_METHOD'];
    $eligibleRoutes = $routes[$reqType];

    // $formData = getFormData($reqType);
    // $qString = "/".implode($formData);

    $qString = "/".trim($_SERVER['QUERY_STRING'], "q=");

    function getMethod($eligibleRoutes, $qString) {
        foreach ($eligibleRoutes as $route => $method) {
            if ($qString == $route) {
                return $method;
            }
        }
        return 'not_found';
    }

    function main() {
        require('../client/main.php');
    }

    function about() {
        require('../client/about.php');
    }

    function not_found() {
        header("HTTP/1.0 404 Not Found");
        return 'Нет такой страницы';
    }
    
    function sign_in() {
        require_once('login.php');
    }

    function get_files() {
        require_once('read.php');
    }

    function upload() {
        require_once('upload.php');
    }

    // function download() {
        // require_once('download.php');
        // header("Location: http://localhost/123/server/download.php");
    // }

    function delete() {
        require_once('delete.php');
    }

    function logout() {
        require_once('logout.php');
    }

    function register() {
        require_once('register.php');
    }

    // function sign_up() { // тут вопросики по возвращенному файлу
        // echo 'sign_up';
        // require('../client/sign_up.php');
        // header("Content-Type: text\html");
        // header("Location: http://localhost/123/server/sign_up"); //
    // }

    $method = getMethod($eligibleRoutes, $qString);
    echo $method();
?>