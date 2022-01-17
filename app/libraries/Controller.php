<?php

class Controller
{
    public function __construct()
    {
    }

    public function model($model)
    {
        //Require model file
        require_once '../app/models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("Request can not be made!");
        }
    }

    public function response($code, $data)
    {
        header('Content-Type: application/json; charset=utf-8');
        $response = json_encode(['response' => ['status' => $code, "result" => $data]]);
        echo $response;
        exit;
    }
}
