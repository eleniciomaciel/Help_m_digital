<!-- Modal inserir usuario -->
<div class="modal fade bd-exampleModalUsers-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-user-plus"> Criar usuario</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <!-- //inicio form -->
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Dados do usuario</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.form-header -->
        <form method="post" id="form_user">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nome completo:</label>
                          <input type="text" class="form-control" id="nome_mod" name="nome_mod" placeholder="Ex.: Ana" required="">
                        </div>
                      <!-- /.form-group -->
                        <div class="form-group">
                          <label for="exampleInputEmail1">Telefone:</label>
                          <input type="tel" class="form-control" id="tel_mod" name="tel_mod" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}$" title="Ex.:(00) 12345-1234" placeholder="Ex.: (74) 912345-1234">
                        </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Login</label>
                          <input type="email" class="form-control" id="log_mod" name="log_mod" placeholder="Ex.: ana@municipiodigital.com" required="">
                        </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                          <label for="exampleInputEmail1">Senha:</label>
                          <input type="password" class="form-control" id="pass_mod" name="pass_mod" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7}" title="A senha deve conter pelo menos um número e uma letra maiúscula e minúscula e 7 caracteres" placeholder="Ex.: An12345" required="">
                        </div>
                      <!-- /.form-group -->
                    </div>
                      
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"> Salvar</i>
                        </button>
                    </div>
                      
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
            </form>
        <!-- /.form-body -->

      </div>
    <!-- //fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



<!--//****************************************LISTA DOS USUARIOS*********************************************** -->


<!-- Modal listar usuario -->
<div class="modal fade bd-exampleModalList-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuarios cadastrados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- lista dos usuarios -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista dos usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Usuário</th>
                            <th>Telefone</th>
                            <th>Login</th>
                            <th style="width: 40px">Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        
                        <?php
                        $this->db->select('*');
                        $this->db->from('usuarios_log');
                        $this->db->order_by('id', 'DESC');
                        $this->db->where('id !=', $this->session->userdata('usuario')->id);
                        $query = $this->db->get();
                        foreach ($query->result() as $row)
                        {
                            ?>
                        <tr>
                            <td>
                                <?php echo $row->id;?>
                            </td>
                            <td>
                                <?php echo $row->nome;?>
                            </td>
                             <td>
                                <?php echo $row->telefone;?>
                            </td>
                            <td>
                                <?php echo $row->login;?>
                            </td>
                            <td>
                              
                                  <?php
                                    if ($row->status == '1') {
                                        $row->status = '<span class="badge bg-success">Ativo</span>';
                                    }elseif ($row->status == '2') {
                                        $row->status = '<span class="badge bg-red">Desativado</span>';  
                                      }
                                  echo $row->status;?>
                              
                            </td>
                            <td class="text-center">
                                <div class="input-group-btn open">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Opções
                                  <span class="fa fa-caret-down"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="active_user" id="<?php echo $row->id;?>">
                                                <i class=" fa fa-plug"> Ativar</i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="disablede_users" id="<?php echo $row->id;?>">
                                                <i class="fa fa-power-off"> Desativar</i></a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="trash_users" id="<?php echo $row->id;?>">
                                                <i class=" fa fa-trash"> Deletar</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td> 
                             </tr>
                            <?php
                        }
                        ?>
                       
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- fim da lista dos usuarios -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<script>
//criando usuario no sistema
      $(document).on('submit', '#form_user', function(event){  
            event.preventDefault();  
            var nome_mod = $('#nome_mod').val();  
            var tel_mod = $('#tel_mod').val();  
            var log_mod = $('#log_mod').val();   
            var pass_mod = $('#pass_mod').val(); 
           if(nome_mod != '' && tel_mod != '' && log_mod != '' && pass_mod != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'perfil/create_users'?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          alert(data);  
                          $('#form_user')[0].reset();  
                          $('.bd-exampleModalUsers-modal-lg').modal('hide');   
                     }  
                });  
           }  
           else  
           {  
                alert("Preencha todos os campos por gentileza!!!");  
           }  
      });
</script>
<script>
//ativando users
      $(document).on('click', '.active_user', function(){  
           var user_id = $(this).attr("id");  
           
           $.ajax({  
                url:"<?php echo base_url(); ?>perfil/active_usuario/" + user_id,  
                method:'POST',  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data)  
                {  
                     alert(data);       
                }   
           })  
      }); 
</script>
<script>
//desativar users
      $(document).on('click', '.disablede_users', function(){  
           var user_id = $(this).attr("id");  
           
           $.ajax({  
                url:"<?php echo base_url(); ?>perfil/disabled_usuario/" + user_id,  
                method:'POST',  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data)  
                {  
                     alert(data);       
                }   
           })  
      }); 
</script>
<script>
//deletando users
      $(document).on('click', '.trash_users', function(){  
           var user_id = $(this).attr("id");  
           if(confirm("Você deseja deletar essa usuário?")) 
           $.ajax({  
                url:"<?php echo base_url(); ?>perfil/trash_usuario/" + user_id,  
                method:'POST',  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data)  
                {  
                     alert(data);       
                }   
           }) 
            else  
           {  
                return false;       
           } 
      }); 
</script>
