<?php

/*
    Filename:   accounts_model.php
    Location:   /application/models/
*/

class accounts_model extends CI_Model {
    
    function make_account($id) {
        $qry = $this->db->query('SELECT * FROM `profiles` WHERE profile_id = '.$id);
        return $qry->result();
    }

    function get_account_details($id) {
        $qry = $this->db->query('SELECT * FROM `profiles` WHERE profile_id = '.$id);
        return $qry->result();
    }

    function join(){
        //Simple sha1 hashing of the user password
        $qry = $this->db->query("   INSERT INTO 
                                        profiles(
                                            profile_username,
                                            profile_password,
                                            profile_full_name,
                                            profile_email,
                                            profile_state
                                        ) 
                                    VALUES
                                        ( 
                                            '".$this->input->post('username')."',
                                            '".sha1($this->input->post('password'))."',
                                            '".$this->input->post('full_name')."',
                                            '".$this->input->post('email')."',
                                            'enabled'
                                        )"
                                );
        if($qry){
            return true;
        }else{
            return false;
        }
    }

    function update_profile() {
        $qry = $this->db->query("   UPDATE 
                                        `profiles` 
                                    SET 
                                        `profile_full_name` = '".$this->input->post('full_name')."',
                                        `profile_email` = '".$this->input->post('email')."'
                                    WHERE
                                        `profile_id` = ".$this->session->userdata('user_id'));
        if($qry){
            if($this->input->post('new_password') > ''){
                $pw = $this->update_password();
                if($pw){
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
    }

    function update_password(){
        $qry = $this->db->query("UPDATE profiles SET profile_password = '".sha1($this->input->post('new_password'))."' WHERE profile_id = ".$this->session->userdata('user_id'));

        if($qry){
            return true;
        }else{
            return false;
        }
    }
    
}


// End of File
?>