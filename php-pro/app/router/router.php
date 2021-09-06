<?php

/**
 * MAKE ROUTERS
 */

function routers():array {
    return require 'routers.php';
}

/**
 * URI EXACT (URI NORMAL)
 */

function exactMatchUriArrayRouters($uri,$routers):array{

    return (array_key_exists($uri,$routers)) ? 
    [$uri => $routers[$uri]] : 
    [];
}

/**
 * URI DINAMIC
 */

function regularExpressionMatchArrayRoutes($uri,$routes):array
{
    return array_filter(
        $routes,
        function($value) use ($uri){
            $regex = str_replace('/','\/',ltrim($value,'/'));
            return preg_match("/^$regex$/",ltrim($uri,'/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

/**
 * TRATAMANT PARAMS
 */

function params($uri,$matchedUri):array{
    if(!empty($matchedUri))
        $mathedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/',ltrim($mathedToGetParams,'/'))
        );

    return [];
}


/**
 * FORMATING PARAMS
 */

function paramsFormat($uri,$params):array
{

    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }

    return $paramsData;

}

/**
 * ROUTER => STARTING A URI
 */

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    
    $routes = routers();
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $matchedUri = exactMatchUriArrayRouters($uri,$routes[$requestMethod]);

    $params = [];

    if(empty($matchedUri)){
        $matchedUri = regularExpressionMatchArrayRoutes($uri,$routes[$requestMethod]);
        $uri = explode('/',ltrim($uri,'/'));
        $params = params($uri,$matchedUri);
        $params = paramsFormat($uri,$params);     
    }     

    if(!empty($matchedUri)){
        return controller($matchedUri,$params);
    }

    
    throw new Exception("Página não encontrada!");

}