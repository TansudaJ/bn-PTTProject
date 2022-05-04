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
        $sql1 = "INSERT INTO `zone`(`zoneID`, `nameEN`, `nameTH`, `detail`, `status`, `location`, `headzoneID`) 
        VALUES (Null,'".$data["nameEN"]."','".$data["nameTH"]."','".$data["detail"]."','".$data["status"]."','".$data["location"]."','".$data["headzoneID"]."')";
        $query1 = $this->db->query($sql1);

        $sql2 = "INSERT INTO `imagezone`(`imagezoneID`, `imageURL`, `imageTitle`, `imagedetail`, `activeflag`, `zone_zoneID`) 
        VALUES (Null,'".$data["imageURL"]."','".$data["imageTitle"]."','".$data["imagedetail"]."','".$data["activeflag"]."','".$data["zone_zoneID"]."')";
        $query2 = $this->db->query($sql2);

        
       if( $query1 && $query2 >0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }

    }

}