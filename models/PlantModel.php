<?php
class PlantModel extends CI_Model {
    public function get_all_plants()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users
            $query = $this->db->query("SELECT * FROM vegetation");
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
       

        // //table1
        // $sql1 = "INSERT INTO `vegetation`(`vegetationID`, `n_common_TH`, `n_common_ENG`, `n_scientific`, `n_family`, `appearance`, 
        // `plant_origin`, `distribution`, `type`, `growth`, `shape`, `defoliation`, `flowering_period`, `reference`, 
        // `co2_storage`, `propagation`, `reference_data`)
        //  VALUES ('".$vegetationID."','".$n_common_TH."','".$n_common_ENG."','".$n_scientific."','".$n_family."','".$appearance."','".$plant_origin."',
        //  '".$distribution."','".$type."','".$growth."','".$shape."','".$defoliation."','".$flowering_period."','".$reference."',
        //  '".$co2_storage."','".$propagation."','".$reference_data."')";
        //  $this->db->query($sql1);
        //  $id = $this->db->insert_id();
         //table2
        //$sql2 = "INSERT INTO `localname`(`localnameID`, `localname`, `region`, `vegetationID`) 
        //VALUES ('".$localname."','".$region."')";

        // if ($this->db->query($sql1&&$sql2)) {
        //     return (TRUE) ;
        // }else {
        //     return (FALSE) ;
        // }
        //$query = $this->db->query($sql);
                

    }



}