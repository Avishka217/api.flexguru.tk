<?php
class SpecialServiceRequest extends Model
{

    private $db;
    private $ssrtable = 'specialservicerequest';
    private $ssrMessageTable = 'specialrequestmessage';
    private $ssrResponseTable = 'specialrequestresponse';

    //Special Service Request Properties
    private $serviceid;
    private $status;
    private $tutorid;
    private $studentid;

    //Special Service Message Properties
    private $ssrmid;
    private $title;
    private $messageDescription;
    private $subject;
    private $category;
    private $days;
    private $budget;
    private $date;

    //Special Service Response Properties
    private $SRresponseID;
    private $responseDescription;
    private $deadline;
    private $fee;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createSpecialRequest($data, $student)
    {
        $this->studentid = $student;
        $this->status = 'pending';
        //Query
        $this->db->query("INSERT INTO `api`.`specialservicerequest` (`status`, `studentid`) VALUES (:status, :studentid)");
        //Bind
        $this->db->bind(':status', $this->status);
        $this->db->bind(':studentid', $this->studentid);
        if ($this->db->execute()) {
            $this->db->query("SELECT LAST_INSERT_ID()");
            $this->db->execute();
            if ($this->db->rowCount() > 0) {
                $resultSet =  $this->db->resultSet();
                $this->serviceid = $resultSet[0]["LAST_INSERT_ID()"];
                if ($this->createMessage($data)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function updateSpecialRequest()
    {
    }

    public function deleteSpecialRequest()
    {
    }

    public function getSpecialRequests()
    {
    }

    //Message CRUD
    public function createMessage($data)
    {
        //create the db query
        $this->db->query("INSERT INTO `api`.`specialrequestmessage` (`title`, `description`, `subject`, `category`, `days`, `budget`, `date`, `serviceid`) VALUES (:title, :description, :subject, :category, :days, :budget, :date, :serviceid)");

        $this->title = $data['title'];
        $this->messageDescription = $data['description'];
        $this->subject = $data['subject'];
        $this->category = $data['category'];
        $this->days = $data['days'];
        $this->budget = $data['budget'];
        $this->date = $data['date'];

        //bind data
        $this->db->bind(':title', $this->title);
        $this->db->bind(':description', $this->messageDescription);
        $this->db->bind(':subject', $this->subject);
        $this->db->bind(':category', $this->category);
        $this->db->bind(':days', $this->days);
        $this->db->bind(':budget', $this->budget);
        $this->db->bind(':date', $this->date);
        $this->db->bind(':serviceid', $this->serviceid);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function readMessage()
    {
    }
    public function updateMessage()
    {
    }
    public function deleteMessage()
    {
    }

    //Request CRUD
    public function createRequest($data)
    {
        //create the db query
        $this->db->query("INSERT INTO `api`.`specialrequestRequest` (`title`, `description`, `subject`, `category`, `days`, `budget`, `date`) VALUES (':title', ':description', ':subject', ':category', ':days', ':budget', ':date')");
        //bind data
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':days', $data['days']);
        $this->db->bind(':budget', $data['budget']);
        $this->db->bind(':date', $data['date']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function readRequest()
    {
    }
    public function updateRequest()
    {
    }
    public function deleteRequest()
    {
    }
}
