<?php
class ServiceGig extends Model
{

    private $db;
    private $table = 'servicegig';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function addServiceGig($data, $tutorid)
    {
        $this->db->query("INSERT INTO " . $this->table . "(tuid, category, subcategory, description, fee, coverphoto, deadlineduration) VALUES(:tuid, :category, :subcategory, :description, :fee, :coverphoto, :deadlineduration)");
        $this->db->bind(':tuid', $tutorid);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':subcategory', $data['subcategory']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':fee', $data['fee']);
        $this->db->bind(':coverphoto', $data['coverphoto']);
        $this->db->bind(':deadlineduration', $data['deadlineduration']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
