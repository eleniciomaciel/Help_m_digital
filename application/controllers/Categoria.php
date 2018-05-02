<?php
/**
 * Created by PhpStorm.
 * User: eleni
 * Date: 07/04/2018
 * Time: 18:34
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
            $this->load->model('news_model');
    }

    /**
     * @param inserindo dados da categoria
     */
    public function insert_categoria()
    {
            $insert_data = array(
                    'nome_cat'          =>     $this->input->post('categoria')
            );
            $this->news_model->insert_cateria($insert_data);
            echo '<div class="callout callout-info">
            <h4>Categoria criada com sucesso!</h4>
          </div>';
    }
        
    public function index() { 
      $this->load->view('site_admin/home', array('error' => '' )); 
   } 
/**
 * 
 * @return inserindo categoria com imagem, apagar a de cima 
 */
        public function add_assunto() 
        {
            
            $this->form_validation->set_rules('categoria', 'Nome da categoria', 'required|is_unique[man_categoria.nome_cat]');
            $this->form_validation->set_rules('position', 'posição', 'required|numeric');


            if ($this->form_validation->run() == FALSE){
                $errors = validation_errors();
                echo json_encode(['error'=>$errors]);
            }else{
                $this->news_model->insert_cateria();
                echo json_encode(['success'=>'Categoria inserida com sucesso.']);
            }
        }
	/**
	 * @return inserindo dados da home
	 */
	public function insert_dados_home()
	{
		$this->form_validation->set_rules('titulo', 'Title', 'required|max_length[70]',
			array('max_length' => 'O %s não deve conter mais que 70 caracteres.',
				  'required' => 'O %s é obrigatório.')
		);
		$this->form_validation->set_rules('descricao', 'Descrição', 'required|max_length[150]',
			array('required' => 'A %s é obrigatório.',
				'max_length' => 'O %s não deve conter mais que 70 caracteres.')
		);
		$this->form_validation->set_rules('select_cat', 'Categoria', 'required',  array('required' => 'A %s é obrigatório'));

		$this->form_validation->set_rules('editor1', 'Assunto', 'required|min_length[3]',
			array('required' => 'O %s é obrigatório.',
				'min_length' => 'O %s está muito curto.')
		);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('site_admin/home');
		}else{
                            $config['upload_path']          = './upload/publicacao/';
                            $config['allowed_types']        = 'svg|jpg|png';
                            $config['max_width']            = 1024;
                            $config['encrypt_name']         = TRUE;

                            $this->load->library('upload', $config);

                            if ( ! $this->upload->do_upload('file_post'))
                            {
                                    $this->session->set_flashdata('error_file', $this->upload->display_errors());
                                    $this->load->view('site_admin/home');
                            }
                            else
                            {
                                    $this->news_model->insert_conteudo();
                                    redirect('welcome/home');
                            }
			}

	}
//select da categoria no modal
    public function select_categoria_modal($id)
    {
        $data = $this->news_model->get_id_cat_modal($id);
        echo json_encode($data);
    }
//deletando a categoria
    public function del_cat_publicacao($id) {

        $this->news_model->del_cateria($id);
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Parabéns!</h4>
                Categoria deletada com sucesso!!!.
              </div>';
    }
    
    public function update_categoria($id) {
                 $updated_data = array(  
                 'nome_cat' => $this->input->post('cate_moodal')
                );      
                
                $this->news_model->up_categoria($id, $updated_data);
                echo 'Categoria alterada com sucesso!!!'; 
    }
    
    public function uploadImage() {
      
      if(isset($_FILES["imagem_cat"]["name"]))  
        {  
             $config['upload_path'] = './upload/categoria/';  
             $config['allowed_types'] = 'jpg|jpeg|png|svg';
             $config['encrypt_name'] = TRUE;
             $this->load->library('upload', $config);  
             if(!$this->upload->do_upload('imagem_cat'))  
             {  
                  echo $this->upload->display_errors();  
             }  
             else  
             {  
                $id = $this->input->post('id_image');
                $this->news_model->insert_image($id);
                  $data = $this->upload->data();  
                  echo '<img src="'.base_url().'upload/categoria/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
             }  
        }else{
            echo 'sem imagem';
        } 
    }
}
