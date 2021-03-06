<?php
class User extends Model
{

    private $db;
    private $table = 'user';

    //user properties
    public $userid;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $phoneno;
    public $city;
    public $role;
    public $photourl;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function read()
    {
        //Create query
        $this->db->query('SELECT * from ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUser($userid)
    {
        //Create query 
        $this->db->query('SELECT `username`,`firstname`,`lastname`,`email`,`startdate`,`phoneno`,`city`,`role`,`photourl`,`dob`,`subscription`,`gender` from ' . $this->table . ' where `userid`=:userid');
        //Bind data
        $this->db->bind(':userid', $userid);
        //Return result set
        return $this->db->resultSet();
    }

    public function updatePicture($data)
    {
        //Create query
        $this->db->query('UPDATE `api`.`user` SET `photourl` = :photourl, `bio` = :bio WHERE `userid` = :userid');
        //Bind data
        $this->db->bind(':photourl', $data['photourl']);
        $this->db->bind(':userid', $data['userid']);
        $this->db->bind(':bio', $data['bio']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
