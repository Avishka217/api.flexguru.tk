<?php
class Chat extends Controller
{
    public function __construct()
    {
        $auth = new Auth;
        $auth->private();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            // $this->response(SUCCESS_RESPONSE, array('message' => 'Welcome to Chat API'));

            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('ChatModel')->setmsg($data);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, array('message' => "Message Sent Successfully."));
            } else {
                $this->response(SERVER_ERROR, array('message' => "Something went wrong."));
            }
        }
    }

    public function getchat()
    {
        // create a string using string arrray 
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('ChatModel')->getchat($data);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, $result);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
            }
        }
    }
}
