<?php
class PlantModel extends CI_Model {

    public function get_all_plants()
    {
            $query = $this->db->query("SELECT * FROM ((plants p INNER JOIN zone z ON p.zone_zoneID = z.zoneID) 
            INNER JOIN vegetation v ON p.vegetation_vegetationID = v.vegetationID);");
            return $query->result();
    }
//     vList
    public function get_all_vegetation()
    {
            $query = $this->db->query("SELECT * FROM vegetation");
            return $query->result();
    }
//     zList       
    public function get_all_zone()
    {
            $query = $this->db->query("SELECT * FROM zone ");
            return $query->result();
    }
    //     pList       
    public function get_all_plantpath()
    {
            $query = $this->db->query("SELECT * FROM plantpath ");
            return $query->result();
    }
    //getid info
    public function get_plant_byID($id)
    {
            $query = $this->db->query("SELECT * FROM ((((plants p INNER JOIN zone z ON p.zone_zoneID = z.zoneID) 
            INNER JOIN vegetation v ON p.vegetation_vegetationID = v.vegetationID) 
            LEFT JOIN imageplant ip ON p.plantID=ip.plants_plantID) 
            INNER JOIN plantpath pp ON pp.pathID = ip.plantpath_pathID)
            WHERE p.plantID = '".$id."'" );
            return $query->result();
    }

    public function insert_plant($data,$data_img)
    {
        $query = $this->db->insert('plants',$data);

        $plantID = $this->db->insert_id();
        
        $data_img["plants_plantID"] = $plantID;

        $sql2 = $this->db->insert('imageplant',$data_img);
        
       if( $query && $sql2>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }

     }

     //getidedit
    public function getplantbyID($id)
    {
        $query = $this->db->get_where("plants",array("plantID"=>$id));
        $data = $query->result(); 
        return $data;
     }

    //แก้ไข
     public function update($data,$id) { 
        $this->db->set($data); 
        $this->db->where("plantID", $id); 
        $this->db->update("plants", $data);
     }

     public function delete($id) 
     { 
         $query = $this->db->query("UPDATE plants SET active = 0 where plantID = ".$id);
         if ($query>0) {
             return true;
         }
     }

}