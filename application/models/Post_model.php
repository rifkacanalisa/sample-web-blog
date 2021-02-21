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

    public function getPostsWriter($limit, $start, $sort, $urutan, $parameter, $isi, $keyword = null){
        return $this->db
        ->select("id_post, judul, SUBSTRING(isi, 1, 140) as isi, status, show, idol, name")
        ->join('users', 'id_writer = id')
        ->like('judul', $keyword)
        ->or_like('idol', $keyword)
        ->where($parameter, $isi)
        ->order_by($sort, $urutan)
        ->get('posts', $limit, $start)
        ->result_array();
    }

    public function countAllPost(){
        return $this->db->get('posts')->num_rows();
    }

    public function countPosts($parameter, $isi, $keyword = null){
        return $this->db
        ->like('judul', $keyword)
        ->or_like('idol', $keyword)
        ->where($parameter, $isi)
        ->from('posts')
        ->count_all_results();
    }

    public function getPostById($id){
        return $this->db
        ->join('users', 'id_writer = id')
        ->where('id_post', $id)
        ->get('posts')
        ->row_array();
    }

    public function updatePost($id){
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'status' => $this->input->post('status'),
            'show' => $this->input->post('show'),
            'idol' => $this->input->post('idol')

        );

        $this->db->where('id_post', $id)->update('posts', $data);
    }

    public function hapusPost($id){
        $this->db->where('id_post', $id)->delete('posts');
    }
}

?>