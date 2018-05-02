<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model','municipio');
    }
    
    	public function index_home()
	{
            $dados['categ'] = $this->municipio->home_categoria_site();
            $this->load->view('home_user', $dados);
	}
        
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function home()
	{
		$this->load->view('site_admin/home');
		
	}
    
    public function login()
    {
        $this->form_validation->set_rules('login_user', 'Usuario', 'required|valid_email|trim');
        $this->form_validation->set_rules('pass_senha', 'Senha', 'required|trim|exact_length[7]|alpha_numeric_spaces',
                array('exact_length' => 'Sua %s deve conter exatamente 7 caracter.')
        );

        if ($this->form_validation->run() == FALSE)
        {
                $this->index();
        }
        else
        {
            $this->db->where('login', $this->input->post('login_user', TRUE));
            $this->db->where('senha', md5($this->input->post('pass_senha', TRUE)));
            $this->db->where('status', 1);
            $usuario = $this->db->get('usuarios_log')->result();
            
            if(count($usuario)==1){
                $dadosSession['usuario'] = $usuario[0];
                $dadosSession['logado'] = TRUE;
                $this->session->set_userdata($dadosSession);
                redirect('welcome/home');
            }else{
                $dadosSession['usuario'] = NULL;
                $dadosSession['logado'] = FALSE;
                $this->session->set_userdata($dadosSession);
                $this->session->set_flashdata('error', 'Login ou senha incorretos');
                redirect('welcome/index');
            }
        }
    }
    
    public function logout()
    {
        $dadosSession['usuario'] = NULL;
        $dadosSession['logado'] = FALSE;
        $this->session->set_userdata($dadosSession);
        redirect('welcome/index');
    }
    
    public function view_categoria($id) 
    {
        $dados['cat_dados'] = $this->municipio->view_categoria_site($id);
        $dados['ordernacao'] = $this->municipio->select_ordenacao($id);
        $dados['cat_titulo'] = $this->municipio->select_ordenacao_titulo($id);
        $this->load->view('categorias_view', $dados);
    }
    
    public function leia_mais($id) {
        $dados['leia'] = $this->municipio->view_leia_mais($id);
        $this->load->view('leia_mais', $dados);
    }
}
