<?php
class Visitor extends Controller
{
    public function __construct()
    {
    }

    public function services()
    {
        $gig = $this->model('ServiceGig');
        $data = $gig->getAllGigs();
        $this->response(SUCCESS_RESPONSE, $data);
    }

    public function servicesbytutor()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $gig = $this->model('ServiceGig');
            if ($res = $gig->getGigsByTutorID($data)) {
                $this->response(SUCCESS_RESPONSE, $res);
            }
        }
    }
}
