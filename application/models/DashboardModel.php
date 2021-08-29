<?php
class DashboardModel extends CI_Model {
    public function get_all_dashboards()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT * FROM trees ");
            return $query->result();
    }



}