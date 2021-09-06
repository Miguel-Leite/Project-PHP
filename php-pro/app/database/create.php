<?php

function create($table, array $data):bool
{
    try {
        $connect = connect();

        $sql = "INSERT INTO {$table}(";
        $sql .= implode(',', array_keys($data)).") VALUES (";
        $sql .= ":". implode(",;",array_keys($data)).")";

        $prepare = $connect->prepare($sql);
        return $prepare->execute($data);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
}