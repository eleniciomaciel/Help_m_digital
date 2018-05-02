<?php
class News_model extends CI_Model {
/*
 * Pegando o usuarios e trazendo para o modal
 * */
  public function fetch_single_user($user_id)  
  {  
       $this->db->where("id", $user_id);
       $query=$this->db->get('usuarios_log');
       return $query->result();  
  }

  public function update_perfil($user_id, $data)
  {
	  $this->db->where("id", $user_id);
	  $this->db->update("usuarios_log", $data);
  }

    function insert_cateria()
    {
        $insert_data = array(
	'nome_cat'   =>     $this->input->post('categoria'),
        'posicao_ct' =>     $this->input->post('position')
	);
        $this->db->insert('man_categoria', $insert_data);
    }
//deletanldo categoria ajax
    public function del_cateria($id) {
        $this->db->where('id_ct', $id);
        $this->db->delete('man_categoria');
    }
	public  function insert_conteudo()
	{
		$data = array(
			'titulo_c'		=> $this->input->post('titulo', TRUE),
			'descricao_c' 		=> $this->input->post('descricao', TRUE),
			'categoria_fk_c' 	=> $this->input->post('select_cat', TRUE),
			'assunto_c'	 	=> $this->input->post('editor1', TRUE),
			'revisar_publicado'     => $this->input->post('revisao', TRUE),
			'imagen_c' 		=> $this->upload->data('file_name')
		);

	 	return $query =	$this->db->insert('conteudo_c', $data);
	}

        public function insert_assunto_ajax() {
            $data = array(
            'titulo_c'          => $this->input->post('titulo_conteudo_dd', TRUE),
            'descricao_c'       => $this->input->post('descricao_cont', TRUE),
            'categoria_fk_c'    => $this->input->post('select_cat_dados', TRUE),
            'assunto_c'         => $this->input->post('editor2', TRUE),
            'revisar_publicado' => $this->input->post('publish', TRUE)
            );

            $this->db->insert('conteudo_c', $data);
        }
//Seleciona os dados para fazer update, conteudo do admin sem ser ajax ************/////////////////////////////////////////********************************************
	public function select_conteudo($id)
	{
            $this->db->select('*');
            $this->db->from('conteudo_c');
            $this->db->join('man_categoria', 'conteudo_c.categoria_fk_c = man_categoria.id_ct');
            $this->db->join('man_titulo', 'man_titulo.id_titulo = conteudo_c.titulo_c');
            $this->db->where('id_c', $id);
            $query = $this->db->get();
            return $query->row_array();

	}
//NOVO 29/04/2018 10:34
        public function select_conteudo_ajax($id)
	{
            $this->db->select('*');
            $this->db->from('conteudo_c');
            $this->db->join('man_categoria', 'conteudo_c.categoria_fk_c = man_categoria.id_ct');
            $this->db->join('man_titulo', 'man_titulo.id_titulo = conteudo_c.titulo_c');
            $this->db->where('id_c', $id);
            $query = $this->db->get();
            return $query->result();
	}
        
        
        public  function update_conteudo($id)
	{
            $data = array(
                    'titulo_c'		 	=> $this->input->post('titulo_cont', TRUE),
                    'descricao_c' 		=> $this->input->post('descri_cont', TRUE),
                    'categoria_fk_c'            => $this->input->post('catego_cont', TRUE),
                    'assunto_c'	 		=> $this->input->post('assunt_cont', TRUE),
                    'revisar_publicado'         => $this->input->post('status_cont', TRUE)
            );

            $this->db->where('id_c', $id);
            $this->db->update('conteudo_c', $data);
        }
        
        public function delete_publicacao_ajax($id) {
            
            $this->db->where("id_c", $id);
            $this->db->delete("conteudo_c");
        }
        
        public function public_publicacao_ajax($param) {
            $data = array(
            'revisar_publicado' => '1'
            );

            $this->db->where('id_c', $param);
            $this->db->update('conteudo_c', $data);
        }
//selecionando a categoria
    	public function get_id_cat_modal($id)
	{
		$this->db->from('man_categoria');
		$this->db->where('id_ct',$id);
		$query = $this->db->get();
		return $query->row();
	}
        
        public function up_categoria($id, $updated_data) {
           $this->db->where("id_ct", $id);  
           $this->db->update("man_categoria", $updated_data); 
        }
        //criando usuarios ao sistema
        public function ceate_users_access($param) {
            $this->db->insert('usuarios_log', $param);
        }
//alterando o status do usuario
        public function update_crud($user_id, $data)  
        {  
             $this->db->where("id", $user_id);  
             $this->db->update("usuarios_log", $data);  
        } 
        
        public function update_disabled($user_id, $data)  
      {  
           $this->db->where("id", $user_id);  
           $this->db->update("usuarios_log", $data);  
      } 
      
      public function insert_ordenacao($param) {
          $this->db->insert('man_ordenacao', $param);
      }
      
      public function delete_order($param) {
           $this->db->where("id_ordenacao", $param);  
           $this->db->delete("man_ordenacao");  
      }
   //selecionando os dados para o modal
    public function view_order_dados($id)
    {
        $this->db->select('*');
        $this->db->from('man_ordenacao');
        $this->db->join('man_categoria', 'man_categoria.id_ct = man_ordenacao.id_categoria_fk');
        $this->db->where('id_ordenacao',$id);
        $query = $this->db->get();
        return $query->row();
    }
//enviando as alterações do modal ordenação
    public function update_order($user_id, $data) 
    {
        $this->db->where("id_ordenacao", $user_id);  
        $this->db->update("man_ordenacao", $data); 
    }
//inserindo titulo
    public function insert_titulo($param) {
        $this->db->insert('man_titulo', $param);
    }
//visualizando os dados para update
    public function view_titulo_dados($id) {
        $this->db->select('*');
        $this->db->from('man_titulo');
        $this->db->join('man_ordenacao', 'man_ordenacao.id_ordenacao = man_titulo.id_ordenacao_fk');
        $this->db->where('id_titulo',$id);
        $query = $this->db->get();
        return $query->row();  
    }
//enviando as alterações do modal titulo
    public function update_titulo($user_id, $data) 
    {
        $this->db->where("id_titulo", $user_id);  
        $this->db->update("man_titulo", $data); 
    }
//deletando titulo
    public function delete_one_titulo($param) {
        $this->db->where("id_titulo", $param);  
        $this->db->delete("man_titulo"); 
    }
    
    public function insert_image($id) {
        $data = array(
        'img_cat' => $this->upload->data('file_name')
        );
        $this->db->where("id_ct", $id);  
        $this->db->update("man_categoria", $data); 
    }
//********************************************************CONTEUDO DA HOME DO SITE*********************************************************************

    /**
     * @copyright (c) 2018, Elenicio
     * @category Welcome
     */
    public function home_categoria_site() {
        
        $this->db->select('*');
        $this->db->from('conteudo_c');
        $this->db->join('man_categoria', 'man_categoria.id_ct = conteudo_c.categoria_fk_c');
        $this->db->group_by("id_ct");
        $this->db->order_by('id_ct', 'DESC');
        $this->db->where('revisar_publicado !=', '0');
        $query = $this->db->get();
        return $query->result_array();
    }
    /*
     * Sleciona os dados para o view categorias_view
     * Controller Welcome
     */
    public function view_categoria_site($id) {
        
        $this->db->select('*');
        $this->db->from('conteudo_c');
        $this->db->join('man_categoria', 'man_categoria.id_ct = conteudo_c.categoria_fk_c');
        $this->db->group_by("id_ct");
        $this->db->order_by('id_ct', 'DESC');
        $this->db->where('id_ct', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    /*
     * @param
     * Selecionando ordenação do na categoria
     * categoria view
     * seleciona as ordenação que contem categoria
     * Controller Welcome
     */ 
    public function select_ordenacao($id)
    {        
        $this->db->select('*');
        $this->db->from('man_ordenacao');
        $this->db->join('man_categoria', 'man_categoria.id_ct = man_ordenacao.id_categoria_fk');
        //$this->db->group_by("id_ct");
        $this->db->order_by('posicao_ordenacao', 'DESC');
        $this->db->where('id_ct', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
        /*
     * @param
     * Selecionando o titulo da ordenalçao
     * categoria view
     * faz a ordenação dos titulos que pertencem a aquela ordenação
     * Controller Welcome
     */
    public function select_ordenacao_titulo($id)
    {        
        $this->db->select('*');
        $this->db->from('man_titulo');
        $this->db->join('man_ordenacao', ' man_ordenacao.id_ordenacao = man_titulo.id_ordenacao_fk');
        $this->db->order_by('posicao_titulo', 'DESC');
        $this->db->where('id_categoria_fk', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
/*
 * @vindo do controller Seach
 *  */
    public function search_blog($title) {
        $this->db->select('*');
        $this->db->from('conteudo_c');
        $this->db->join('man_titulo', 'man_titulo.id_titulo = conteudo_c.titulo_c');
        $this->db->like('nome_titulo', $title , 'both');
        $this->db->group_by("id_titulo");
        return $query = $this->db->get()->result();
    }
    
    /*
     * chama o leia mais
     * Controller Welcome
     * @view leia_mais
     */
    public function view_leia_mais($id) {
        $this->db->select('*');
        $this->db->from('conteudo_c');
        $this->db->join('man_titulo', 'man_titulo.id_titulo = conteudo_c.titulo_c');
        $this->db->where('id_c', $id);
        return $query = $this->db->get()->result();
    }
    
    /*
     * lista da categoria 
     * @vindo do controller Seach
     * @view search_view
     */
    public function search_one($id) {
        $this->db->select('*');
        $this->db->from('conteudo_c');
        $this->db->join('man_titulo', 'man_titulo.id_titulo = conteudo_c.titulo_c');
        $this->db->where('nome_titulo', $id);
        return $query = $this->db->get()->result();
    }
    /*
     * enviando os dados da mensagem
     */
    
    public function dados_mensagem() {
        $data = array(
        'nome_dv'           => $this->input->post('firstName_home', TRUE),
        'cargo_dv'          => $this->input->post('cargo_home', TRUE),
        'email_dv'          => $this->input->post('email_user_home', TRUE),
        'instituicao_dv'    => $this->input->post('Institution_home', TRUE),
        'telefone_dv'       => $this->input->post('phone_home', TRUE),
        'assunto_dv'        => $this->input->post('assunto_home', TRUE),
        'msg_dv'            => $this->input->post('help_here', TRUE),
        'cliente_dv'        => $this->input->post('cliente_home', TRUE),
        );

        $this->db->insert('man_duvidas', $data);
    }
    
    //selecionando todos os as notícias
    public function selectAllMsgModal()
    {
        $this->db->select('*');
        $this->db->from('man_duvidas');
        $this->db->order_by('id_dv', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }
    //formulario ler mensagem recebida
    public function ler_mensagem($id) {
        $this->db->where("id_dv", $id);  
        $query=$this->db->get('man_duvidas');  
        return $query->result();  
    }
//fim da classe
}
