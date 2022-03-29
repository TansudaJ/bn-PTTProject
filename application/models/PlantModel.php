<?php
class PlantModel extends CI_Model {
    public function get_all_plants()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users
            $query = $this->db->query("SELECT v.vegetationID,v.n_common_TH,v.n_common_ENG,v.n_scientific,v.n_family,v.type,l.region,l.localname
            FROM vegetation v INNER JOIN localname l ON v.vegetationID=l.vegetation_vegetationID
            ORDER BY CONVERT( v.n_common_TH USING tis620 ) ASC;");
            //$query = $this->db->query("SELECT * FROM vegetation v JOIN localname l ON v.vegetationID = l.vegetation_vegetationID ");
            return $query->result();
    }

    public function insert_plant($data,$localname)
    {
        //$sql = $this->db->set($data)->get_compiled_insert('vegetation');
        //echo $sql;

        $check = $this->db->insert('vegetation', $data);
        $vegetationID = $this->db->insert_id();

        foreach($localname as $row ){
            $local_data = array("localnameID"=>NULL, "localname"=> $row["name"], "region"=>$row["regionID"], "vegetationID"=>$vegetationID);
            $this->db->insert('localname', $local_data);
        }
       if( $check>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }

                

    }



}