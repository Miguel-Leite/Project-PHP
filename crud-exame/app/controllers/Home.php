<?php

namespace app\controllers;
use app\controllers\BaseController;

class Home extends BaseController{

    public function index() {
        
        $data['title'] = 'Welcome';
        
        $this->views('welcome', $data);
    }

    public function user($id) {
        $data['title'] = 'Welcome';
        
        $this->views('welcome', $data);
    }
}