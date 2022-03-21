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
            $res = $gig->getGigsByTutorID($data);

            if (!empty($res)) {
                $this->response(SUCCESS_RESPONSE, $res);
            } else {
                $this->response(SUCCESS_RESPONSE, array('message' => 'No Services Found.'));
            }
        }
    }
}
