<?php
class Tutor extends Controller
{
    public function __construct()
    {
        $auth = new Auth;
        $auth->private();
    }

    public function register()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        print_r($data);
        die;
        // if ($this->register->affiliate($data['username'])) {
        //     echo json_encode(array('message' => 'Account created successfully!'));
        // } else {
        //     echo json_encode(array('message' => 'Account creation failed. Contact Admin support.'));
        // }
    }
}
