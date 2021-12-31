<?php
class Index extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('home');
    }

    public function test()
    {
        $response = $this->model("Main");
        $response->test();
    }
}
