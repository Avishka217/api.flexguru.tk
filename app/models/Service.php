<?php
class Service extends Model
{
    private $db;
    private $table = 'servicegig';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function create($data)
    {
        $this->db->query("INSERT INTO " . $this->table . "(tuid, title, lesson, description, price, image, duration, method, medium, rating, subject, revisions) VALUES(:tuid, :title, :lesson, :description, :price, :image, :duration, :method, :medium, :rating, :subject, :revisions)");
        $this->db->bind(':tuid', $data['tutorid']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':lesson', $data['lesson']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':revisions', $data['revisions']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':method', $data['method']);
        $this->db->bind(':medium', $data['medium']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':rating', 0);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data)
    {

        // Check if the user is the owner of the gig
        $this->db->query("SELECT * FROM " . $this->table . " WHERE gigid = :gigid AND tuid = :tuid");
        $this->db->bind(':gigid', $data['gigid']);
        $this->db->bind(':tuid', $data['tuid']);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            $this->db->query("DELETE FROM " . $this->table . " WHERE gigid = :gigid");
            $this->db->bind(':gigid', $data['gigid']);
            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
