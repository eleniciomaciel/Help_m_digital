
<!-- Modal iserindo ordenação-->
<div class="modal fade" id="exampleModalOrdenacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-list"> Ordenação</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- //inicio form -->
       <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
                  <i class="fa fa-edit"></i>  Criar ordenação
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_form_ordenar" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="inputEmail3">Nome: </label>

                  <div class="col-sm-10">
                      <input class="form-control" id="orde_name" name="orde_name" type="text" placeholder="Nome da ordenação..." required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="inputPassword3">Posição</label>
                  <div class="col-sm-10">
                      <input class="form-control" id="ord_num" name="ord_num" type="number" min="1" placeholder="Posição da ordenação" required="">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="inputPassword3">Categoria</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="cat_select" id="cat_select">
                        <option selected="" disabled="" value="">Selecione aqui...</option>
                        <?php
                        $this->db->select('*');
                        $this->db->from('man_categoria');
                        $this->db->order_by('id_ct', 'DESC');
                        $quer = $this->db->get();
                        foreach ($quer->result() as $rop) {
                                ?>
                                <option value="<?php echo $rop->id_ct ;?>"><?php echo $rop->nome_cat ?></option>
                                <?php
                              }
                        ?>
                    </select>
                  </div>
                </div>
                  
                  <div id="text_order"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-info pull-left" type="submit">
                    <i class="fa fa-save"> Salvar</i>
                </button>
              </div>
              <!-- /.box-footer -->
            </form>
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



<!-- listagem da ordenação no modal -->


<div class="modal fade bd-exampleModalCenterListOrder-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Listagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- //inicio form -->
       <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listagem das ordenações</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nome da ordenação</th>
                        <th>Posição</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                        <?php
                        $this->db->select('*');
                        $this->db->from('man_ordenacao');
                        $this->db->join('man_categoria', 'man_categoria.id_ct = man_ordenacao.id_categoria_fk');
                        $this->db->order_by('id_ordenacao', 'DESC');

                        $query = $this->db->get();

                        foreach ($query->result() as $row)
                        {  
                            ?>
                                <tr>
                                    <td><?php echo $row->nome_ordenacao;?></td>
                                    <td><?php echo $row->posicao_ordenacao ;?></td>
                                    <td><?php echo $row->nome_cat;?></td>
                                    <td>
                                      <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opções
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                          <li>
                                              <a href="#" onclick="update_ordenacao_dados(<?php echo $row->id_ordenacao;?>)">
                                                  <i class=" fa fa-refresh"> Alterar</i>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#" class="delete_order" id="<?php echo $row->id_ordenacao;?>">
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
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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


<!-- /.modal-update************************************************************* -->



<!-- Modal -->
<div class="modal fade" id="exampleModalUpdateOrdebacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <i class="fa fa-edit"> Alterar ordenação</i>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  -->
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
                  <i class="fa fa-edit"></i>  Alterar dados
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="add_form_ordenar_update" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="inputEmail3">Nome: </label>

                  <div class="col-sm-10">
                      <input class="form-control" id="orde_name_update" name="orde_name_update" type="text" placeholder="Nome da ordenação..." required="">
                  </div>
                </div>
                  
                  <input type="hidden" name="id_selc_ord" id="id_selc_ord">
                  
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="inputPassword3">Posição</label>
                  <div class="col-sm-10">
                      <input class="form-control" id="ord_num_update" name="ord_num_update" type="number" min="1" placeholder="Posição da ordenação" required="">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="inputPassword3">Categoria</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="cat_select_update" id="cat_select_update" required="">
                        <option selected="" disabled="" value="">Selecione aqui...</option>
                        <?php
                        $this->db->select('*');
                        $this->db->from('man_categoria');
                        $this->db->order_by('id_ct', 'DESC');
                        $que = $this->db->get();
                        foreach ($que->result() as $row) {
                                ?>
                                <option value="<?php echo $row->id_ct ;?>"><?php echo $row->nome_cat ?></option>
                                <?php
                              }
                        ?>
                    </select>
                  </div>
                </div>
                  
                  <div id="text_order"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-info pull-left" type="submit">
                    <i class="fa fa-save"> Alterar</i>
                </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        <!--  -->
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
    //criando ordenação via ajax
      $(document).on('submit', '#add_form_ordenar', function(event){  
           event.preventDefault();  
           var orde_name    = $('#orde_name').val();  
           var ord_num      = $('#ord_num').val();  
           var cat_select   = $('#cat_select').val();  
          
           if(orde_name != '' && ord_num != '' && cat_select != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'ordenacao/crate_ordenacao'?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                         
                        swal("Poarabéns!", "Ordenação inserida com sucesso.");
                         $('#add_form_ordenar')[0].reset();  
                         $('#exampleModalOrdenacao').modal('show');
                        
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
$(document).on('click', '.delete_order', function(){  
    var user_id = $(this).attr("id");  
    if(confirm("Tem certeza que você deseja deletar essa ordenação?"))  
    {  
         $.ajax({
             url:"<?php echo base_url() . 'ordenacao/delete_ordenacao/'?>" + user_id, 
              method:"POST",    
              success:function(data)  
              { 
                swal({
                        title: "Parabéns!",
                        text: "Ordenação deletada com sucesso!",
                        type: "success"
                    }).then(function() {
                        window.location = "<?=base_url('inicio')?>";
                });
                
              }  
         });  
    }  
    else  
    {  
         return false;       
    }  
});  
</script>
<script>
//retornando os dados para o modal update
function update_ordenacao_dados(id)
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ordenacao/view_update/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_selc_ord"]').val(data.id_ordenacao);
            $('[name="orde_name_update"]').val(data.nome_ordenacao);
            $('[name="ord_num_update"]').val(data.posicao_ordenacao);
            $('[name="cat_select_update"]').val(data.id_categoria_fk);
            
            $('#exampleModalUpdateOrdebacao').modal('show'); // show bootstrap modal when complete loaded
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
      $(document).on('submit', '#add_form_ordenar_update', function(event){  
           event.preventDefault();  
           var orde_name_update = $('#orde_name_update').val();  
           var ord_num_update = $('#ord_num_update').val();  
           var cat_select_update = $('#cat_select_update').val();  
           var id_selc_ord = $('#id_selc_ord').val(); 
           if(orde_name_update != '' && ord_num_update != '' && cat_select_update != '' && id_selc_ord != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'ordenacao/update_valide/'?>" + id_selc_ord,  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                        swal({
                           title: "Parabéns!",
                           text: "Ordenação alterada com sucesso!",
                           type: "success"
                           }).then(function() {
                               window.location = "<?=base_url('inicio')?>";
                        });
                    
                     }  
                });  
           }  
           else  
           {  
                alert("Preencha todos os dados por gentileza");  
           }  
      });
</script>