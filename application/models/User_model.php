<?php

class User_model extends CI_Model
{
    public function register()
    {
        $data = [
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('users', $data);
    }

    public function getUserByEmail($email)
    {
         return $this->db->get_where('users', ['email' => $email])->row_array();
    }

}
