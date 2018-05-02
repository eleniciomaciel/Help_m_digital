<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
          <img src="<?= base_url()?>style_home/assets/img/logo.png">
        </a>
        <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarCollapse" aria-label="Toggle navigation" type="button" data-target="#navbarCollapse" data-toggle="collapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url()?>">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalDuvida">
                  Dúvidas
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Suporte</a>
            </li>

            <li class="nav-item">
              <a href="<?=base_url('login');?>" title="">
                <button type="button" class="btn btn-info">Login</button>
              </a>
            </li>
          </ul>
        </div>
      </nav>
</header>



<!-- Modal -->
<div class="modal fade" id="exampleModalDuvida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="material-icons">help</i> Escreva sua dúvida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- //.inicio form -->
       <form class="needs-validation" novalidate="" id="form_my_help">
           <div class="alert alert-danger print-error-msg" style="display:none"></div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName"><i class="material-icons">person</i> Nome:</label>
                <input type="text" class="form-control" name="firstName_home" id="firstName_home" placeholder="Ex.: Ana">
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName"><i class="material-icons">local_library</i> Cargo:</label>
                <input type="text" class="form-control" name="cargo_home" id="cargo_home" placeholder="Ex.: Diretora">
              </div>
            </div>

            <div class="mb-3">
              <label for="email_user_home">Email:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">contact_mail</i></span>
                </div>
                  <input type="email" class="form-control" name="email_user_home" id="email_user_home" placeholder="Ex.: eu@escola.com">
              </div>
            </div>

            <div class="mb-3">
              <label for="Institution_home">Instituição:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">account_balance</i></span>
                </div>
                  <input type="text" class="form-control" name="Institution_home" id="Institution_home" placeholder="Ex.: Escola saber">
              </div>
            </div>

            <div class="mb-3">
              <label for="phone_home">Telefone:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">call</i></span>
                </div>
                  <input type="text" class="form-control" name="phone_home" id="phone_home">
              </div>
            </div>
           
            <div class="mb-3">
              <label for="phone_home">Assunto:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="material-icons">format_color_text</i></span>
                </div>
                  <input type="text" class="form-control" name="assunto_home" id="assunto_home">
              </div>
            </div>

            <div class="mb-3">
              <label for="address2"><i class="material-icons">border_color</i> Dúvidas:</label>
              <textarea class="form-control" name="help_here" id="help_here" rows="3" placeholder="Digite aqui..."></textarea>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3"><i class="material-icons">favorite</i> Já é nosso cliente?</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                  <input id="credit" name="cliente_home" id="cliente_home" value="Sim" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Sim</label>
              </div>
              <div class="custom-control custom-radio">
                  <input id="debit" name="cliente_home" id="cliente_home" value="Não" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Não</label>
              </div>
            </div>
            
            <div class="alert alert-success success-msg_home" role="alert" style="display:none"></div>
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                <i class="material-icons">touch_app</i> Enviar
            </button>
          </form>
       <!-- //.fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="material-icons">highlight_off</i>Fechar
        </button>
      </div>
    </div>
  </div>
</div>