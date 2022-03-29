<?php
class AdminModel extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function allusers()
    {
        //Create query 
        $this->db->query('SELECT userid, firstname, lastname, email, photourl, username, phoneno, role, subscription FROM api.user ORDER BY userid DESC;');
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function affiliates()
    {
        //Create query 
        $this->db->query("SELECT userid, firstname, lastname, email, photourl, username, phoneno, role, subscription FROM api.user where role = 'af' ORDER BY userid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function tutors()
    {
        //Create query 
        $this->db->query("SELECT userid, firstname, lastname, email, photourl, username, phoneno, role, subscription FROM api.user where role = 'tu' ORDER BY userid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function students()
    {
        //Create query 
        $this->db->query("SELECT userid, firstname, lastname, email, photourl, username, phoneno, role, subscription FROM api.user where role = 'st' ORDER BY userid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function subon()
    {
        //Create query 
        $this->db->query("SELECT userid, firstname, lastname, email, photourl, username, phoneno, role, subscription FROM api.user where subscription = 1 ORDER BY userid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function suboff()
    {
        //Create query 
        $this->db->query("SELECT userid, firstname, lastname, email, photourl, username, phoneno, role, subscription FROM api.user where subscription = 0 ORDER BY userid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function allgigs()
    {
        //Create query 
        $this->db->query("SELECT gigid, title, description, status, subject, lesson FROM api.servicegig ORDER BY gigid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function gigactive()
    {
        //Create query 
        $this->db->query("SELECT gigid, title, description, status, subject, lesson FROM api.servicegig where status = 'active' ORDER BY gigid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function giginactive()
    {
        //Create query 
        $this->db->query("SELECT gigid, title, description, status, subject, lesson FROM api.servicegig where status = 'inactive' ORDER BY gigid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function gigpending()
    {
        //Create query 
        $this->db->query("SELECT gigid, title, description, status, subject, lesson FROM api.servicegig where status = 'pending' ORDER BY gigid DESC;");
        //Bind data
        $this->db->execute();
        //Return result set
        return $this->db->resultSet();
    }

    public function acceptgig($gigid)
    {
        // Update gig status to active
        $this->db->query("UPDATE api.servicegig SET status = 'active' WHERE gigid = :gigid and status = 'pending';");
        // Bind values
        $this->db->bind(':gigid', $gigid);
        // Execute
        $this->db->execute();

        if ($this->db->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function declinegig($gigid)
    {
        // Update gig status to active
        $this->db->query("UPDATE api.servicegig SET status = 'inactive' WHERE gigid = :gigid and status = 'pending';");
        // Bind values
        $this->db->bind(':gigid', $gigid);
        // Execute
        $this->db->execute();

        if ($this->db->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
