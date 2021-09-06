<?php

function all($table, $fields = '*'){
    try {
        $connect = connect();

        $query = $connect->query("SELECT {$fields} FROM {$table}");
        return $query->fetchAll();

    } catch (PDOException $e) {
        var_dump($e->getMessage()); 
    }
}

function findBy($table, $value, $field = "*"){
    try {
        $connect = connect();

        $prepare = $connect->prepare('SELECT {$field} FROM {$table} WHERE {$field} = : {$field}');
        $prepare->execute([
            $field => $value  
        ]);
        return $prepare->fetch();
    } catch (PDOException $e) {
        var_dump($e->getMessage()); 
    }
}