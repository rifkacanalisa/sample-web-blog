<?php   
class Home extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('User_model');
        }

	public function index ()
	{
        $data['judul'] = "Home";
  
        $this->load->view('templates/header', $data);
        // setiap array yang dikirimkan ke view 
        // akan otomatis diubah menjadi sebuah variable
        // jadi dari $data['judul], nanti di view dapat diambil dengan 
        // $judul aja.

        $id = $this->session->userdata('id_user');
        
        $data['users'] = $this->User_model->getUserData($id);
        echo "<pre>".var_dump($data);
        
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');

	}
}

?>