<?php

/*
    Filename:   login_model.php
    Location:   /application/models/
*/

class login_model extends CI_Model {
    
    function login_validate() {
        $qry = $this->db->query('SELECT * FROM `profiles` WHERE profile_username = "'.$this->input->post('username').'" AND profile_password = "'.sha1($this->input->post('password')).'" AND profile_state = "enabled"');

        if($qry->num_rows() == 1) {

            $res = $qry->result();

            $user_data = array(
                "logged_in" => true,
                "user_type" => "user",
                "username" => $res[0]->profile_username,
                "user_id" => $res[0]->profile_id
            );

            $this->session->set_userdata($user_data);
        
            return true;

        }else{

            return false;
        
        }
    }

    function password_reset(){
        $qry = $this->db->query("SELECT * FROM profiles WHERE profile_username = '".$this->input->post('username')."' AND profile_email = '".$this->input->post('email')."'");
        if($qry->num_rows() == 1){
            $profile = $qry->result();
            $new_pass = substr(sha1(rand()), 0, 8);

            $qry = $this->db->query("UPDATE profiles SET profile_password = '".sha1($new_pass)."' WHERE profile_id = ".$profile[0]->profile_id);

            if($qry){
                $result = array( "status" => true, "password" => $new_pass );
                return $result;
            }
        }else{
            return false;
        }
    }

    function timestampProc()
    {
        $date = date('Y-m-d H:i:s');
        //INSERT USERNAME AS WELL, ALSO DO A SELECT USER rows=1 CHECK to see if user exists, if does exist, use UPDATE instead of INSERT
        $sql = "INSERT INTO loginStats (login) VALUES (".$this->db->escape($date).")";

        $this->db->query($sql);
    }

}


// End of File
?>