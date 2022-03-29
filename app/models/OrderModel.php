
 <?php
class OrderModel extends Model
{
    private $db;
    private $table = "class";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function create($data)
    {
        try {
            //Create query
            $this->db->query('INSERT INTO `api`.`class` (`gigid`, `tutid`, `stuid`, `orderid`, `type`, `fee`, `purchasedate`, `deadline`) VALUES (:gigid, :tutid, :stuid, :orderid, :type, :fee, :purchasedate, :deadline)');

            //Bind values
            $this->db->bind(':gigid', $data['gigid']);
            $this->db->bind(':tutid', $data['tuid']);
            $this->db->bind(':stuid', $data['stuid']);
            $this->db->bind(':orderid', $data['orderid']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':fee', $data['fee']);
            $this->db->bind(':purchasedate', $data['purchasedate']);
            $this->db->bind(':deadline', $data['deadline']);
            // Execute
            if ($this->db->execute()) {
                $this->db->query('SELECT LAST_INSERT_ID()');
                return $this->db->resultSet()[0]['LAST_INSERT_ID()'];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getclass($data)
    {
        try {
            //Create query
            $this->db->query('SELECT cls.*, stu.userid as studentuserid, tut.userid as tutoruserid  FROM api.class cls, api.tutor tut, api.student stu, api.servicegig sg, api.user where classid = :classid and cls.tutid = tut.tuid and cls.stuid = stu.stid and cls.gigid = sg.gigid and stu.userid = user.userid;');

            //Bind values
            $this->db->bind(':classid', $data['classid']);

            //Execute function
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function tutorclasses($tutor, $userid)
    {
        try {
            //Create query
            $this->db->query('SELECT cls.*, stu.*, u.username as studentusername FROM api.class cls, api.student stu, api.tutor tut, api.user u where cls.tutid = :tutor and cls.stuid = stu.stid and tut.userid = :userid and stu.userid = u.userid;');

            //Bind values
            $this->db->bind(':tutor', $tutor);
            $this->db->bind(':userid', $userid);
            //Execute function
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function studentclasses($student, $userid)
    {
        try {
            //Create query
            $this->db->query('SELECT cls.*, stu.*, u.username as studentusername FROM api.class cls, api.student stu, api.tutor tut, api.user u where cls.tutid = tut.tuid and cls.stuid = :student and tut.userid = u.userid and stu.userid = :userid;');

            //Bind values
            $this->db->bind(':student', $student);
            $this->db->bind(':userid', $userid);
            //Execute function
            if ($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function acceptclass($classid)
    {
        try {
            //Create query
            $this->db->query('UPDATE `api`.`class` SET `status` = :status WHERE `classid` = :classid');

            //Bind values
            $this->db->bind(':status', 'in-progress');
            $this->db->bind(':classid', $classid);
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function studentfeedback($data, $studentuserid)
    {
        try {
            //Update class query
            $this->db->query('UPDATE api.class cls SET `status`="completed", `turating` = :turating, `tureview` = :tureview where cls.stuid = (select u.stid from api.student u where u.userid = :userid) and cls.classid = :classid');

            //Bind values
            $this->db->bind(':classid', $data['classid']);
            $this->db->bind(':turating', $data['turating']);
            $this->db->bind(':tureview', $data['tureview']);
            $this->db->bind(':userid', $studentuserid);
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function tutorfeedback($data, $studentuserid)
    {
        try {
            //Update class query
            $this->db->query('UPDATE api.class cls SET `status`="completed", `sturating` = :sturating, `streview` = :streview where cls.tutid = (select u.tuid from api.tutor u where u.userid = :userid) and cls.classid = :classid');

            //Bind values
            $this->db->bind(':classid', $data['classid']);
            $this->db->bind(':sturating', $data['sturating']);
            $this->db->bind(':streview', $data['streview']);
            $this->db->bind(':userid', $studentuserid);
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function askrevision($data, $studentuserid)
    {
        try {
            //Update class query
            $this->db->query('UPDATE api.class cls SET `status`="in-progress", `revisionphase` = `revisionphase` + 1, `reviewphase` = 0 where cls.stuid = (select u.stid from api.student u where u.userid = :userid) and cls.classid = :classid');

            //Bind values
            $this->db->bind(':classid', $data['classid']);
            $this->db->bind(':userid', $studentuserid);
            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function askforreview($data, $tutoruserid)
    {
        try {
            //Update class query
            $this->db->query('UPDATE api.class cls SET `reviewphase` = 1, `reviewdeadline` = :reviewdeadline where cls.tutid = (select u.tuid from api.tutor u where u.userid = :userid) and cls.classid = :classid');

            //Bind values
            $this->db->bind(':classid', $data['classid']);
            $this->db->bind(':userid', $tutoruserid);
            $this->db->bind(':reviewdeadline', date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +2 day')));

            //Execute function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
