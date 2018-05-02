<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ordenacao extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }
    
    public function crate_ordenacao() {
        $insert_data = array(  
             'nome_ordenacao'    =>     $this->input->post('orde_name'),  
             'posicao_ordenacao' =>     $this->input->post("ord_num"),  
             'id_categoria_fk'   =>     $this->input->post("cat_select") 
        );    
        $this->news_model->insert_ordenacao($insert_data);  
        echo '<div class="callout callout-success"><h4>Parabéns! Ordenação inserida com sucesso.</h4></div>';  
    }
    
    public function delete_ordenacao($id) 
    {
        $this->news_model->delete_order($id);  
        echo 'Ordenação deletada com sucesso!!!';
    }
    
    public function view_update($id)
    {
            $data = $this->news_model->view_order_dados($id);
            echo json_encode($data);
    }
//enviando as alterações ao banco
    public function update_valide($id) {
                $updated_data = array(  
                     'nome_ordenacao'      =>     $this->input->post('orde_name_update'),  
                     'posicao_ordenacao'   =>     $this->input->post('ord_num_update'),  
                     'id_categoria_fk'     =>     $this->input->post('cat_select_update') 
                );    
                $this->news_model->update_order($id, $updated_data);  
                echo 'Ordenação alterada com sucesso!';
    }
	
}
