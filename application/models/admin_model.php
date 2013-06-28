<?php

/*
    Filename:   admin_model.php
    Location:   /application/models/
*/

class admin_model extends CI_Model {
    
/* Account Details
***************************************************************/

    function make_account($id) {
        $qry = $this->db->query('SELECT * FROM `admin` WHERE admin_id = '.$id);
        return $qry->result();
    }

    function get_account_details($id) {
        $qry = $this->db->query('SELECT * FROM `admin` WHERE admin_id = '.$id);
        return $qry->result();
    }

    function join(){
        //Simple sha1 hashing of the user password
        $qry = $this->db->query("   INSERT INTO 
                                        admin(
                                            admin_username,
                                            admin_password,
                                            admin_full_name,
                                            admin_email
                                        ) 
                                    VALUES
                                        ( 
                                            '".$this->input->post('username')."',
                                            '".sha1($this->input->post('password'))."',
                                            '".$this->input->post('full_name')."',
                                            '".$this->input->post('email')."'
                                        )"
                                );
        if($qry){
            return true;
        }else{
            return false;
        }
    }

/* Updates
***************************************************************/

    function update_admin() {
        $qry = $this->db->query("   UPDATE 
                                        `admin` 
                                    SET 
                                        `admin_full_name` = '".$this->input->post('full_name')."',
                                        `admin_email` = '".$this->input->post('email')."'
                                    WHERE
                                        `admin_id` = ".$this->session->userdata('user_id'));
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
        $qry = $this->db->query("UPDATE admin SET admin_password = '".sha1($this->input->post('new_password'))."' WHERE admin_id = ".$this->session->userdata('user_id'));

        if($qry){
            return true;
        }else{
            return false;
        }
    }

/* Login
***************************************************************/

    function login_validate() {
        $qry = $this->db->query('SELECT * FROM `admin` WHERE admin_username = "'.$this->input->post('username').'" AND admin_password = "'.sha1($this->input->post('password')).'"');

        if($qry->num_rows() == 1) {

            $res = $qry->result();

            $user_data = array(
                "logged_in" => true,
                "user_type" => "admin",
                "username" => $res[0]->admin_username,
                "user_id" => $res[0]->admin_id
            );

            $this->session->set_userdata($user_data);
        
            return true;

        }else{

            return false;
        
        }
    }

/* Forgot my password
***************************************************************/

    function password_reset(){
        $qry = $this->db->query("SELECT * FROM admin WHERE admin_username = '".$this->input->post('username')."' AND admin_email = '".$this->input->post('email')."'");
        if($qry->num_rows() == 1){
            $admin = $qry->result();
            $new_pass = substr(sha1(rand()), 0, 8);

            $qry = $this->db->query("UPDATE admin SET admin_password = '".sha1($new_pass)."' WHERE admin_id = ".$admin[0]->admin_id);

            if($qry){
                $result = array( "status" => true, "password" => $new_pass );
                return $result;
            }
        }else{
            return false;
        }
    }

/* Dealing with Users
***************************************************************/
    
    function get_users() {
        $qry = $this->db->query('SELECT * FROM `profiles`');
        return $qry->result();
    }

    function disable_user($id){
        $id = decrypt($id);
        $qry = $this->db->query("UPDATE profiles SET profile_state = 'disabled' WHERE profile_id = ".$id);

        if($qry){
            return true;
        }else{
            return false;
        }
    }

    function enable_user($id){
        $id = decrypt($id);
        $qry = $this->db->query("UPDATE profiles SET profile_state = 'enabled' WHERE profile_id = ".$id);

        if($qry){
            return true;
        }else{
            return false;
        }
    }

    function delete_user($id){
        $id = decrypt($id);
        $qry = $this->db->query("DELETE FROM profiles WHERE profile_id = ".$id);

        if($qry){
            return true;
        }else{
            return false;
        }
    }

    function search_user($id)
    {
        $qry = $this->db->query("SELECT * FROM profiles WHERE profile_username LIKE '%$id%'");
        return $qry;
    }

    


}


// End of File
?>