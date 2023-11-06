<?php

use Config\Database\Database;

function show($print)
{
    if (is_array($print)):
        print json_encode($print);
    else:
        print $print;
    endif;
}

function show_db($query = "", $array = [])
{
    $conn = new Database();
    $conn = $conn->Query();
    $data = $conn->prepare($query);
    $data->execute($array);
    return $data->fetchAll(PDO::FETCH_ASSOC);
}

function action_db($query = "", $array = [])
{
    $conn = new Database();
    $conn = $conn->Query();
    $data = $conn->prepare($query);
    $data->execute($array);
    return true;
}