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

    public function createservicegig()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $serviceGig = $this->model('ServiceGig');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($serviceGig->addServiceGig($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("result" => "Gig added successfully!"));
            } else {
                $this->response(SERVER_ERROR, array("result" => "Something went wrong!"));
            }
        }
    }

    public function updateDP()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $tutor = $this->model('User');

            if ($tutor->updatePicture($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Profile Picture Updated Successfully.'));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Profile Picture Failed.'));
            }
        }
    }
}
