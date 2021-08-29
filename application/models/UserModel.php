<?php
class UserModel extends CI_Model {
    public function get_all_users()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users
            
            $query = $this->db->query("SELECT * FROM users u JOIN roles r ON u.roleID =r.roleID ");
            return $query->result();
    }

    public function check_username_password($username,$password)
    {
            //$query = $this->db->get('users');
            $sql = "SELECT * FROM users WHERE username='".$username."' and password='".$password."' and activeflag = 1";
            //echo $sql;
            //die();
            $query = $this->db->query($sql);
            $users = $query->result();
            if(count($users)==1){
                //var_dump($users);
                $user = $users[0];
                if($user->password == $password){
                        $user_data["userID"] = $user->userID;
                        $user_data["username"] = $user->username;
                        $user_data["fname"] = $user->fname;
                        $user_data["lname"] = $user->lname;
                        $user_data["email"] = $user->email;
                        $user_data["telno"] = $user->telno;
                        $user_data["roleID"] = $user->roleID;
                        $user_data["logged_in"] = TRUE;
                        $this->session->set_userdata($user_data);
                        return (true);
                }else{
                        return (false);
                }
                
            }else{
                return (false);
            }

    }

    public function insert_users($user)
    {
        if($this->getuser_by_username($user["username"])==TRUE){
                $sql = "INSERT INTO `users`(`userID`, `fname`, `lname`, `activeFlag`, `roleID`, `telno`, `email`, `username`, `password`) 
                VALUES (NULL,'".$user["fname"]."','".$user["lname"]."','".$user["activeFlag"]."','".$user["roleID"]."','".$user["telno"]."','".$user["email"]."','".$user["username"]."','".$user["password"]."')";
                $query = $this->db->query($sql);
                return (TRUE);
            }else{
                return (FALSE);
            }

    }

    public function getuser_by_username($username)
    {
        $sql = "SELECT * FROM users WHERE username = '".$username."' ";
        if( $this->db->query($sql)){
            
            return (TRUE);
        }else{
            
            return (FALSE);
        }

    }
   
}


