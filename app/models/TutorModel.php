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

    public function passwordchange($data, $userid)
    {

        $this->db->query("SELECT * FROM user where userid = :userid AND password= :password");
        //Bind data
        $this->db->bind(":userid", $userid);
        $this->db->bind(":password", $data['password']);

        $this->db->execute();
        if ($this->db->rowCount() == 1) {
            $this->db->query("UPDATE user SET password = :password WHERE userid = :userid");
            $this->db->bind(":userid", $userid);
            $this->db->bind(":password", $data['newpassword']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function generaldetailschange($data, $tuid)
    {
        $this->db->query("SELECT userid FROM " . $this->table . " where tuid = :tuid");
        $this->db->bind(":tuid", $tuid);
        $res = $this->db->resultSet();
        $userid = $res[0]['userid'];

        $this->db->query("SELECT * FROM user where email = :email ");
        //Bind data
        $this->db->bind(":email", $data['email']);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return false;
        } else {

            $this->db->query("UPDATE user SET email = :email , phoneno = :phone where userid = :userid");
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":phone", $data['phone']);
            $this->db->bind(":userid", $userid);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }



    public function accountdeleterequest($data, $tuid)
    {
        $this->db->query("SELECT userid FROM " . $this->table . " where tuid = :tuid");
        $this->db->bind(":tuid", $tuid);
        $res = $this->db->resultSet();
        $userid = $res[0]['userid'];
        $this->db->query("INSERT INTO accountdeleterequests (userid,contactnumber,email,complaint) VALUES (:userid,:contactnumber,:email,:complaint)");
        $this->db->bind(":userid", $userid);
        $this->db->bind(":contactnumber", $data['contactnumber']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":complaint", $data['complaint']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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

    public function getTutor($tutoruserid)
    {
        //Query
        $this->db->query("SELECT u.userid, u.username, u.lastname, u.email, u.startdate, u.phoneno, u.city, u.role, u.photourl, u.dob, u.subscription, u.gender, u.bio  FROM api.user u where userid = :userid;");
        //Bind data
        $this->db->bind(":userid", $tutoruserid);
        //Return result set
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getClassDetails($tutoruserid)
    {
        // get class details from database
        $this->db->query("SELECT avg(cls.turating) as rating, count(*) as jobs FROM api.class cls, api.tutor tu WHERE cls.tutid = tu.tuid and tu.userid = :userid and cls.status = 'completed'");
        //Bind data
        $this->db->bind(":userid", $tutoruserid);
        //Return result set
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getTutorReviews($tutoruserid)
    {
        // get class details from database
        $this->db->query("SELECT u.username as student, u.photourl, u.firstname, u.lastname, cls.turating as rating, cls.tureview as review FROM api.class cls, api.tutor tu, api.student stu, api.user u WHERE cls.tutid = tu.tuid and tu.userid = :userid and cls.status = 'completed' and cls.stuid = stu.stid and stu.userid = u.userid");
        //Bind data
        $this->db->bind(":userid", $tutoruserid);
        //Return result set
        $this->db->execute();
        return $this->db->resultSet();
    }
}
