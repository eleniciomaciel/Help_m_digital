  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
	   <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>style_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>style_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>style_admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>style_admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>style_admin/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?=base_url()?>style_admin/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>style_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Designers datatable -->
<script src="<?=base_url()?>style_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- funções data table  -->
<script src="<?=base_url()?>style_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script src="<?=base_url()?>style_admin/bower_components/ckeditor/ckeditor.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?=base_url()?>style_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- jquery Validation  -->
  <script src="<?=base_url()?>style_admin/js/jquery.validate.js"></script>



<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
 $(document).ready(function(){  

        $(document).on('click', '.delete', function(){  
           var user_id = $(this).attr("id");  
           
           if(confirm("Você deseja deletar essa publicação?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>conteudo/delete_publicacao/" + user_id,  
                     method:"POST",    
                     success:function(data)  
                     {  
                         swal({
                                title: "Parabéns!",
                                text: data,
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
//publicar conteudo
        $(document).on('click', '.publicar', function(){  
           var user_id = $(this).attr("id");  
           
           if(confirm("Você deseja publicar essa publicação?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>conteudo/publicar_publicacao/" + user_id,  
                     method:"POST",    
                     success:function(data)  
                     {  
                        swal({
                            title: "Parabéns!",
                            text: data,
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
  });
</script>

<script type="text/javascript">
    //faz a inserção do modal conteudo ha home admin do site
$(document).ready(function() {
    $(document).on('submit', '#add_cont_dados', function(event){  
        event.preventDefault(); 
        var serealizaDados = $('#add_cont_dados').serializeArray();
        $.ajax({
            url: "<?php echo base_url(); ?>conteudo/add_assunto",
            type:'POST',
            dataType: "json",
            data: serealizaDados,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                        $(".print-error-msg").css('display','none');
                        //alert(data.success);
                        $(".success-msg").css('display','block');
                        $('#add_cont_dados')[0].reset();
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
    //levando os dados para o model altera conteudo da home do admin
      $(document).on('click', '.verConteudo', function(){  
           var user_id = $(this).attr("id"); 
           $.ajax({  
                url:"<?php echo base_url(); ?>conteudo/ler_dados_conteudo_ajax/" + user_id,  
                method:"GET",    
                dataType:"json",  
                success:function(data)  
                {  
                     $('.bd-exampleVer-modal-lg').modal('show');  
                     $('#titulo_cont').val(data.titulo_cont);  
                     $('#descri_cont').val(data.descri_cont);
                     $('#catego_cont').val(data.catego_cont);  
                     $('#assunt_cont').val(data.assunt_cont);
                     $('#status_cont').val(data.status_cont);  
                     $('#id_cont').val(data.id_cont);
                     
                     $('.modal-title').text("Modal conteúdo");   
                      
                },
                error:function(){
                    alert('Error ao se conectar com a base de dados.');
                }
           })  
      });
</script>

<script>
    //FAZENDO UPDATE NO MODAL CONTEUDO**************************************************************UPDATE CONTEÚDO=============================
$(document).on('submit', '#form_update_conteudo', function(event){
    event.preventDefault(); 
    var id = $('#id_cont').val();  
  
    $.ajax({  
        url:"<?php echo base_url(); ?>conteudo/update_ajax/" + id,  
        method:"POST",    
        dataType:"json",  
        data: $('#form_update_conteudo').serialize(),
        success: function(data) {
            if($.isEmptyObject(data.error)){
                    $(".print-error-msg").css('display','none');
                    swal({
                        title: "Parabéns!",
                        text: data.success,
                        icon: "success",
                        button: "Ok!",
                      }).then(function() {
                            window.location = "<?=base_url('inicio')?>";
                        });
                    $('.bd-exampleVer-modal-lg').modal('hide');
                    
            }else{
                $(".print-error-msg").css('display','block');
                $(".print-error-msg").html(data.error);
            }
        },
        error:function(){
            alert('Error ao se conectar com a base de dados.');
        }
    })  
});
</script>
<?php $this->load->view('modal_template/modal_categoria');?>
<?php $this->load->view('modal_template/modal_usuarios');?>
<?php $this->load->view('modal_template/modal_perfil');?>
<?php $this->load->view('modal_template/modal_ordenacao');?>
<?php $this->load->view('modal_template/modal_titulo');?>
<?php $this->load->view('modal_template/mensagens_action');?>

</body>
</html>
