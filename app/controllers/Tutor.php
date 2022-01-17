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
}
