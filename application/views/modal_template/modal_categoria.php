<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <!-- /inicio form 
            <form method="post" id="form_categoria">-->
            <form enctype="multipart/form-data" id="form_categoria">
                <div class="box box-primary">
                    
                    <div class="box-body">
                      <!-- Date -->
                      <div class="form-group">
                        <label>Nome da categoria:</label>

                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa  fa-tags"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="categoria" name="categoria" placeholder="Nome da categoria...">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->

                      <!-- Date range -->
                      <div class="form-group">
                        <label>Posição:</label>

                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-sort-numeric-desc"></i>
                          </div>
                            <input type="number" class="form-control pull-right" name="position" id="position" placeholder="Ex.: 7">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->

                    </div>
            <!-- /.box-body -->
          </div>
                
                
                
                <!-- //fim form 
                <div class="box-body">
                    <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="45" class="form-control" id="categoria" name="categoria" placeholder="Nome da categoria..." required>
                            </div>
                    </div>
                    <div id="catt_msg"></div>
                </div>-->
                <!-- /.box-body -->
                <div class="callout callout-success success-msg" style="display:none"></div>
                
                <button type="submit" class="btn btn-info">
                        <i class="fa fa-save"> Salvar</i>	
                </button>
                <!-- /.box-footer -->
            </form>
		<!-- /fim form -->
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="atualizar()" data-dismiss="modal">
              <i class="fa fa-close"> Fechar</i>
          </button>
      </div>
    </div>
  </div>
</div>


<!-- /*************************************** VER TODAS AS CATEGORIAS***********************************/ -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lista das categorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //INICIO FORM -->
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tabelas das categorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">ID</th>
                  <th>Nome da categoria</th>
                  <th>Data</th>
                  <th style="width: 40px">Ações</th>
                </tr>

				<?php

				$this->db->select('*');
				$this->db->from('man_categoria');
				$this->db->order_by('id_ct', 'DESC');
				$query = $this->db->get();
				foreach ($query->result() as $row)
				{
					?>

					<tr>
						<td><?php echo $row->id_ct;?></td>
						<td><?php echo $row->nome_cat;?></td>
						<td>
							<?php echo date('d-m-Y H:i:s', strtotime($row->data_ct)) ;?>
						</td>
						<td>
							<div class="input-group-btn">
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opções
									<span class="fa fa-caret-down"></span>
								</button>
								<ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="#" class="alter_cat" id="<?php echo $row->id_ct; ?>">
                                                                            <i class="fa fa-refresh"> Alterar</i>
                                                                        </a>
                                                                    </li>
									
                                                                    <li>
                                                                        <a href="#" class="imagem_foto" id="<?php echo $row->id_ct; ?>">
                                                                            <i class="fa fa-camera"> Adicionar imagem</i>
                                                                        </a>
                                                                    </li>
                                    <!--
                                    <li><a href="#">Something else here</a></li>
                                    -->
									<li class="divider"></li>
                                                                        <li>
                                                                            <a href="#" class="delete_cat_mod" id="<?php echo $row->id_ct;?>">
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
                <div id="del_msg"></div>
            </div>
          </div>
		<!-- //FIM FORM -->
      </div>
      <div class="modal-footer">
        <button type="button" onclick="atualizar()" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!--********************************** MODAL ATERR CATEGORIAS*************************************************************************//-->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- inicio form -->
       <div class="box box-primary">
            <div class="box-header">
              
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                  <form method="post" id="form_cat_update">
                <label>Categoria:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-cogs"></i>
                  </div>
                    <input type="hidden" name="id_ctg" id="id_ctg">
                    <input type="text" class="form-control pull-right" id="cate_moodal" name="cate_moodal" placeholder="Sua categoria aqui..." required="">
                </div>
                <!-- /.input group -->
                <hr>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-pencil-square-o"> Alterar</i>    
                </button>
                </form>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
       <!-- fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal inserindo imagem na categoria ===========================================================================================-->
<div class="modal fade" id="exampleModalFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar imagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form foto -->
        <div class="box box-primary">
            <div class="box-body">
                <form method="post" id="upload_form_image"  enctype="multipart/form-data"> 
                <!-- Date -->
                    <div class="form-group">
                      <label>Categoria:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-cogs"></i>
                        </div>
                          <input type="text" class="form-control pull-right" name="cat_nome_image" id="cat_nome_image" placeholder="Cateria Ex.: aqui" disabled="">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <input type="hidden" name="id_image" id="id_image">
                    <!-- Date range -->
                    <div class="form-group">
                      <label>Imagem:</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-photo"></i>
                        </div>
                          <input type="file" class="form-control pull-right" name="imagem_cat" id="imagem_cat">
                      </div>
                      <!-- /.input group -->
                    </div>
                          <div id="uploaded_image"> </div> 
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"> Salvar</i>
                    </button>
                </form>
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
          </div>
        <!-- //fim form foto -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-close"> Fechar</i> 
        </button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    //aqui**************************************************************************************************
$(document).ready(function() {
    $(document).on('submit', '#form_categoria', function(event){  
    event.preventDefault(); 
        var serealizaDados = $('#form_categoria').serializeArray();
        $.ajax({
            url: "<?php echo base_url(); ?>categoria/add_assunto",
            type:'POST',
            dataType: "json",
            data: serealizaDados,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                        $(".print-error-msg").css('display','none');
                        //alert(data.success);
                        $(".success-msg").css('display','block');
                        $('#form_categoria')[0].reset();
                        $(".success-msg").fadeOut(3000);
                        $(".success-msg").html(data.success);
                }else{
                        $(".print-error-msg").css('display','block');
                        $(".print-error-msg").html(data.error);
                }
            }
        });
    }); 
});
</script>

<script>
    //deletando conteudo conteudo
        $(document).on('click', '.delete_cat_mod', function(){  
           var user_id = $(this).attr("id");  
           
           if(confirm("Você deseja deletar essa categoria?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>categoria/del_cat_publicacao/" + user_id,  
                     method:"POST",    
                     success:function(data)  
                     {  
                          document.getElementById("del_msg").innerHTML = data;
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
    //publicar conteudo
    $(document).on('click', '.alter_cat', function(){  
       var user_id = $(this).attr("id");  
       if(confirm("Você deseja alterar essa categoria?"))  
       {  
            $.ajax({
            url : "<?php echo site_url('categoria/select_categoria_modal/')?>/" + user_id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_ctg"]').val(data.id_ct);
                $('[name="cate_moodal"]').val(data.nome_cat);

                $('#exampleModalCenter').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Altear categoria'); // Set title to Bootstrap modal title

                },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
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
//alterando a categoria
      $(document).on('submit', '#form_cat_update', function(event){  
           event.preventDefault();  
           var cate_moodal = $('#cate_moodal').val();
           var up_id = $('#id_ctg').val();
           //alert(cate_moodal);
           if(cate_moodal != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'categoria/update_categoria/'?>" + up_id,  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          alert(data);  
                          $('#form_cat_update')[0].reset();  
                          $('#exampleModalCenter').modal('hide'); 
                     }  
                });  
           }  
           else  
           {  
                alert("Por favor digite uma categoria");  
           }  
      });  
</script>

<script>
    //buscar o modal para visualizar a cateria no modal foto
    $(document).on('click', '.imagem_foto', function(){  
       var user_id = $(this).attr("id");  
       if(confirm("Você deseja adicionar uma imagem?"))  
       {  
            $.ajax({
            url : "<?php echo site_url('categoria/select_categoria_modal/')?>/" + user_id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_image"]').val(data.id_ct);
                $('[name="cat_nome_image"]').val(data.nome_cat);

                $('#exampleModalFoto').modal('show'); // show bootstrap modal when complete loaded$('.modal-title').text('Altear categoria'); // Set title to Bootstrap modal title

                },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });  
               }  
        else  
        {  
             return false;       
        }  
    }); 
</script>
   <script type="text/javascript">
      $('#upload_form_image').on('submit', function(e){  
           e.preventDefault(); 
           if($('#imagem_cat').val() == '')  
           {  
                alert("Por favor selecione uma imagem");  
           }  
           else  
           {  
                $.ajax({   
                     url : "<?php echo site_url('categoria/uploadImage')?>",
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image').html(data);  
                     },
                     error: function()
                     {
                         alert('não conexao com a base de dados');
                     }
                });  
           }  
      });
   </script>