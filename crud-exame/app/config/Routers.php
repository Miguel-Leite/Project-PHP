<?php

namespace app\config;

use app\config\Config;
use ReflectionMethod;

class Routers {

    private $url = null;

    public $controller;

    public function __construct()
    {
        $this->url = $_REQUEST;
    }

    public function setUrl(){

        if(isset($this->url['url'])){
            
            $url = trim(rtrim($this->url['url'], '/'));
            $url = explode('/', $url);

            $this->url['url'] = $url;
            $controller_default = Config::CONTROLLER_DEFAULT;
            if(isset($this->url['url'][Config::CONTROLLER_INDEX])){
                $class = ucfirst($this->url['url'][Config::CONTROLLER_INDEX]);
                $controller = Config::NAMESPACE_CONTROLLER . ucfirst($this->url['url'][Config::CONTROLLER_INDEX]);
                $data = Config::ROUTERS;
                array_push($data, $controller_default);

                if(!in_array($class, $data)){
                    echo "Controller ". $class ." não existe!";
                    exit();
                }
                
                if(class_exists($controller)){

                    $controller = new $controller();

                    if(isset($this->url['url'][Config::METHOD])){
                        
                        $method = strtolower($this->url['url'][Config::METHOD]);

                        if(method_exists($controller,$method)){

                            $methodClass = new  ReflectionMethod($controller,$method);
                            
                            $methodInfo = $methodClass->getNumberOfParameters();
                            
                            if($methodInfo == 0){
                                $controller->$method();
                                exit();
                            } else{
                                try {
                                    array_shift($this->url['url']);
                                    array_shift($this->url['url']);
                                    call_user_func_array(array($controller,$method), $this->url['url']);
                                } catch (\Exception $ex) {
                                    return "Não foi possível accessar a página!";
                                }
                            }
                            

                        } else {
                            echo "O metodo ".$method." passado não existe!";
                        }
                        
                    } else {
                        if(method_exists($controller, 'index')){

                            $controller->index();
                            exit();
                        }
                    }


                } else {
                    echo "Controllador ". $class." não foi definido!";
                    exit();
                }
                
            }
        }else {
            $controller = Config::NAMESPACE_CONTROLLER.Config::CONTROLLER_DEFAULT;
            $method = Config::METHOD_DEFAULT;

            $controller_default = new $controller();
            $controller_default->$method();

        }           
    }

    public function run()
    {
        $this->setUrl();
    }

}