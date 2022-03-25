<?php
class Gig extends Controller
{
    public function __construct()
    {
        // $auth = new Auth;
        // $this->session = $auth->authorized();
        // if (isset($this->session[0]["id"]) && $this->session[0]["tutor"] == 1) {
        //     $this->id = $this->session[0]["id"];
        // } else {
        //     $data = array('error' => 'INVALID ACCESS');
        //     $this->response(ACCESS_TOKEN_ERRORS, $data);
        //     exit;
        // }
    }

    public function index()
    {
        $this->view('home');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            // $this->response(SUCCESS_RESPONSE, $data);
            if ($this->model('Service')->create($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Services Message Added Successfully.'));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Services Message Failed.'));
            }
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);

            if ($this->model('Service')->delete($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Service Deleted Successfully.'));

            } else {
                $this->response(SERVER_ERROR, array('message' => 'Service Deleting Failed.'));
            }
        }
    }

    public function getStudent()
    {
        $student = $this->model("StudentModel");
        $data = $student->getStudentByUserID("127");
        $this->response(SUCCESS_RESPONSE, $data[0]);
    }
}
