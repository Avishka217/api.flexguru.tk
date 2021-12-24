<?php

class Validation extends Controller
{
    private $validate;
    public function __construct()
    {
        $auth = new Auth;
        $auth->private();
        $this->validate = $this->model("Validate");
    }

    public function email()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->validate->email($data['email'])) {
                echo json_encode(array('status' => false));
            } else {
                echo json_encode(array('status' => true));
            }
        } else {
            echo json_encode(array('message' => 'Something went wront!'));
        }
    }
    public function mobile()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->validate->mobile($data['phoneno'])) {
                echo json_encode(array('status' => false));
            } else {
                echo json_encode(array('status' => true));
            }
        } else {
            echo json_encode(array('message' => 'Something went wront!'));
        }
    }
    public function username()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->validate->username($data['username'])) {
                echo json_encode(array('status' => false));
            } else {
                echo json_encode(array('status' => true));
            }
        } else {
            echo json_encode(array('message' => 'Something went wront!'));
        }
    }
}
