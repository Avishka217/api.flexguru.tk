<?php
class Registration extends Controller
{
    private $register;
    public function __construct()
    {
        $auth = new Auth;
        $auth->private();
        $this->register = $this->model("Register");
    }

    public function register()
    {
        $validate = $this->model("Validate");
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($validate->validate($data)) {
                print_r("check 1");
                $this->register->register($data);
                echo json_encode(array('message' => "User created successfully"));
            } else {
                echo json_encode(array('message' => 'Something went wront!'));
            }
        }
    }

    public function student()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->register->student($data['username'])) {
            echo json_encode(array('message' => 'Account created successfully!'));
        } else {
            echo json_encode(array('message' => 'Account creation failed. Contact Admin support.'));
        }
    }

    public function tutor()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->register->tutor($data['username'])) {
            echo json_encode(array('message' => 'Account created successfully!'));
        } else {
            echo json_encode(array('message' => 'Account creation failed. Contact Admin support.'));
        }
    }

    public function affiliate()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->register->affiliate($data['username'])) {
            echo json_encode(array('message' => 'Account created successfully!'));
        } else {
            echo json_encode(array('message' => 'Account creation failed. Contact Admin support.'));
        }
    }

    public function test()
    {
        echo json_encode(array('message' => "Test function working fine!"));
    }
}
