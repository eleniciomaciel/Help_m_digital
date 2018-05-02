<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Titulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }
    
//adicionando o titulo
    public function crate_titulo() {
        $insert_data = array(  
        'nome_titulo'    =>     $this->input->post('tit_titulo'),  
        'palavra_chave' =>     $this->input->post("tit_pala_ch"), 
         'posicao_titulo' =>     $this->input->post("tit_posicao"), 
        'id_ordenacao_fk'   =>     $this->input->post("tit_select") 
        );    
        $this->news_model->insert_titulo($insert_data);  
        echo '<div class="callout callout-success"><h4>Parabéns! titulo inserido com sucesso.</h4></div>';
    }
    public function view_titulo_modal($param) {
        $data = $this->news_model->view_titulo_dados($param);
        echo json_encode($data);
    }
    
    public function update_titulo_dados($id) {
        $updated_data = array(  
                        'nome_titulo'       =>     $this->input->post('tit_titulo_view'),  
                        'palavra_chave'     =>     $this->input->post('tit_pala_ch_view'),
                        'posicao_titulo'    =>     $this->input->post('tit_posicao_view'),
                        'id_ordenacao_fk'   =>     $this->input->post('tit_select_view') 
                );    
        $this->news_model->update_titulo($id, $updated_data);  
        echo '<div class="callout callout-success"><h4>Parabéns! titulo alterado com sucesso.</h4></div>';
    }
    
    public function delete_titulo($param) {
        $this->news_model->delete_one_titulo($param);  
        echo 'Conteúdo deletado com sucesso!!!';
    }
}
