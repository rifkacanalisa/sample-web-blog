<?php   
class Home extends CI_Controller {
        public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        
    }

	public function index ()
	{
        $data['judul'] = "Home";

        $data['homes'] = $this->Home_model->getPicHome();
  
        $this->load->view('templates/header', $data);
        // setiap array yang dikirimkan ke view 
        // akan otomatis diubah menjadi sebuah variable
        // jadi dari $data['judul], nanti di view dapat diambil dengan 
        // $judul aja.
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');

	}
}

?>