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
        $this->db->query("INSERT INTO " . $this->table . "(stuid, title, lesson, description, price, duration, method, medium, rating, subject) VALUES(:stuid, :title, :lesson, :description, :price, :image, :duration, :method, :medium, :rating, :subject)");
        $this->db->bind(':stuid', $data['stuid']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':lesson', $data['lesson']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':method', $data['method']);
        $this->db->bind(':medium', $data['medium']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':rating', 0);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  }