<?php
class TutorModel extends Model
{
    private $db;
    private $table = "tutor";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTutorByUserID($userid)
    {
        //Query
        $this->db->query("SELECT * FROM " . $this->table . " where userid = :userid");
        //Bind data
        $this->db->bind(":userid", $userid);
        //Return result set
        return $this->db->resultSet();
    }
}
