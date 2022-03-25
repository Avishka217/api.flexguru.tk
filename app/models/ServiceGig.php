<?php
class ServiceGig extends Model
{

    private $db;
    private $table = 'servicegig';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGigs()
    {
        $this->db->query("SELECT gigid, tu.tuid, tu.verified, title, price, revisions, duration, method, medium, sg.status, subject, image, rating, jobs, level, username, firstname, lastname, photourl  FROM api.servicegig sg, api.tutor tu, api.user where sg.tuid = tu.tuid and tu.userid = user.userid;");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getASingleGig($data)
    {
        $this->db->query("SELECT gigid, tu.tuid, tu.verified, title, price, revisions, duration, method, medium, sg.status, subject, image, rating, jobs, level, username, firstname, lastname, photourl  FROM api.servicegig sg, api.tutor tu, api.user where sg.tuid = tu.tuid and tu.userid = user.userid where gigid = :gigid;");
        $this->db->bind(':gigid', $data['gigid']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getGigsByTutorID($data)
    {
        $this->db->query("SELECT gigid, tu.tuid, tu.verified, title, price, revisions, duration, method, medium, sg.status, subject, image, rating, jobs, level, username, firstname, lastname, photourl  FROM api.servicegig sg, api.tutor tu, api.user where sg.tuid = :tuid and tu.userid = user.userid and tu.tuid = :tuid;");
        $this->db->bind(':tuid', $data['tuid']);
        if ($results = $this->db->resultSet()) {
            return $results;
        } else {
            return false;
        }
    }

    public function getGigByGigID($data)
    {
        $this->db->query("SELECT gigid, tu.tuid, tu.verified, title, price, revisions, description, duration, method, medium, sg.status, subject, image, rating, jobs, level, username, firstname, lastname, photourl, workplace, occupation, user.bio  FROM api.servicegig sg, api.tutor tu, api.user where sg.tuid = tu.tuid and tu.userid = user.userid and gigid = :gigid;");
        $this->db->bind(':gigid', $data['gigid']);
        if ($results = $this->db->resultSet()) {
            return $results;
        } else {
            return false;
        }
    }

    public function getGig($data)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE gigid = :gigid");
        $this->db->bind(':gigid', $data);
        if ($results = $this->db->resultSet()) {
            return $results;
        } else {
            return false;
        }
    }
}
