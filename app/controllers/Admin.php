<?php
class Admin extends Controller
{
    private $admin;

    public function __construct()
    {
        $auth = new Auth;
        $auth->private();
        $this->admin = $this->model('AdminModel');
    }

    public function allusers()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->allusers();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['userid'];
                $u['name'] = $user['firstname'] . ' ' . $user['lastname'];
                $u['email'] = $user['email'];
                $u['avatar'] = 'http://localhost/flexguru/uploads/users/' . $user['photourl'];
                $u['username'] = $user['username'];
                $u['telephone'] = $user['phoneno'];
                $u['role'] = $user['role'];
                if ($user['subscription']) {
                    $u['subscription'] = 'yes';
                } else {
                    $u['subscription'] = 'no';
                }
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function tutors()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->tutors();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['userid'];
                $u['name'] = $user['firstname'] . ' ' . $user['lastname'];
                $u['email'] = $user['email'];
                $u['avatar'] = 'http://localhost/flexguru/uploads/users/' . $user['photourl'];
                $u['username'] = $user['username'];
                $u['telephone'] = $user['phoneno'];
                $u['role'] = $user['role'];
                if ($user['subscription']) {
                    $u['subscription'] = 'yes';
                } else {
                    $u['subscription'] = 'no';
                }
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function students()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->students();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['userid'];
                $u['name'] = $user['firstname'] . ' ' . $user['lastname'];
                $u['email'] = $user['email'];
                $u['avatar'] = 'http://localhost/flexguru/uploads/users/' . $user['photourl'];
                $u['username'] = $user['username'];
                $u['telephone'] = $user['phoneno'];
                $u['role'] = $user['role'];
                if ($user['subscription']) {
                    $u['subscription'] = 'yes';
                } else {
                    $u['subscription'] = 'no';
                }
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function affiliates()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->affiliates();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['userid'];
                $u['name'] = $user['firstname'] . ' ' . $user['lastname'];
                $u['email'] = $user['email'];
                $u['avatar'] = 'http://localhost/flexguru/uploads/users/' . $user['photourl'];
                $u['username'] = $user['username'];
                $u['telephone'] = $user['phoneno'];
                $u['role'] = $user['role'];
                if ($user['subscription']) {
                    $u['subscription'] = 'yes';
                } else {
                    $u['subscription'] = 'no';
                }
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function subon()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->subon();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['userid'];
                $u['name'] = $user['firstname'] . ' ' . $user['lastname'];
                $u['email'] = $user['email'];
                $u['avatar'] = 'http://localhost/flexguru/uploads/users/' . $user['photourl'];
                $u['username'] = $user['username'];
                $u['telephone'] = $user['phoneno'];
                $u['role'] = $user['role'];
                if ($user['subscription']) {
                    $u['subscription'] = 'yes';
                } else {
                    $u['subscription'] = 'no';
                }
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function suboff()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->suboff();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['userid'];
                $u['name'] = $user['firstname'] . ' ' . $user['lastname'];
                $u['email'] = $user['email'];
                $u['avatar'] = 'http://localhost/flexguru/uploads/users/' . $user['photourl'];
                $u['username'] = $user['username'];
                $u['telephone'] = $user['phoneno'];
                $u['role'] = $user['role'];
                if ($user['subscription']) {
                    $u['subscription'] = 'yes';
                } else {
                    $u['subscription'] = 'no';
                }
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function allgigs()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $gigs = $this->admin->allgigs();
            $data = array();
            $u = [];
            foreach ($gigs as $gig) {
                $u['id'] = $gig['gigid'];
                $u['title'] = $gig['title'];
                $u['description'] = $gig['description'];
                $u['status'] = $gig['status'];
                $u['subject'] = $gig['subject'];
                $u['lesson'] = $gig['lesson'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function gigactive()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $gigs = $this->admin->gigactive();
            $data = array();
            $u = [];
            foreach ($gigs as $gig) {
                $u['id'] = $gig['gigid'];
                $u['title'] = $gig['title'];
                $u['description'] = $gig['description'];
                $u['status'] = $gig['status'];
                $u['subject'] = $gig['subject'];
                $u['lesson'] = $gig['lesson'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function giginactive()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $gigs = $this->admin->giginactive();
            $data = array();
            $u = [];
            foreach ($gigs as $gig) {
                $u['id'] = $gig['gigid'];
                $u['title'] = $gig['title'];
                $u['description'] = $gig['description'];
                $u['status'] = $gig['status'];
                $u['subject'] = $gig['subject'];
                $u['lesson'] = $gig['lesson'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function gigpending()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $gigs = $this->admin->gigpending();
            $data = array();
            $u = [];
            foreach ($gigs as $gig) {
                $u['id'] = $gig['gigid'];
                $u['title'] = $gig['title'];
                $u['description'] = $gig['description'];
                $u['status'] = $gig['status'];
                $u['subject'] = $gig['subject'];
                $u['lesson'] = $gig['lesson'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function acceptgig()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->admin->acceptgig($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Service Updated Successfully.'));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Service Update Failed.'));
            }
        }
    }

    public function declinegig()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->admin->declinegig($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Service Updated Successfully.'));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Service Update Failed.'));
            }
        }
    }
}
