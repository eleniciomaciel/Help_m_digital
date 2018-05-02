<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('template_admin/head');?>
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ambiente restrito</p>

    <?php echo form_open('welcome/login'); ?>
      <?php
      if($this->session->flashdata('error')){
          ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                <?php echo $this->session->flashdata('error')?>
              </div>
          <?php
      }
      ?>
      <span class="text-red"><?php echo form_error('login_user'); ?></span>
      <div class="form-group has-feedback">
        <input type="email" name="login_user" class="form-control" placeholder="Login" value="<?php echo set_value('login_user'); ?>" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <span class="text-red"><?php echo form_error('pass_senha'); ?></span>
      <div class="form-group has-feedback">
        <input type="password" name="pass_senha" class="form-control" placeholder="Senha" value="<?php echo set_value('pass_senha'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">
              <i class="fa fa-sign-in"> Logar</i>
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="#">Esqueci a minha senha?</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
</body>
</html>