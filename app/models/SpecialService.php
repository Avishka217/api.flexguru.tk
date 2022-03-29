<?php
class SpecialService extends Model
{
    private $db;
    private $table = 'specialservicerequest';

    public function __construct()
    {
        $this->db = new Database;
    }
    public function create($data)
    {
        try {
            $this->db->query("INSERT INTO `api`.`specialservicerequest` (`stuid`, `title`, `description`, `budget`, `duration`, `medium`, `subject`, `lesson`) VALUES (:stuid, :title, :description, :budget, :duration, :medium, :subject, :lesson);");
            $this->db->bind(':stuid', $data['stuid']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':budget', $data['budget']);
            $this->db->bind(':duration', $data['duration']);
            $this->db->bind(':medium', $data['medium']);
            $this->db->bind(':subject', $data['subject']);
            $this->db->bind(':lesson', $data['lesson']);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }  
        
    }

    public function read()
    {
      try{
      $this->db->query("SELECT * FROM `api`.`specialservicerequest` where status = 'pending' ORDER BY serviceid DESC; ");
      $this->db->execute();
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
