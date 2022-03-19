<?php
class ServiceGig extends Model
{

    private $db;
    private $table = 'servicegig';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function addServiceGig($data, $tutorid)
    {
        $this->db->query("INSERT INTO " . $this->table . "(tuid, category, subcategory, description, fee, coverphoto, deadlineduration) VALUES(:tuid, :category, :subcategory, :description, :fee, :coverphoto, :deadlineduration)");
        $this->db->bind(':tuid', $tutorid);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':subcategory', $data['subcategory']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':fee', $data['fee']);
        $this->db->bind(':coverphoto', $data['coverphoto']);
        $this->db->bind(':deadlineduration', $data['deadlineduration']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllGigs()
    {
        $this->db->query("SELECT gigid, tu.tuid, title, price, revisions, duration, subject, image, rating, jobs, level, username, firstname, lastname, photourl  FROM api.servicegig sg, api.tutor tu, api.user where sg.tuid = tu.tuid and tu.userid = user.userid;");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getASingleGig($data)
    {
        $this->db->query("SELECT gigid, tu.tuid, tu.verified title, price, revisions, duration, subject, image, rating, jobs, level, username, firstname, lastname, photourl  FROM api.servicegig sg, api.tutor tu, api.user where sg.tuid = tu.tuid and tu.userid = user.userid where gigid = :gigid;");
        $this->db->bind(':gigid', $data['gigid']);
        $results = $this->db->resultSet();
        return $results;
    }
}
