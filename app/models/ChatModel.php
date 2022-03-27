<?php
class ChatModel extends Model
{
    private $db;
    private $table = 'chat';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function setmsg($data)
    {
        try {
            $this->db->query('INSERT INTO ' . $this->table . ' (fromUserID, toUserID, messagecontent) VALUES (:fromUserID, :toUserID, :messagecontent)');
            $this->db->bind(':fromUserID', $data[0]["value"]);
            $this->db->bind(':toUserID', $data[1]["value"]);
            $this->db->bind(':messagecontent', $data[2]["value"]);
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

    public function getChat($data)
    {
        try {
            //Create query
            $this->db->query('SELECT * FROM api.chat ch where ch.fromUserID = :userone and ch.toUserID = :usertwo or ch.toUserID = :userone and ch.fromUserID = :usertwo;');

            //Bind values
            $this->db->bind(':userone', $data['userone']);
            $this->db->bind(':usertwo', $data['usertwo']);

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
}
