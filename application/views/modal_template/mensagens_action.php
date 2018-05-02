 <!-- .//todas as mensagens -->
<div class="modal fade bd-exampleModalAllMsg-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensagems</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- .//listagem -->
        <div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Mensagens recebidas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list ui-sortable">
                  <div id="lerdados">
                       <!-- listagem das mensagens -->
                  </div>
              </ul>
            </div>
          </div>
        <!-- .//fim listagem -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-close"> Fechar</i>
        </button>
      </div>
    </div>
  </div>
</div>
 <!-- .//fim de todas as mensagens -->
 
 
 
 
  <!-- .//ler mensagen mensagens *****************************************************************************************************-->
  
  
  
  
<div class="modal fade bd-exampleModalReadMsg-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ler mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- .//listagem -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Deletar">
                    <i class="fa fa-trash-o"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" data-original-title="Imprimir">
                  <i class="fa fa-print"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                  <h3>Assuunto: <input type="text" class="form-control" name="msgLerAssunto" id="msgLerAssunto" disabled=""></h3>
                <h5>De: <input type="text" class="form-control" name="msgLerEmail" id="msgLerEmail" disabled="">
                  <span class="mailbox-read-time pull-right">15 Feb. 2016 11:03 PM</span></h5>
              </div>

              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">

                <textarea class="form-control" rows="6" name="msgLerText" id="msgLerText"></textarea>
                
                <input class="form-control" name="msgLerName" id="msgLerName" disabled="">
                
                <div class="box-body">
                    <div class="row">
                      <div class="col-xs-3">
                          <label><i class="fa fa-bank"></i> Instituição:</label>
                          <input type="text" class="form-control" name="msgLerInsti" id="msgLerInsti" disabled="">
                      </div>
                      <div class="col-xs-3">
                          <label><i class="fa fa-phone"></i> Telefone:</label>
                          <input type="text" class="form-control" name="msgLerTelef" id="msgLerTelef" disabled="">
                      </div>
                      <div class="col-xs-3">
                          <label><i class="fa fa-cogs"></i> Cargo:</label>
                          <input type="text" class="form-control" name="msgLerCargo" id="msgLerCargo" disabled="">
                      </div>
                      <div class="col-xs-3">
                          <label><i class="fa fa-heart"></i> Cliente:</label>
                          <input type="text" class="form-control" name="msgLerClient" id="msgLerClient" disabled="">
                      </div>
                    </div>
                  </div>
                
                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
            <div class="box-footer">
              <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Deletar</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
            </div>
            <!-- /.box-footer -->
          </div>
        <!-- .//fim listagem -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-close"> Fechar</i>
        </button>
      </div>
    </div>
  </div>
</div>
   
 
 
 
  <!-- .//responder mensagem ****************************************************************************************************************-->
  
  
  
<div class="modal fade bd-exampleModalAnswerMsg-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Responder mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- .//listagem -->
                  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="Para:">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Assunto:">
              </div>
              <div class="form-group">
                  <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="Responda aqui...">

                    </textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-left">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        <!-- .//fim listagem -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-close"> Fechar</i>
        </button>
      </div>
    </div>
  </div>
</div>
  <script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
<script>
    //faz a leitura da mensagem do modal das mensagens
        $('.viewmsgall').click(function() {
                $.ajax({
                url:"<?php echo base_url();?>mensagem/viewAllMsg",
                type:"GET",
                dataType:'json',
                success:function(data){
                    $('#lerdados').html(data);
                    $('.bd-exampleModalAllMsg-modal-lg').modal('show');
                },
                error:function(xhr,er){
                    alert('Sem mensagens no momento!');
                }
            });
        });
</script>
<script>
    //ler a mensagem no modal
      $(document).on('click', '.lerMsg', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>mensagem/ler_mensagem_one/" + user_id,  
                method:"POST",    
                dataType:"json",  
                success:function(data)  
                {  
                     $('.bd-exampleModalReadMsg-modal-lg').modal('show');  
                     $('#msgLerName').val(data.nome_msg);  
                     $('#msgLerCargo').val(data.carg_msg);
                     $('#msgLerEmail').val(data.emai_msg);  
                     $('#msgLerInsti').val(data.inst_msg);
                     $('#msgLerTelef').val(data.tele_msg);  
                     $('#msgLerAssunto').val(data.assu_msg);
                     $('#msgLerText').val(data.mens_msg);
                     $('#msgLerClient').val(data.clie_msg);
                     
                     $('.modal-title').text("Ler mensagem");  
                     $('#msgLerId').val(user_id);  
                      
                },
                error:function(){
                    alert('Error ao se conectar com a base de dados.');
                }
           })  
      });
</script>