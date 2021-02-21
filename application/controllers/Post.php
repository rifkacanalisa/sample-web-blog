<?php

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Post";

        $this->load->library('pagination');
        //base_url untuk memberi tahu halaman utamanya dimana
        $config['base_url'] = 'https://kpop-sharing.herokuapp.com/post';


        if (isset($_POST['submit'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        if (isset($_POST['simpan'])) {
            $data['sort'] = $this->input->post('sort');
            $data['urutan'] = $this->input->post('urutan');

            $this->session->set_userdata('sort', $data['sort']);
            $this->session->set_userdata('urutan', $data['urutan']);
        } else {
            $data['sort'] = $this->session->userdata('sort');
            $data['urutan'] = $this->session->userdata('urutan');
        }

        if (logged_in()) :
            $parameter = 'id_writer';
            $isi = $this->session->userdata('id_user');
        else :
            $parameter = 'status';
            $isi = 'public';
        endif;

        echo var_dump($isi);

        $config['total_rows'] = $this->Post_model->countPosts($parameter, $isi, $data['keyword']);
        $config['per_page'] = 9;

        //styling page
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        //pembuka untuk first page
        $config['first_tag_open'] = '<li class="page-item">';
        //penutup untuk first page
        $config['first_tag_close'] = '</li>';

        //pembuka untuk last page
        $config['last_tag_open'] = '<li class="page-item">';
        //penutup untuk last page
        $config['last_tag_close'] = '</li>';

        //kata/hal yang ditampilin untuk 
        //next link
        $config['next_link'] = '&raquo';
        //pembuka untuk next-link
        $config['next_tag_open'] = '<li class="page-item">';
        //penutup untuk next-link
        $config['next_tag_close'] = '</li>';

        //kata/hal yang ditampilin untuk 
        //previous link
        $config['prev_link'] = '&laquo';
        //pembuka untuk previos-link
        $config['prev_tag_open'] = '<li class="page-item">';
        //penutup untuk previos-link
        $config['prev_tag_close'] = '</li>';

        //pembuka untuk halaman saat ini
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        //penutup untuk halaman saat ini
        $config['cur_tag_close'] = '</a></li>';

        //pembuka untuk nomor2nya
        $config['num_tag_open'] = '<li class="page-item">';
        //penutup untuk nomor2nya
        $config['num_tag_close'] = '</li>';

        // atribut tambahan untuk setiap anchornya.
        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        
        if ($this->session->userdata('keyword') == false) :
            $this->session->set_userdata('keyword', '');
        endif;

        if ($this->session->userdata('sort') == false && $this->session->userdata('urutan') == false) :
            $this->session->set_userdata('sort', 'id_post');
            $this->session->set_userdata('urutan', 'ASC');
        endif;

        $data['posts'] = $this->Post_model
            ->getPostsWriter($config['per_page'], $data['start'], $parameter, $isi, $data['sort'], $data['urutan'],  $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('post/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if (logged_in()) {
            $data['judul'] = 'Tambah Post';

            $this->form_validation->set_rules('judul', 'Judul Post', 'required');
            $this->form_validation->set_rules('isi', 'Isi Post', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('post/tambah');
                $this->load->view('templates/footer');
            } else {
                $this->Post_model->tambahPost();
                $this->session->set_flashdata('notif', 'ditambahkan');
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('tipe', 'berhasil');
                redirect(base_url('post'));
            }
        } else {
            redirect('auth');
        }
    }

    public function update($id)
    {
        $data['judul'] = "Update Post";
        $data['post'] = $this->Post_model->getPostById($id);

        $this->form_validation->set_rules('judul', 'Judul Post', 'required');
        $this->form_validation->set_rules('isi', 'Isi Post', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('post/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Post_model->updatePost($id);
            $this->session->set_flashdata('notif', 'Di-update');
            $this->session->set_flashdata('alert', 'secondary');
            redirect(base_url() . "post");
        }
    }

    public function artikel($id)
    {
        $data['judul'] = "Update Post";
        $data['post'] = $this->Post_model->getPostById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('post/artikel', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->Post_model->hapusPost($id);
        $this->session->set_flashdata('notif', 'Dihapus');
        $this->session->set_flashdata('alert', 'danger');
        redirect(base_url() . "post");
    }
}
