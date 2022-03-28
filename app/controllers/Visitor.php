<?php
class Visitor extends Controller
{
    public function __construct()
    {
        $auth = new Auth;
        $auth->private();
    }

    public function services()
    {
        $gig = $this->model('ServiceGig');
        $data = $gig->getAllGigs();
        $result = array();
        foreach ($data as $row) {
            $gigratings = $this->model('ServiceGig')->getGigRatings($row['gigid']);
            $jobs =  $gigratings[0]['jobs'];
            $rating = $gigratings[0]['rating'];
            $row['jobs'] = $jobs;
            $row['rating'] = $rating;
            array_push($result, $row);
        }
        $this->response(SUCCESS_RESPONSE, $result);
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

    public function servicebygig()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $gig = $this->model('ServiceGig');
            $res = $gig->getGigByGigID($data);

            if (!empty($res)) {
                $this->response(SUCCESS_RESPONSE, $res);
            } else {
                $this->response(SUCCESS_RESPONSE, array('message' => 'This service not exists or deleted by the tutor.'));
            }
        }
    }

    public function gigdetails()
    {
        if ($_SERVER['REQUEST_METHOD'] = "POST") {
            $data = json_decode(file_get_contents("php://input"), true);

            $gigfeedbacks = $this->model('ServiceGig')->getGigFeedbacks($data['gigid']);
            $tutorfeedbacks = $this->model('ServiceGig')->getTutorFeedbacks($data['tutorid']);
            $gigratings = $this->model('ServiceGig')->getGigRatings($data['gigid']);
            $tutorratings = $this->model('ServiceGig')->getTutorRatings($data['tutorid']);
            $giginprogress = $this->model('ServiceGig')->getGigInProgress($data['gigid']);
            $res = [
                'gigfeedbacks' => $gigfeedbacks,
                'tutorfeedbacks' => $tutorfeedbacks,
                'gigratings' => $gigratings,
                'tutorratings' => $tutorratings,
                'inprogress' => $giginprogress
            ];

            if (!empty($res)) {
                $this->response(SUCCESS_RESPONSE, $res);
            } else {
                $this->response(SUCCESS_RESPONSE, array('message' => 'No Reviews Found.'));
            }
        }
    }
}
