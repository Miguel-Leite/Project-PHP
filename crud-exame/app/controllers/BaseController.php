<?php

namespace app\controllers;

class BaseController{

    public function views($file, $data = array()){
        $directory = '.'. DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR . $file . '.php';
        $file = $directory;

        if(file_exists($file)){
            require $file;
        }
    }

    public static function link_css($link){
        $directory = '.'. DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'css'. DIRECTORY_SEPARATOR . $link . '.css';
        $file = str_replace('\\', '/', $directory);
        if(file_exists($file)){
            echo '<link rel="stylesheet" href="'. $file .'">';
        }
    }

    public static function link_js($link){
        $directory = '.'. DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'js'. DIRECTORY_SEPARATOR . $link . '.js';
        $file = str_replace('\\', '/', $directory);
        if(file_exists($file)){
            echo '<script src="'. $file .'"></script>';
        }
    }

}