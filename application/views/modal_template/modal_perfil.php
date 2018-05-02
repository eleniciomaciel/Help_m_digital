<!-- Modal -->
<div class="modal fade bd-examplePerfil-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Perfíl do usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <!-- //Inicio form -->
        <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Informações do perfíl</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            
<img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>style_admin/dist/img/user4-128x128.jpg" alt="User profile picture">

			  <hr>
        <form method="post" id="form_perfil">


            <div class="col-md-6">
              <div class="form-group">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" id="nome_user" name="nome_user" placeholder="Ex.: Ana" required>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label for="inputAddress">Telefone</label>
                <input type="text" class="form-control" id="tele_user" name="tele_user" placeholder="Ex.: (74) 91234-1234" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputAddress">Login</label>
                <input type="text" class="form-control" id="login_user" name="login_user" placeholder="Ex.: ana@municipio.com" required>
              </div>
              <!-- /.form-group -->
                <div class="form-group">
					<label for="inputCity">Senha:</label>
					<input type="password" class="form-control" id="senha_user" name="senha_user" placeholder="Nova Senha...">
                </div>
              <!-- /.form-group -->
            </div>
              
    <div class="form-group col-md-12">

        <br>
		<div id="text_msg"></div>
		<hr>
    <input type="hidden" name="user_id" id="user_id">
        <button type="submit" class="btn btn-primary" id="action">
            <i class="fa fa-save"> Alterar</i>
        </button>
    </div>
           </form>   
              
              
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
    <!-- fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="atualizar()" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>
    //selecionando os dados do perfil do usuario
    $(document).on('click', '.view_perfil', function(){
        var user_id = $(this).attr("id");
        $.ajax({
                url:"<?php echo base_url(); ?>perfil/fetch_single_user",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                        $('.bd-examplePerfil-modal-lg').modal('show');
                        $('#nome_user').val(data.nome_user);
                        $('#tele_user').val(data.tele_users);
                        $('#login_user').val(data.login_user);
                        $('#user_id').val(data.id_users);
                        $('.modal-title').text("Dados do perfil do usuário");
                        //$('#user_uploaded_image').html(data.user_image);
                }
        })
    });
</script>
<script>
	$(document).on('submit', '#form_perfil', function(event){
		event.preventDefault();

		var nome_user 	= $('#nome_user').val();
		var tele_user 	= $('#tele_user').val();
		var login_user 	= $('#login_user').val();
		var senha_user 	= $('#senha_user').val();
		var user_id = $('#user_id').val();

		if(nome_user != '' && tele_user != '')
		{
			$.ajax({
				url:"<?php echo base_url() . 'perfil/update_perfil/'?>" + user_id,
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					document.getElementById("text_msg").innerHTML = data;
					$('.bd-examplePerfil-modal-lg').modal('show');
				},
				error:function(){
					alert("Error ao atualizar")
				}
			});
		}
		else
		{
			alert("Por favor preencha todos os campo.");
		}
	});
</script>
<script>
	function atualizar() {
		history.go(0);
	}
</script>
