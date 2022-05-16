<?php
class VegetationModel extends CI_Model {
    public function get_all_vegetations()
    {
            $query = $this->db->query("SELECT * FROM (vegetation v INNER JOIN type t ON v.typeID = t.typeID);");
            return $query->result();
    }
    public function get_all_locals($vegetationID)
    {
            $query = $this->db->query("SELECT * FROM localname WHERE vegetation_vegetationID = $vegetationID");
            return $query->result();
    }
    public function get_vegetation_byID($id)
    {
            $query = $this->db->query("SELECT * FROM (((vegetation v INNER JOIN localname l ON v.vegetationID = l.vegetation_vegetationID) 
            INNER JOIN type t ON v.typeID = t.typeID) 
            LEFT JOIN imagevegetation iv ON v.vegetationID=iv.vegetation_vegetationID) 
            WHERE v.vegetationID = '".$id."';");
            return $query->result();
    }

    //tList
    public function get_all_types()
    {
            $query = $this->db->query("SELECT * FROM type");
            return $query->result();
    }

    public function insert_vegetation($data,$localname,$data_img)
    {
        $check = $this->db->insert('vegetation', $data);
        
        $vegetationID = $this->db->insert_id();

        foreach($localname as $row ){
            $local_data = array("localnameID"=>null, "localname"=> $row["name"], "region"=>$row["regionID"], "vegetation_vegetationID"=>$vegetationID);
            $this->db->insert('localname', $local_data);
        }

        $data_img["vegetation_vegetationID"] = $vegetationID; //อิงตาราง$vegetation
        $check2 = $this->db->insert('imagevegetation',$data_img);

       if( $check && $check2 >0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }        

    }

    //getidedit
    public function getvegetationbyID($id)
    {
        $query = $this->db->get_where("vegetation",array("vegetationID"=>$id));
        $data = $query->result(); 
        return $data;
     }
     //getidedit
     public function getregionbyID($id)
    {
        $query = $this->db->get_where("localname",array("vegetation_vegetationID"=>$id));
        $data = $query->result(); 
        return $data;
     }

    //แก้ไข
     public function update($data,$id) { 
        $this->db->set($data); 
        $this->db->where("vegetationID", $id); 
        $this->db->update("vegetation", $data);
     }

     public function delete($id) 
     { 
         $query = $this->db->query("UPDATE vegetation SET activeFlag = 0 where vegetationID = ".$id);
         if ($query>0) {
             return true;
         }
     }



}