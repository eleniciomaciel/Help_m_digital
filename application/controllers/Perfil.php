<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function fetch_single_user()  
      {  
           $output = array();    
           $data = $this->news_model->fetch_single_user($_POST["user_id"]);
           foreach($data as $row)  
           {  
                $output['nome_user'] = $row->nome;
                $output['tele_users'] = $row->telefone;
			   	$output['login_user'] = $row->login;
			   	$output['nivel_users'] = $row->nivel;
			   	$output['id_users'] = $row->id;

           }  
           echo json_encode($output);  
      }
      public function update_perfil($id)
	  {
		  $updated_data = array(
			  'nome'          =>     $this->input->post('nome_user'),
			  'telefone'      =>     $this->input->post('tele_user'),
			  'login'         =>     $this->input->post('login_user'),
			  'senha'         =>     md5($this->input->post('senha_user'))
		  );
		  $this->news_model->update_perfil($id, $updated_data);
		  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Parabéns! Dados do perfíl atualizado com sucesso!</h4>
              </div>';
	  }

	public function Checkemail_goldsmith()
	{
		$requestedEmail = $this->input->post('categoria');
		$getemail=$this->db->get_where('man_categoria',array('nome_cat' => $requestedEmail))->num_rows();
		if($getemail == 0)
		{
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}
//criando usuarios do sistema
        public function create_users() {
            $status = '1';
            $nivel = 'Administrador';
            $insert_data = array(  
            'nome'          =>     $this->input->post('nome_mod'),  
            'telefone'      =>     $this->input->post("tel_mod"),  
            'login'         =>     $this->input->post("log_mod"),
            'senha'         =>     md5($this->input->post("pass_mod")),
            'status'        =>     $status,
            'nivel'         =>     $nivel
            );   
            $this->news_model->ceate_users_access($insert_data);  
            echo 'Usuário gerado com sucesso!!!';  
        }
//ativando usuario
    public function active_usuario($param) {
                $active = '1';
                $updated_data = array(  
                 'status' =>   $active
                );
                //$this->db->update(' usuarios_log', $updated_data, 'id', $param);
                $this->news_model->update_crud($param, $updated_data);  
                echo 'Usuário ativado com sucesso!!!'; 
    }
    
    public function disabled_usuario($param) {
                $active = '2';
                $updated_data = array(  
                 'status' =>   $active
                );
                //$this->db->update(' usuarios_log', $updated_data, 'id', $param);
                $this->news_model->update_disabled($param, $updated_data);  
                echo 'Usuário desativado com sucesso!!!'; 
    }
    public function trash_usuario($param) {
        $this->db->delete('usuarios_log', array('id' => $param)); 
        echo 'Usuário deletado com sucesso!!!';
    }
}
