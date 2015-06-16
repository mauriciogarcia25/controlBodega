<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador extends CI_Controller {
	public function index()
	{
		$this->load->view('pagina');
		$this->load->view('footer');
	}

	function validaLogin(){
		$data['perfil'] = 0;
		if ($this->session->userdata("login")) {
			$data['perfil'] = $this->session->userdata("perfil");
			if ($this->session->userdata("perfil") == 1) {
				$this->load->view("administrador/principal",$data);
			}else{
				$this->load->view("asistente/principal",$data);
			}
		}else{
			$this->load->view("login",$data);
		}
	}
	
}
