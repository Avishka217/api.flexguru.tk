<?php
class Order extends Controller
{
    public function __construct()
    {
        $auth = new Auth;
        $this->session = $auth->authorized();
        if (isset($this->session[0]["id"]) && $this->session[0]["student"] == 1) {
            $this->id = $this->session[0]["id"];
        } else {
            $data = array('error' => 'INVALID ACCESS');
            $this->response(ACCESS_TOKEN_ERRORS, $data);
            exit;
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $order = $this->model('OrderModel');
            $res = $order->create($data);
            if ($res) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Order Created Successfully.', 'order_id' => $res));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Order Creation Failed.'));
            }
        }
    }

    public function class()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $order = $this->model('OrderModel');
            $res = $order->getclass($data, $this->id);
            $student = $this->model('User')->getUser($res[0]['studentuserid']);
            $tutor = $this->model('User')->getUser($res[0]['tutoruserid']);
            $gig = $this->model('ServiceGig')->getGig($res[0]['gigid']);

            $array = [
                'class' => (array)$res[0],
                'student' => (array)$student[0],
                'tutor' => (array)$tutor[0],
                'gig' => (array)$gig[0]
            ];

            if ($res && $res[0]['studentuserid'] == $this->id) {
                $this->response(SUCCESS_RESPONSE, $array);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this class."));
            }
        }
    }

    public function studentclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('OrderModel')->studentclasses($data, $this->id);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, $result);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
            }
        }
    }

    public function studentfeedback()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('OrderModel')->studentfeedback($data, $this->id);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, true);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
            }
        }
    }

    public function askrevision()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('OrderModel')->askrevision($data);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, true);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
            }
        }
    }

    public function studentrating()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('OrderModel')->studentrating($data, $this->id);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, $result);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
            }
        }
    }
}
