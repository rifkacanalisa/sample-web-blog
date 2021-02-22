<?php

class Post_model extends CI_Model
{
    public function tambahPost($data){
        $this->db->insert('posts',$data);
    }

    public function getPostsWriter($sort, $urutan, $parameter, $isi, $keyword = null){
        return $this->db
        ->select("id_post, judul, SUBSTRING(isi, 1, 140) as isi, status, show, fandom, name")
        ->join('users', 'id_writer = id')
        ->like('judul', $keyword)
        ->where($parameter, $isi)
        ->order_by($sort, $urutan)
        ->get('posts')
        ->result_array();
    }

    public function getPostsWriter2($limit, $start, $sort, $urutan, $parameter, $isi, $keyword = null){
        return $this->db
        ->select("id_post, judul, SUBSTRING(isi, 1, 140) as isi, status, show, fandom, name")
        ->join('users', 'id_writer = id')
        ->like('judul', $keyword)
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
        ->where($parameter, $isi)
        ->like('judul', $keyword)
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

    public function updatePost($id, $data){
        $this->db->where('id_post', $id)->update('posts', $data);
    }

    public function hapusPost($id){
        $this->db->where('id_post', $id)->delete('posts');
    }
}

?>