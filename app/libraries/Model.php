<?php
class Model
{
    public function __construct()
    {
    }

    public function response($code, $data)
    {
        header("content-type: application/json");
        $response = json_encode(['resonse' => ['status' => $code, "result" => $data]]);
        echo $response;
        exit;
    }
}
