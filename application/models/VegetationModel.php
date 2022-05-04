<?php
class VegetationModel extends CI_Model {
    public function get_all_vegetations()
    {
            $query = $this->db->query("SELECT * FROM ((vegetation v INNER JOIN localname l ON v.vegetationID = l.vegetationID) 
            INNER JOIN type t ON v.typeID = t.typeID);");
            return $query->result();
    }

    public function get_vegetation_byID($id)
    {
            $query = $this->db->query("SELECT * FROM ((vegetation v INNER JOIN localname l ON v.vegetationID = l.vegetationID) 
            INNER JOIN type t ON v.typeID = t.typeID)
            WHERE v.vegetationID = '".$id."'" );
            return $query->result();
    }

    //tList
    public function get_all_types()
    {
            $query = $this->db->query("SELECT * FROM type");
            return $query->result();
    }

    public function insert_vegetation($data,$localname)
    {
        $check = $this->db->insert('vegetation', $data);
        $check2 = $this->db->insert('imagevegetation',$data);
        $vegetationID = $this->db->insert_id();

        foreach($localname as $row ){
            $local_data = array("localnameID"=>null, "localname"=> $row["name"], "region"=>$row["regionID"], "vegetationID"=>$vegetationID);
            $this->db->insert('localname', $local_data);
        }
       if( $check && $check2 >0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }

                

    }
    



}