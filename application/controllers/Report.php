<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    function index(){
        //SELECT v.*,COUNT(p.plantID) FROM vegetation v LEFT JOIN plants p on v.vegetationID = p.vegetation_vegetationID GROUP BY v.vegetationID;

        //SELECT z.*,v.n_common_TH, COUNT(p.plantID) FROM zone z LEFT JOIN plants p on z.zoneID = p.zone_zoneID JOIN vegetation v on v.vegetationID = p.vegetation_vegetationID GROUP BY z.zoneID
    }

}