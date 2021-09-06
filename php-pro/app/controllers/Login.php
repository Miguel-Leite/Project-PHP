<?php

namespace app\controllers;

class Login {

    public function index(){

        return [
            'view' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }

    public function store(){
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);

        if(empty($email) || empty($password)){
            return setMessageAndRedirect('message','Por favor preencha o campo vázio do formulário.','/login');
        }

        $user = findBy('user','email',$email);
        
        if(!$user){
            return setMessageAndRedirect('message','Email ou senha estão incorretos.','/login');
        }

        if(!password_verify($password,$user['password'])){
            return setMessageAndRedirect('message','Email ou senha estão incorretos.','/login');
        }

        $_SESSION['logged'] = $user;
        return redirect('/');
    }

    public function destroy()
    {
        unset($_SESSION[LOGGED]);

        return redirect('/');
    }

}