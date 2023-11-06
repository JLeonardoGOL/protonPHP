<?php

try {
    include_once "./config.php";
    include_once "./config/core.php";
    include_once "./config/database.php";
    include_once "./config/routes.php";
    include_once "./routes/app.php";
    Config\Routes\App::run();
}catch (Exception $e){
    print json_encode($e->getMessage());
}