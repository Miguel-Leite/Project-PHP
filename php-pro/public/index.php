<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once 'bootstrap.php';

// $uri = $_SERVER['REQUEST_URI'];
// var_dump($uri);die;

try {
    
    $data = router();
    
    if(!isset($data['data']))
        throw new Exception("Não foi definido o índice data.");

    extract($data['data']);

    if(!isset($data['view'])){
        throw new Exception("Não foi definido o indice view!");
    }

    if(!file_exists(VIEWS.$data['view'])){
        throw new Exception("View {$data['view']} não existe.");
    }

    $view = $data['view'];

    require VIEWS.$view;

} catch (Exception $e) {
    var_dump($e->getMessage());
}