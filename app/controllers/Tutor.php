<?php
class Tutor extends Controller
{
    private $session;
    private $id;
    public function __construct()
    {
        $auth = new Auth;
        $this->session = $auth->authorized();
        if (isset($this->session[0]["id"]) && $this->session[0]["tutor"] == 1) {
            $this->id = $this->session[0]["id"];
        } else {
            $data = array('error' => 'INVALID ACCESS');
            $this->response(ACCESS_TOKEN_ERRORS, $data);
            exit;
        }
    }

    public function specialserviceresponse()
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
                if ($ssr->createResponse($data, $this->id)) {
                    $this->response(SUCCESS_RESPONSE, array('success' => 'Service Response Added Successfully.'));
                } else {
                    $this->response(SERVER_ERROR, array('error' => 'Services Response Failed.'));
                }
            } else {
                $this->response(REQUEST_NOT_VALID, array('error' => 'Empty Array Items Found'));
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

    public function tutorclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('OrderModel')->tutorclasses($data, $this->id);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, $result);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
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

            if ($res && $res[0]['tutoruserid'] == $this->id) {
                $this->response(SUCCESS_RESPONSE, $array);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this class."));
            }
        }
    }

    public function acceptclass()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $order = $this->model('OrderModel');
            $res = $order->getclass(['classid' => $data], $this->id);
            if ($res && $res[0]['tutoruserid'] == $this->id) {
                if ($order->acceptclass($data)) {
                    $this->response(SUCCESS_RESPONSE, array('message' => 'Class Accepted Successfully.'));
                } else {
                    $this->response(SERVER_ERROR, array('message' => 'Class Accept Failed.'));
                }
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this class."));
            }
        }
    }

    public function askforreview()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('OrderModel')->askforreview($data, $this->id);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, true);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
            }
        }
    }

    public function tutorfeedback()
    {
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->model('OrderModel')->tutorfeedback($data, $this->id);
            if ($result) {
                $this->response(SUCCESS_RESPONSE, true);
            } else {
                $this->response(SERVER_ERROR, array('message' => "You don't have access to this data."));
            }
        }
    }


    public function addcomplaint()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tutor = $this->model('TutorModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($tutor->addcomplaint($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "Complaint added successfully!"));
            } else {
                $this->response(SERVER_ERROR, array("message" => "Something went wrong!"));
            }
        }
    }


    public function passwordchange()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tutor = $this->model('TutorModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($tutor->passwordchange($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "Password Changed Successfully"));
            } else {
                $this->response(SUCCESS_RESPONSE, array("message" => "Password change unsuccessful. Please try again"));
            }
        }
    }

    public function generaldetailschange()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tutor = $this->model('TutorModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($tutor->generaldetailschange($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "General Details Changed Successfully"));
            } else {
                $this->response(SUCCESS_RESPONSE, array("message" => "General Details change unsuccessful. Please try again"));
            }
        }
    }

    public function accountdeleterequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tutor = $this->model('TutorModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($tutor->accountdeleterequest($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "Account Deletion Request Sent Successfully"));
            } else {
                $this->response(SUCCESS_RESPONSE, array("message" => "Account Deletion Request Failed. Please try again"));
            }
        }
    }

    public function getTutor()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $tutor = $this->model('TutorModel');
            $tutorresult = $tutor->getTutor($this->id);
            $classresult = $tutor->getClassDetails($this->id);
            $reviews = $tutor->getTutorReviews($this->id);
            $result = [
                'tutor' => $tutorresult,
                'class' => $classresult,
                'reviews' => $reviews
            ];
            if ($result) {
                $this->response(SUCCESS_RESPONSE, $result);
            } else {
                $this->response(SERVER_ERROR, array('message' => "Something went wrong!"));
            }
        }
    }
}
