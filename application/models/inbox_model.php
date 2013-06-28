<?php

/*
    Filename:   inbox_model.php
    Location:   /application/models/
*/

class inbox_model extends CI_Model 
{
	function sendProc()
	{
		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO inbox(msgTo, msgFrom, msgSubject, msgDate, message) VALUES(
			".$this->db->escape($this->input->post('messageTo')).",
			".$this->db->escape($this->input->post('messageFrom')).",
			".$this->db->escape($this->input->post('subject')).",
			'$date',
			".$this->db->escape($this->input->post('message')).")";
		$qry = $this->db->query($sql);
		//print_r("\nmodel:" . $qry ."\n");

		if($qry)
		{
			//print_r("model work");
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_mail()
	{
		$curUser = $this->session->userdata('username');
		//print_r($curUser);
		$sql = "SELECT * FROM inbox WHERE msgTo='$curUser'";
		$qry = $this->db->query($sql);
		//print_r($qry);
        return $qry->result();
	}
}


// End of File
?>