<?php

function validate(array $validations)
{
    $result = [];
    $param = null;
    foreach ($validations as $field => $validate) {
        $result[$field] = (!str_contains($validate,'|')) ?
                        singleValidation($validate,$field,$param) :
                        multipleValidations($validate,$field,$param);
    }
    
    if(in_array(false,$result)){
        return false;
    }

    return $result;
}

function singleValidation($validate,$field,$param){
    if(str_contains($validate,':')){
        list($validate,$param) = explode(':',$validate);
    }
    
    return $result[$field] = $validate($field,$param);
}

function multipleValidations($validate,$field,$param){

    $explodePipeValidate = explode('|',$validate);

    foreach ($explodePipeValidate as $validate) {
        if(str_contains($validate,':')){
            list($validate,$param) = explode(':',$validate);
        }
        $result = $validate($field,$param);
    }
    return $result;
}

function required($field)
{
    if($_POST[$field] == ''){
        setFlash("message","O campo {$field} é obrigatório!");
        return false;
    }

    return filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
}

function email($field)
{
    $emailIsValid = filter_input(INPUT_POST,$field,FILTER_VALIDATE_EMAIL);

    if(!$emailIsValid){
        setFlash("message","O email {$emailIsValid} não é válido!");
        return false;   
    }

    return filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);

}

function unique($field,$param){
    $data = filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
    $email = findBy($param,$field,$data);

    if($email){
        setFlash("message","Este email já esta cadastrado!");
        return false;
    }
}

function maxlen($field,$param){

    $data = filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRING);
    // var_dump($field);
    if(strlen($field) > $param)
    {
        setFlash("message","Este campo não pode passar de {$param} caracteres!");
        return false;
    }

    return $data;
}