<?php

class Post_model extends CI_Model
{
    public function tambahPost(){
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'status' => $this->input->post('status'),
            'show' => $this->input->post('show'),
            'id_writer' => $this->session->userdata('id_user'),
            'idol' => $this->input->post('idol')
        );
        $this->db->insert('posts',$data);
    }
    public function getAllPost(){
        return $this->db
        ->select("id_post, judul, SUBSTRING(isi, 1, 140) as isi")
        ->get('posts')
        ->result_array();
    }
    public function getPostsWriter($limit, $start, $keyword = null, $id){
        return $this->db
        ->select("id_post, judul, SUBSTRING(isi, 1, 140) as isi, status, show, idol, name")
        ->join('users', 'id_writer = id_user')
        ->where('id_writer', $id)
        ->like('judul', $keyword)
        ->order_by('id_post','asc')
        ->get('posts', $limit, $start)
        ->result_array();
    }

    public function countAllPost(){
        return $this->db->get('posts')->num_rows();
    }

    public function countPosts($keyword = null){
        return $this->db->like('judul', $keyword)->from('posts')->count_all_results();
    }

    public function getPostById($id){
        return $this->db
        ->where('id_post', $id)
        ->get('posts')
        ->row_array();
    }

    public function updatePost($id){
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi')
        );

        $this->db->where('id_post', $id)->update('posts', $data);
    }

    public function hapusPost($id){
        $this->db->where('id_post', $id)->delete('posts');
    }
}

?>