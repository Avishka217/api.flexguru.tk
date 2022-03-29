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
    public function allclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->allclasses();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['id'];
                $u['type'] = $user['type'];
                $u['tutid'] = $user['tutid'];
                $u['purchasedate'] = $user['purchasedate'];
                $u['deadline'] = $user['deadline'];
                $u['status'] = $user['status'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function pendingclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->pendingclasses();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['id'];
                $u['type'] = $user['type'];
                $u['tutid'] = $user['tutid'];
                $u['purchasedate'] = $user['purchasedate'];
                $u['deadline'] = $user['deadline'];
                $u['status'] = $user['status'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function expiredclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->expiredclasses();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['id'];
                $u['type'] = $user['type'];
                $u['tutid'] = $user['tutid'];
                $u['purchasedate'] = $user['purchasedate'];
                $u['deadline'] = $user['deadline'];
                $u['status'] = $user['status'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function completedclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->completedclasses();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['id'];
                $u['type'] = $user['type'];
                $u['tutid'] = $user['tutid'];
                $u['purchasedate'] = $user['purchasedate'];
                $u['deadline'] = $user['deadline'];
                $u['status'] = $user['status'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function gigclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->gigclasses();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['id'];
                $u['type'] = $user['type'];
                $u['tutid'] = $user['tutid'];
                $u['purchasedate'] = $user['purchasedate'];
                $u['deadline'] = $user['deadline'];
                $u['status'] = $user['status'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function ssrclasses()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->ssrclasses();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['id'] = $user['id'];
                $u['type'] = $user['type'];
                $u['tutid'] = $user['tutid'];
                $u['purchasedate'] = $user['purchasedate'];
                $u['deadline'] = $user['deadline'];
                $u['status'] = $user['status'];
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function pendingtutors()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $users = $this->admin->pendingtutors();
            $data = array();
            $u = [];
            foreach ($users as $user) {
                $u['tutid'] = $user['tutid'];
                $u['userid'] = $user['userid'];
                $u['subjects'] = $user['subjects'];
                $u['workplace'] = $user['workplace'];
                $u['occupation'] = $user['occupation'];
                $u['qualification'] = $user['qualification'];
                $u['file'] = 'http://localhost/flexguru/uploads/verifications/' . $user['file'];
                $u['status'] = $user['status'];
                if (boolval($user['verified'])) {
                    $u['verified'] = true;
                } else {
                    $u['verified'] = false;
                };
                array_push($data, $u);
            }
            $this->response(SUCCESS_RESPONSE, $data);
        }
    }

    public function accepttutor()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->admin->accepttutor($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Tutor Accepted Successfully.'));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Tutor Accept Unsuccessfull!.'));
            }
        }
    }

    public function declinetutor()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($this->admin->declinetutor($data)) {
                $this->response(SUCCESS_RESPONSE, array('message' => 'Tutor Declined Successfully.'));
            } else {
                $this->response(SERVER_ERROR, array('message' => 'Tutor Decline Unsuccessfull!.'));
            }
        }
    }
}
