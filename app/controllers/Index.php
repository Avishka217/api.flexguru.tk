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

    public function getStudent()
    {
        $student = $this->model("StudentModel");
        $data = $student->getStudentByUserID("127");
        $this->response(SUCCESS_RESPONSE, $data[0]);
    }
}
