<?php
class VegetationModel extends CI_Model {
    public function get_all_vegetations()
    {
            $query = $this->db->query("SELECT * FROM vegetation v INNER JOIN localname l ON v.vegetationID=l.vegetationID
            ORDER BY CONVERT( v.n_common_TH USING tis620 ) ASC;");
            return $query->result();
    }

    public function get_vegetation_byID($id)
    {
            $query = $this->db->query("SELECT * FROM vegetation v INNER JOIN localname l ON v.vegetationID=l.vegetationID
             WHERE localnameID = '".$id."'" );
            return $query->result();
    }

    public function insert_vegetation($data,$localname)
    {
        //$sql = $this->db->set($data)->get_compiled_insert('vegetation');
        //echo $sql;

        $check = $this->db->insert('vegetation', $data);
        $vegetationID = $this->db->insert_id();

        foreach($localname as $row ){
            $local_data = array("localnameID"=>null, "localname"=> $row["name"], "region"=>$row["regionID"], "vegetationID"=>$vegetationID);
            $this->db->insert('localname', $local_data);
        }
       if( $check>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }

                

    }
    



}