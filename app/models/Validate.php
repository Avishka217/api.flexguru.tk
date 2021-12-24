<?php
class Validate
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function validate()
    {
        return true;
    }

    public function email($email)
    {
        //Create query
        $this->db->query("SELECT * FROM user where email = :email");

        //Bind data
        $this->db->bind(':email', $email);

        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function mobile($mobile)
    {
        //Create query
        $this->db->query("SELECT * FROM user where phoneno = :mobile");

        //Bind data
        $this->db->bind(':mobile', $mobile);

        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function username($username)
    {
        //Create query
        $this->db->query("SELECT * FROM user where username = :username");

        //Bind data
        $this->db->bind(':username', $username);

        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
