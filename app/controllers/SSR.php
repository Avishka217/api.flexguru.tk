<?php
class SSR extends Controller
{
  public function __construct()
  {
    $auth = new Auth;
    $this->session = $auth->authorized();
    if (isset($this->session[0]["id"]) && $this->session[0]["student"] == 1) {
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

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] = "POST") {
      $data = json_decode(file_get_contents("php://input"), true);
      if ($this->model('SpecialService')->create($data)) {
        $this->response(SUCCESS_RESPONSE, array('message' => 'Special Services Message Added Successfully.'));
      } else {
        $this->response(SERVER_ERROR, array('message' => 'Special Services Message Failed.'));
      }
    }
  }
}
