<?php
class ZoneModel extends CI_Model {
    public function get_all_zone()
    {
            $query = $this->db->query("SELECT * FROM zone;");
            return $query->result();
    }
    //     zList       
    public function getzoneList()
    {
            $query = $this->db->query("SELECT * FROM zone ");
            return $query->result();
    }


    public function insert_zone($data)
    {
        $sql = "INSERT INTO `zone`(`zoneID`, `nameEN`, `nameTH`, `detail`, `status`, `location`, `headzoneID`) 
        VALUES (Null,'".$data["nameEN"]."','".$data["nameTH"]."','".$data["detail"]."','".$data["status"]."','".$data["location"]."','".$data["headzoneID"]."')";
        $query = $this->db->query($sql);
        
       if( $query>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }

    }

}