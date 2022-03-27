<?php
class StudentModel extends Model
{
    private $db;
    private $table = "student";

    public function __construct()
    {
        
        $this->db = new Database;
    }

    public function getStudentByUserID($userid)
    {
        //Query
        $this->db->query("SELECT * FROM " . $this->table . " where userid = :userid");
        //Bind data
        $this->db->bind(":userid", $userid);
        //Return result set
        return $this->db->resultSet();
    }

    public function addcomplaint($data, $userid)
    {


        $this->db->query("INSERT INTO complaint (userid,email,contactnumber,complainttype,complaint) VALUES (:userid , :email ,:contactnumber,:complainttype, :complaint )");
        //Bind data
        $this->db->bind(":userid", $userid);
        $this->db->bind(":contactnumber", $data['contactnumber']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":complainttype", $data['complainttype']);
        // $this->db->bind(":complaintdate", $data['complaintdate']);
        $this->db->bind(":complaint", $data['complaint']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }






}
