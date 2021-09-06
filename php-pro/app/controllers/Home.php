<?php

namespace app;

class Home {

    public function index(){

        $users = all('user');
        return [
            'view' => 'home.php',
            'data' => ['users' => $users]
        ];
    }

}