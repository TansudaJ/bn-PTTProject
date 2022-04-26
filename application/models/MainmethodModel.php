<?php
class MainmethodModel extends CI_Model {
    
    public function get_all_mainmethods()
    {
            $query = $this->db->query("SELECT * FROM `maintenancetype`");
            return $query->result();
    }

    public function insert_mainmethod($data){
        $sql = "INSERT INTO `maintenancetype`(`maintenancetypeID`, `n_maintenancetype`, `detail`, `recommend`) 
        VALUES (Null,'".$data["n_maintenancetype"]."','".$data["detail"]."','".$data["recommend"]."')";
        $query = $this->db->query($sql);

        if( $query>0){
            return (TRUE) ;
         }else {
             return (FALSE) ;
         }
    }
}