<?php

/*
    Filename:   stats_model.php
    Location:   /application/models/
*/

class stats_model extends CI_Model 
{
    
/* Stats
***************************************************************/

    function todayStat()
    {
        $date = date('Y-m-d');
        $sql = "SELECT * FROM loginStats WHERE login LIKE '%$date%'";
        $query = $this->db->query($sql);
        //print_r($query);
        //print_r($date);
        return $query->num_rows;
    }

    function ydayStat()
    {
        $date = date('Y-m-d', time() - 60 * 60 * 24);
        $sql = "SELECT * FROM loginStats WHERE login LIKE '%$date%'";
        $query = $this->db->query($sql);
        //print_r($query);
        //print_r($date);
        return $query->num_rows;
    }

    function last7Stat()
    {
        $sql = "SELECT *, DATE_SUB(login, INTERVAL 7 DAY) FROM loginStats";
        $query = $this->db->query($sql);
        //print_r($query->num_rows);
        return $query->num_rows;
    }

    function comTimeStat()
    {
        $sql = "SELECT login, EXTRACT(HOUR_MINUTE FROM login) FROM loginStats";
        $query = $this->db->query($sql);
        //print_r($query->result());
        return $query->row_data;
    }

    function totalStat()
    {
        $result = $this->db->count_all('loginStats');
        return $result;
    }

    function nowStat()
    {
        $this->db->where("logout ='0000-00-00 00:00:00'");
        $this->db->from('loginStats');
        $result = $this->db->count_all_results();
        return $result;
    }

}

// End of File
?>