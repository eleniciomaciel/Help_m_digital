<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }
    
    public function get_autocomplete(){
        if (isset($_GET['term'])) {
                $result = $this->news_model->search_blog($_GET['term']);
                if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                                'label'	=> $row->nome_titulo,
                        );
                echo json_encode($arr_result);
                }
        }
    }

    public function search_all(){
        $title=$this->input->get('busca_home');
        $data['data']=$this->news_model->search_one($title);

        $this->load->view('search_view',$data);
    }
}
