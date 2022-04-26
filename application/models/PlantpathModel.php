<?php
class PlantpathModel extends CI_Model {
    public function get_all_plantpaths()
    {
            $query = $this->db->query("SELECT * FROM plantpath");
            return $query->result();
    }

    public function get_path_byID($id)
    {
            $query = $this->db->query("SELECT * FROM plantpath WHERE pathID = '".$id."'" );
            return $query->result();
    }

    public function insert_plantpath($data)
    {
        $sql = "INSERT INTO `plantpath`(`pathID`, `plantpathname`) 
        VALUES ( Null,'".$data["plantpathname"]."')";
        $query = $this->db->query($sql);
        
       if( $query>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }
    }

    public function update_plantpaths()
	{
		$pathID=$this->input->post('pathID');
		$plantpathname=$this->input->post('plantpathname');
		$this->db->set('plantpathname', $plantpathname);
		$this->db->where('pathID', $pathID);
		$result=$this->db->update('plantpath');
		return $result;	
	}
    
}