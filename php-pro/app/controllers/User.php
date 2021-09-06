<?php

namespace app\controllers;

class User {

    public function show($param){
        if(!isset($param['user'])){
            return redirect('/');die;
        }
        
    }

    public function create(){
        return [
            'view' => 'create.php',
            'data' => ['title' => 'Cadastro de usuário']
        ];
    }

    public function store()
    {
        $validate = validate([
            'name' => 'required',
            'email' => 'email|unique:user',
            'password' => 'required|maxlen'
        ]);

        if(!$validate){
            // var_dump($validate);
            return redirect('/user/create');
        }

        $validate["password"] = password_hash($validate["password"], PASSWORD_DEFAULT);
        
        $created = create('user',$validate);

        if(!$created)
            setFlash("message","Ocorreu um erro ao cadastrar, por favor tente novamente dentro de alguns segundos.");
            return redirect('/user/create');

        return redirect('/user/create');
    }

}