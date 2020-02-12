<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
    case '/':
        require './public/index.html';
        break;
    case '/api/emplois':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require('./controllers/EmploiController.php');
            $emploiController = new EmploiController();
            echo $emploiController->fetchAll();
        }
        break;
    case '/res/js':
        require './public/app.js';
        break;
    case '/res/img/dribbble':
        require './public/img/dribbble.png';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        require './public/404.html';
        break;
}
