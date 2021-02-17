<?php

// Struktur URL CI3 = [base-url]/index.php/class/fuction

class Homepage extends CI_Controller {
	public function index()
	{
		$this->load->view('homepage');
	}
}

?>