<?php

/*
    Filename:   model_sample.php
    Location:   /models/
*/

class model_sample extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

/* Manditory function for the Atomic Structure (see README.txt)
***************************************************************/

    public function search($string) {
        $res = array();
        $qry = $this->db->query('SELECT * FROM `sample` WHERE sample_entry LIKE "%'.$string.'%"');
        if($qry) {
            foreach ($qry->result() as $s) {
                array_push($res, array( 
                    "title" => $s->sample_title,
                    "link" => base_url().'sample/'.$s->sample_url_title,
                    "type" => "Sample Entry"
                ));
            }
        }
        return $res;
    }
    
}

// End of File
?>