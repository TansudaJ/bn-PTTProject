<?php
class UserModel extends CI_Model {
    public function get_all_users()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users
            
            $query = $this->db->query("SELECT * FROM employee e JOIN authority a on e.authority_authorityID = a.authorityID");
            return $query->result();
    }

    public function check_username_password($username,$password)
    {
            //$query = $this->db->get('users');
            $sql = "SELECT * FROM employee WHERE username='".$username."' and password='".$password."' and activeflag = 1";
            //echo $sql;
            //die();
            $query = $this->db->query($sql);
            $users = $query->result();
            if(count($users)==1){
                //var_dump($users);
                $user = $users[0];
                if($user->password == $password){
                        $user_data["employeeID"] = $user->employeeID;
                        $user_data["username"] = $user->username;
                        $user_data["f_name"] = $user->f_name;
                        $user_data["l_name"] = $user->l_name;
                        $user_data["email"] = $user->email;
                        $user_data["telno"] = $user->telno;
                        $user_data["authority_authorityID"] = $user->authority_authorityID;
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
             
                $sql = "INSERT INTO `employee`(`employeeID`, `n_prefix`, `f_name`, `l_name`, `telno`, `email`, `username`, `password`, `authority_authorityID`, `imageURL`,  `activeflag`)
                VALUES ('".$user["employeeID"]."','','".$user["f_name"]."','".$user["l_name"]."','".$user["telno"]."','".$user["email"]."','".$user["username"]."','".$user["password"]."','".$user["authority_authorityID"]."','','".$user["activeflag"]."')";
                $query = $this->db->query($sql);
                return (TRUE);
            }else{
                return (FALSE);
            }

    }

    public function getuser_by_username($username)
    {
        $sql = "SELECT * FROM employee WHERE username = '".$username."' ";
        if( $this->db->query($sql)){
            
            return (TRUE);
        }else{
            
            return (FALSE);
        }

    }
   
}


