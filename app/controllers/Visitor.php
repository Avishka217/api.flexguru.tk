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
}
