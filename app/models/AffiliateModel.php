<?php
class AffiliateModel extends Model
{
    private $db;
    private $table = "affiliatemarketer";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAffiliateByUserID($userid)
    {
        //Query
        $this->db->query("SELECT * FROM " . $this->table . " where userid = :userid");
        //Bind data
        $this->db->bind(":userid", $userid);
        //Return result set
        return $this->db->resultSet();
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

       public function contactnumberchange($data, $userid)
          {

                  $this->db->query("UPDATE user SET phoneno = :phoneno WHERE userid = :userid");
                  $this->db->bind(":userid", $userid);
                  $this->db->bind(":phoneno", $data['contactnumber']);
                  if ($this->db->execute()) {
                      return true;
                  } else {
                      return false;
                  }
              }



          public function emailchange($data, $userid)
             {

                     $this->db->query("UPDATE user SET email = :email WHERE userid = :userid");
                     $this->db->bind(":userid", $userid);
                     $this->db->bind(":email", $data['email']);
                     if ($this->db->execute()) {
                         return true;
                     } else {
                         return false;
                     }
                 }

                 public function deleteaccount($data, $userid)
                    {
                            $this->db-query("SELECT phoneno,email from user where userid=:userid");
                            $this->db->bind(":userid",$userid);
                            $response = $this->db->resultSet();
                            $email = $response['email'];
                            $phoneno = $response['phoneno'];
                            $this->db->query("INSERT INTO accountdeleterequests (userid,email,contactnumber,complaint) values (:userid , :complaint , :email ,:contactnumber)");
                            $this->db->bind(":userid", $userid);
                            $this->db->bind(":complaint", $data['deletereason']);
                              $this->db->bind(":email", $email);
                                $this->db->bind(":contactnumber", $phoneno);
                            if ($this->db->execute()) {
                                return true;
                            } else {
                                return false;
                            }
                        }




}
