<?php
/**
 * Created by PhpStorm.
 * User: eleni
 * Date: 07/04/2018
 * Time: 22:27
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Conteudo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}
	public function ver_conteudo($id)
	{
		$data['content'] = $this->news_model->select_conteudo($id);
		$this->load->view('site_admin/update_conteudo', $data);

	}
//FAZ A CHAMADA VIA JSON PARA O MODAL 29/04/2018 10:35 NA LINHA 71 DO MODEL
   
    public function ler_dados_conteudo_ajax($id) {
        $output = array();   
           $data = $this->news_model->select_conteudo_ajax($id);  
           foreach($data as $row)  
           {  
                $output['titulo_cont'] = $row->titulo_c;  
                $output['descri_cont'] = $row->descricao_c;
                $output['catego_cont'] = $row->categoria_fk_c;  
                $output['assunt_cont'] = $row->assunto_c;
                $output['status_cont'] = $row->revisar_publicado;  
                $output['id_cont'] = $row->id_c;
           }  
           echo json_encode($output);
    }        
        public function update_ajax($id)
        {
            $this->form_validation->set_rules('titulo_cont', 'Titulo', 'required');
            $this->form_validation->set_rules('descri_cont', 'Descrição', 'required|max_length[150]');
            $this->form_validation->set_rules('catego_cont', 'categoria', 'required');
            $this->form_validation->set_rules('assunt_cont', 'Conteúdo', 'required|min_length[3]');
            //$this->form_validation->set_rules('status_cont', 'Revisão', 'required');


            if ($this->form_validation->run() == FALSE){
                $errors = validation_errors();
                echo json_encode(['error'=>$errors]);
            }else{
                $this->news_model->update_conteudo($id);
                echo json_encode(['success'=>'Conteúdo alterado com sucesso.']);
            }
        }
        public function delete_publicacao($id) 
        {    
            $this->news_model->delete_publicacao_ajax($id);
            echo 'Publicação deletada com sucesso';  
        }
        
        public function publicar_publicacao($param) {
            $this->news_model->public_publicacao_ajax($param);
            echo 'Conteúdo publicado com sucesso'; 
        }
        
        public function add_assunto() {
            
            $this->form_validation->set_rules('titulo_conteudo_dd', 'Título', 'required');
            $this->form_validation->set_rules('descricao_cont', 'Descrição', 'required|max_length[100]');
            $this->form_validation->set_rules('select_cat_dados', 'Categoria', 'required');
            $this->form_validation->set_rules('editor2', 'Conteúdo', 'required');
            $this->form_validation->set_rules('publish', 'status da publicação', 'required');

            if ($this->form_validation->run() == FALSE){
                $errors = validation_errors();
                echo json_encode(['error'=>$errors]);
            }else{
                $this->news_model->insert_assunto_ajax();
                echo json_encode(['success'=>'Conteúdo criado com sucesso.']);
            }   
        }
}
