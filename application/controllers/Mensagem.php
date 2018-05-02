<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mensagem extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }
    
    public function store_create() {
        
        $this->form_validation->set_rules('firstName_home', 'Nome', 'required');
        $this->form_validation->set_rules('cargo_home', 'Cargo', 'required');
        $this->form_validation->set_rules('email_user_home', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('Institution_home', 'Instituição', 'required');
        $this->form_validation->set_rules('phone_home', 'Telefone', 'required');
        $this->form_validation->set_rules('help_here', 'Mensagem', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $this->news_model->dados_mensagem();
           echo json_encode(['success'=>'Sua mensagem foi enviada com sucesso, retornaremos em breve!']);
        }
    }
    
    public function viewAllMsg() {
        $all = '';
        $data = $this->news_model->selectAllMsgModal();
        if (count($data)>0) {
            foreach ($data as $value) {
                 $all .= '<ul class="todo-list ui-sortable">';
                    $all .= '<li>';
                    
                          $all .= '<span class="handle ui-sortable-handle">';
                                $all .= '<i class="fa fa-ellipsis-v"></i>';
                                $all .= '<i class="fa fa-ellipsis-v"></i>';
                              $all .= '</span>';
                              
                          $all .= '<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:1788</small>';
                          
                          $all .= '<span class="text"> Assunto: '.$value->assunto_dv.'</span>';
                        
                         $all .= '<small class="label label-info"><i class="fa fa-clock-o"></i> '.$value->status_dv.'</small>';
                           
                          $all .= '<div class="tools">';
                              $all .= '<a href="'.$value->id_dv.'" data-toggle="modal" data-target=".bd-exampleModalAnswerMsg-modal-lg">';
                                  $all .= '<i class="fa fa-edit text-blue" title="Responde"></i>';
                              $all .= '</a>';
                              
                                $all .= '&nbsp;&nbsp;';
                              
                            $all .= '<a href="#" class="lerMsg" id="'.$value->id_dv.'">';
                                $all .= '<i class="fa fa-eye text-green" title="Ler"></i>';
                            $all .= '</a>';
                            
                                $all .= '&nbsp;&nbsp;';
                            
                            $all .= '<a href="">';   
                                $all .= '<i class="fa fa-trash-o text-danger" title="Deletar"></i>';     
                            $all .= '</a>';   
                           
                          $all .= '</div>';
                    $all .= '</li>';
                 $all .= '</ul>';
            }
            echo json_encode($all);
        }
    }
    
    public function ler_mensagem_one($id) {
        $output = array();   
           $data = $this->news_model->ler_mensagem($id);  
           foreach($data as $row)  
           {  
                $output['nome_msg'] = $row->nome_dv;  
                $output['carg_msg'] = $row->cargo_dv;
                $output['emai_msg'] = $row->email_dv;  
                $output['inst_msg'] = $row->instituicao_dv;
                $output['tele_msg'] = $row->telefone_dv;  
                $output['assu_msg'] = $row->assunto_dv;
                $output['mens_msg'] = $row->msg_dv;  
                $output['clie_msg'] = $row->cliente_dv;
                $output['idme_msg'] = $row->id_dv;
           }  
           echo json_encode($output);
    }
}
