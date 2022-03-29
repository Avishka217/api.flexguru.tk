<?php
class Student extends Controller
{
    private $session;
    private $id;

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
    public function index()
    {
    }

    public function addSSR()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $validate = true;
            $data = json_decode(file_get_contents("php://input"), true);
            $ssr = $this->model('SpecialServiceRequest');
            foreach ($data as $value) {
                if ($value == null) {
                    $validate = false;
                }
            }
            if ($validate) {
                if ($ssr->createSpecialRequest($data, $this->id)) {
                    $this->response(SUCCESS_RESPONSE, array('success' => 'Services Message Added Successfully.'));
                } else {
                    $this->response(SERVER_ERROR, array('error' => 'Services Message Failed.'));
                }
            } else {
                $this->response(REQUEST_NOT_VALID, array('error' => 'Empty Array Items Found'));
            }
        }
    }

    public function getSpecialRequests()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ssr = $this->model('SpecialServiceRequest');
            $data = $ssr->getSpecialRequests($this->id);
            $this->response(SUCCESS_RESPONSE, $data);
        } else {
            $this->response(SERVER_ERROR, array('error' => 'INTERNAL SERVER ERROR'));
        }
    }

    public function addcomplaint()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $student = $this->model('StudentModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($student->addcomplaint($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "Complaint added successfully!"));
            } else {
                $this->response(SERVER_ERROR, array("message" => "Something went wrong!"));
            }
        }
    }

    public function passwordchange()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $student = $this->model('StudentModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($student->passwordchange($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "Password Changed Successfully"));
            } else {
                $this->response(SUCCESS_RESPONSE, array("message" => "Password change unsuccessful. Please try again"));
            }
        }
    }


        public function emailchange()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $student = $this->model('StudentModel');
                $data = json_decode(file_get_contents("php://input"), true);
                if ($student->emailchange($data, $this->id)) {
                    $this->response(SUCCESS_RESPONSE, array("message" => "Password Changed Successfully"));
                } else {
                    $this->response(SUCCESS_RESPONSE, array("message" => "Password change unsuccessful. Please try again"));
                }
            }
        }


        public function contactnumberchange()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              $student = $this->model('StudentModel');
                $data = json_decode(file_get_contents("php://input"), true);
                if ($student->contactnumberchange($data, $this->id)) {
                    $this->response(SUCCESS_RESPONSE, array("message" => "Password Changed Successfully"));
                } else {
                    $this->response(SUCCESS_RESPONSE, array("message" => "Password change Unsuccessful. Please try again"));
                }
            }
        }



        public function deleteaccount()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              $student = $this->model('StudentModel');
                $data = json_decode(file_get_contents("php://input"), true);
                if ($student->deleteaccount($data, $this->id)) {
                    $this->response(SUCCESS_RESPONSE, array("message" => "Password Changed Successfully"));
                } else {
                    $this->response(SUCCESS_RESPONSE, array("message" => "Password change Unsuccessful. Please try again"));
                }
            }
        }



    public function updateDP()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->model('User')->updatePicture($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Profile Picture Updated Successfully.'));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Profile Picture Failed.'));
            }
        }
    }





}
