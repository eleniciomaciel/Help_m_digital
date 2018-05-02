
<!-- Modal -->
<div class="modal fade" id="exampleModalAddTitulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar título</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- inicio form -->
        <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Adicionar dados do título</h3>
            </div>
            <div class="box-body">
              <!-- form -->
              <form method="post" id="form_titulo">
              <div class="form-group">
                <label>Título:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-text-height"></i>
                  </div>
                    <input class="form-control" type="text" name="tit_titulo" id="tit_titulo" title="Digite um título" required="" maxlength="100">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Paravra chave:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa f fa-unlock"></i>
                  </div>
                    <input class="form-control" type="text" name="tit_pala_ch" id="tit_pala_ch" required="" maxlength="250">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Posição:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-sort-numeric-asc"></i>
                  </div>
                    <input class="form-control" type="number" min="1" name="tit_posicao" id="tit_posicao" title="Digite apenas números" required="">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Ordenação:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-sort-alpha-asc"></i>
                  </div>
                      <select class="form-control" name="tit_select" id="tit_select" required="">
                        <option selected="" disabled="" value="">Selecione aqui...</option>
                        <?php
                        $this->db->select('*');
                        $this->db->from('man_ordenacao');
                        $this->db->order_by('id_ordenacao', 'DESC');
                        $que = $this->db->get();
                        foreach ($que->result() as $row) {
                                ?>
                                <option value="<?php echo $row->id_ordenacao ;?>"><?php echo $row->nome_ordenacao?></option>
                                <?php
                              }
                        ?>
                    </select>
                </div>
                <!-- /.input group -->
              </div>
              <div id="text_success_titulo"></div>
              <!-- /.form group -->
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"> Salvar</i>
              </button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- //fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-navy margin" data-dismiss="modal" onclick="atualizar()">
            <i class="fa fa-close"> Fechar</i> 
        </button>
        
      </div>
    </div>
  </div>
</div>


<!-- visualizar dados dos titulos -->

<!-- Modal -->
<div class="modal fade bd-exampleTitulo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal título</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //inicio form -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista dos títulos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <th>Título</th>
                  <th>Paravra chave</th>
                  <th>Posição</th>
                  <th style="width: 40px">Ordenação</th>
                  <th class="text-center">Açoes</th>
                </tr>
                 <?php
                    $this->db->select('*');
                    $this->db->from('man_titulo');
                    $this->db->join('man_ordenacao', 'man_ordenacao.id_ordenacao = man_titulo.id_ordenacao_fk');
                    $this->db->order_by('id_titulo', 'DESC');
                    $query = $this->db->get();
                    foreach ($query->result() as $row)
                    {  
                    ?>
                        <tr>
                          <td><?php echo $row->nome_titulo;?></td>
                          <td><?php echo $row->palavra_chave;?></td>
                          <td><?php echo $row->posicao_titulo;?></td>
                          <td><?php echo $row->nome_ordenacao;?></td>
                          <td>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-info" type="button">Opções</button>
                                    <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="#" onclick="view_daods_titulo(<?php echo $row->id_titulo;?>)">
                                              <i class="fa fa-share-square-o"> Atualizar</i>
                                          </a>
                                      </li>
                                      <li class="divider"></li>
                                      <li>
                                          <a href="#" class="delete_titulo" id="<?php echo $row->id_titulo;?>">
                                              <i class="fa fa-trash-o"> Deletar</i>
                                          </a>
                                      </li>
                                    </ul>
                                </div>
                          </td>
                        </tr>
                    <?php
                    }
                ?>   
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-navy margin" data-dismiss="modal">
            <i class="fa fa-close"> Fechar</i>
        </button>
      </div>
    </div>
  </div>
</div>


<!-- Modal visualiza dados do titulo-->
<div class="modal fade" id="exampleModalAddTituloViewDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar título</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- inicio form -->
        <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Adicionar dados do título</h3>
            </div>
            <div class="box-body">
              <!-- form -->
              <form method="post" id="form_titulo_update">
              <div class="form-group">
                <label>Título:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-text-height"></i>
                  </div>
                    <input class="form-control" type="text" name="tit_titulo_view" id="tit_titulo_view" title="Digite um título" required="" maxlength="100">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <input type="hidden" name="id_tit" id="id_tit">
              
              <div class="form-group">
                <label>Paravra chave:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa f fa-unlock"></i>
                  </div>
                    <input class="form-control" type="text" name="tit_pala_ch_view" id="tit_pala_ch_view" required="" maxlength="250">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Posição:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-sort-numeric-asc"></i>
                  </div>
                    <input class="form-control" type="number" min="1" name="tit_posicao_view" id="tit_posicao_view" title="Digite apenas números" required="">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Ordenação:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-sort-alpha-asc"></i>
                  </div>
                      <select class="form-control" name="tit_select_view" id="tit_select_view" required="">
                        <option selected="" disabled="" value="">Selecione aqui...</option>
                        <?php
                        $this->db->select('*');
                        $this->db->from('man_ordenacao');
                        $this->db->order_by('id_ordenacao', 'DESC');
                        $que = $this->db->get();
                        foreach ($que->result() as $row) {
                                ?>
                                <option value="<?php echo $row->id_ordenacao ;?>"><?php echo $row->nome_ordenacao?></option>
                                <?php
                              }
                        ?>
                    </select>
                </div>
                <!-- /.input group -->
              </div>
              <div id="titulo_ok"></div>
              <!-- /.form group -->
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"> Salvar</i>
              </button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- //fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-navy margin" data-dismiss="modal" onclick="atualizar()">
            <i class="fa fa-close"> Fechar</i> 
        </button>
        
      </div>
    </div>
  </div>
</div>
<script>
    //criando titulo via ajax
      $(document).on('submit', '#form_titulo', function(event){  
           event.preventDefault(); 
           
           var tit_titulo    = $('#tit_titulo').val();  
           var tit_pala_ch   = $('#tit_pala_ch').val();  
           var tit_posicao   = $('#tit_posicao').val();  
           var tit_select    = $('#tit_select').val();  
          
           if(tit_titulo != '' && tit_pala_ch != '' && tit_posicao != '' && tit_select != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'titulo/crate_titulo'?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          swal("Parabéns!", "Título inserido com sucesso!", "success");  
                          $('#form_titulo')[0].reset();  
                          $('#exampleModalAddTitulo').modal('show');
                     },
                     error:function(){
                         alert('Error ao se conectar com a base de dados ordenação');
                     }
                });  
           }  
           else  
           {  
                alert("Por favor selecione todos os campos");  
           }  
      });
</script>

<script>
//retornando os dados para o modal update titulo
function view_daods_titulo(id)
{
    $.ajax({
        url : "<?php echo site_url('titulo/view_titulo_modal/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="tit_titulo_view"]').val(data.nome_titulo);
            $('[name="tit_pala_ch_view"]').val(data.palavra_chave);
            $('[name="tit_posicao_view"]').val(data.posicao_titulo);
            $('[name="tit_select_view"]').val(data.id_ordenacao_fk);
            $('[name="id_tit"]').val(data.id_titulo);
            
            $('#exampleModalAddTituloViewDados').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error ao mostrar os dados');
        }
    });
}
</script>
<script>
//enviando as alterações
      $(document).on('submit', '#form_titulo_update', function(event){  
            event.preventDefault();  
            var tit_titulo_view  = $('#tit_titulo_view').val();  
            var tit_pala_ch_view = $('#tit_pala_ch_view').val();  
            var tit_posicao_view = $('#tit_posicao_view').val();
            var tit_select_view  = $('#tit_select_view').val();
            var id_tit           = $('#id_tit').val();
           
           swal({
                title: "Você tem certeza que deseja alterar?",
                text: "Essa alteração irá mudar o conteúdo original editado!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                
        if(tit_titulo_view != '' && tit_pala_ch_view != '' && tit_posicao_view != '' && id_tit != '' && tit_select_view != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'titulo/update_titulo_dados/'?>" + id_tit,  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                           //document.getElementById("titulo_ok").innerHTML = data; 
                        $('#exampleModalAddTituloViewDados').modal('show');  
                     }  
                });  
           }  
           else  
           {  
                alert("Preencha todos os dados por gentileza");  
           } 
                
                  swal("Parabéns! Conteúdo alterado com sucesso!", {
                    icon: "success",
                  });
                } else {
                  swal("Você desistiu de alterar esse contéudo!");
                }
              });



           
     
      });
</script>
<script>
$(document).on('click', '.delete_titulo', function(){  
    var user_id = $(this).attr("id");  
    if(confirm("Tem certeza que você deseja deletar esse conteúdo?"))  
    {  
         $.ajax({
             url:"<?php echo base_url() . 'titulo/delete_titulo/'?>" + user_id, 
              method:"POST",    
              success:function(data)  
              {  
                   alert(data); 
                   location.reload();
                   $('#exampleModalAddTituloViewDados').modal('hide');
              }  
         });  
    }  
    else  
    {  
         return false;       
    }  
});  
</script>