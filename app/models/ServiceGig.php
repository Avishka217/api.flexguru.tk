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
        $this->db->query("SELECT gigid, tu.tuid, tu.verified, title, price, revisions, duration, method, medium, sg.status, subject, image, level, username, firstname, lastname, photourl  FROM api.servicegig sg, api.tutor tu, api.user where sg.tuid = tu.tuid and tu.userid = user.userid;");
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

    public function getGigRatings($gigid)
    {
        try {
            // get class details from database
            $this->db->query("SELECT count(*) as jobs, avg(cls.turating) as rating FROM api.class cls, api.servicegig sg where cls.gigid = sg.gigid and cls.gigid = :gigid and cls.status = 'completed';");
            //Bind gigid
            $this->db->bind(":gigid", $gigid);
            //Return result set
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getGigFeedbacks($gigid)
    {
        try {
            // get class details from database
            $this->db->query("SELECT u.username, u.firstname, u.lastname, u.photourl, cls.tureview, cls.turating FROM api.class cls, api.servicegig sg, api.student st, api.user u where cls.gigid = sg.gigid and cls.gigid = :gigid and cls.stuid = st.stid and st.userid = u.userid and cls.status = 'completed';");
            //Bind gigid
            $this->db->bind(":gigid", $gigid);
            //Return result set
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getTutorFeedbacks($tutorid)
    {
        try { // get class details from database
            $this->db->query("SELECT distinct u.username as student, u.photourl, u.firstname, u.lastname, cls.turating as rating, cls.tureview as review FROM api.class cls, api.tutor tu, api.student stu, api.user u WHERE cls.tutid = :tutorid and stu.userid = u.userid and cls.status = 'completed' and cls.stuid = stu.stid");
            //Bind data
            $this->db->bind(":tutorid", $tutorid);
            //Return result set
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getTutorRatings($tutorid)
    {
        try { // get class details from database
            $this->db->query("SELECT avg(cls.turating) as rating, count(*) as jobs FROM api.class cls WHERE cls.tutid = :tutorid and cls.status = 'completed'");
            //Bind data
            $this->db->bind(":tutorid", $tutorid);
            //Return result set
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getGigInProgress($gigid)
    {
        try { // get class details from database
            $this->db->query("SELECT count(*) as progress FROM api.class cls WHERE cls.gigid = :gigid and cls.status = 'in-progress'");
            //Bind data
            $this->db->bind(":gigid", $gigid);
            //Return result set
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
