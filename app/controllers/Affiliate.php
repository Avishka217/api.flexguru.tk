<?php
class Affiliate extends Controller
{
    public function __construct()
    {
        $auth = new Auth;
        $this->session = $auth->authorized();
        if (isset($this->session[0]["id"]) && $this->session[0]["affiliate"] == 1) {
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

    public function addcomplaint()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $affiliate = $this->model('AffiliateModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($affiliate->addcomplaint($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "Complaint added successfully!"));
            } else {
                $this->response(SERVER_ERROR, array("message" => "Something went wrong!"));
            }
        }
    }

    public function passwordchange()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $affiliate = $this->model('AffiliateModel');
            $data = json_decode(file_get_contents("php://input"), true);
            if ($affiliate->passwordchange($data, $this->id)) {
                $this->response(SUCCESS_RESPONSE, array("message" => "Password Changed Successfully"));
            } else {
                $this->response(SUCCESS_RESPONSE, array("message" => "Password change unsuccessful. Please try again"));
            }
        }
    }




}
