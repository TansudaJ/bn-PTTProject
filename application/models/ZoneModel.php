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

    //getid info
    public function get_zone_byID($id)
    {
            $query = $this->db->query("SELECT * FROM (zone z left JOIN imagezone iz ON z.zoneID = iz.zone_zoneID) 
            WHERE z.zoneID = '".$id."';");
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
    
    //getidedit
    public function getzonebyID($id)
    {
        $query = $this->db->get_where("zone",array("zoneID"=>$id));
        $data = $query->result(); 
        return $data;
     }
    //แก้ไข
     public function update($data,$id) { 
        $this->db->set($data); 
        $this->db->where("zoneID", $id); 
        $this->db->update("zone", $data); 
     }

     public function delete($id) 
     { 
         $query = $this->db->query("UPDATE zone SET activeFlag = 0 where zoneID = ".$id);
         if ($query>0) {
             return true;
         }
     }
}