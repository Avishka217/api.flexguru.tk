<?php
class Model
{
    public function __construct()
    {
    }

    public function response($code, $data)
    {
        header('Content-Type: application/json; charset=utf-8');
        $response = json_encode(['response' => ['status' => $code, "result" => $data]]);
        echo $response;
        exit;
    }
}
