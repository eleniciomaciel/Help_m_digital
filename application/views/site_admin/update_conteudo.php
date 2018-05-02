<?php $this->load->view('template_admin/head');?>
<?php $this->load->view('template_admin/menu');?>
<?php $this->load->view('template_admin/aside');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
    <section class="content">
            <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                    <div class="box-header with-border">
                                            <h3 class="box-title">Atualização do post</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <?php echo form_open_multipart('conteudo/alterar', array('role'=>'form','id'=>'form_update_save')); ?>
                                            <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Título</label>
                                                        <span class="text-red"><?php echo form_error('titi_up'); ?></span>
                  <select class="form-control" id="titulo_c" name="titulo_c" required>
                    <option selected disabled value="">Selecione aqui...</option>
                        <?php
                        $this->db->select('*');
                        $this->db->from('conteudo_c');
                        $this->db->join('man_titulo', 'man_titulo.id_titulo = conteudo_c.titulo_c');
                        $this->db->order_by('id_c', 'DESC');
                        $quer = $this->db->get();
                        foreach ($quer->result() as $rop) {
                                ?>
                                <option value="<?php echo $rop->id_titulo ;?>" <?php echo  set_select('select_cat', $rop->id_titulo); ?> ><?php echo $rop->nome_titulo ?></option>
                                <?php
                              }
                        ?>
                  </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="exampleInputPassword1">Descrição</label>
                                                            <span class="text-red"><?php echo form_error('desc_up'); ?></span>
                                                            <input type="text" placeholder="Descrição aqui..." class="form-control" id="desc_up" name="desc_up" value="<?php echo $content['descricao_c']?>">
                                                    </div>
                                                <input type="hidden" name="id_cont" id="id_cont" value="<?php echo $content['id_c']?>">
                                                    <div class="form-group">
                                                            <label for="exampleInputPassword1">Categoria do Post</label>
                                                            <span class="text-red"><?php echo form_error('myselect'); ?></span>
                                                            <select class="form-control" name="myselect" id="myselect">
                                                                    <option selected disabled value=""> Selecione aqui...</option>
                                                                    
                                                                    <?php
                                                                        $this->db->select('*');
                                                                        $this->db->from('man_categoria');
                                                                        $this->db->order_by('id_ct', 'DESC');
                                                                        $quer = $this->db->get();
                                                                        foreach ($quer->result() as $rop) 
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo $rop->id_ct ;?>" <?php echo  set_select('select_cat', $rop->id_ct); ?> ><?php echo $rop->nome_cat ?></option>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                            </select>
                                                    </div>

                                                    <div class="form-group">
                                                            <label>Conteúdo</label>
                                                            <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Digite aqui um assunto..."><?php echo $content['assunto_c']?></textarea>
                                                    </div>
                                                
 <div class="checkbox">
    <div class="form-group">
        <div class="radio">
          <label>
              <input type="radio" name="revisao" value="1" required="" <?php echo  set_radio('revisao', '1', TRUE); ?> />
            Publicar
          </label>
        </div>
        <div class="radio">
          <label>
              <input type="radio" name="revisao" value="0" required="" <?php echo  set_radio('revisao', '0'); ?> />
            Deixar para revisão
          </label>
        </div>
    </div>
</div>
                                            </div>
                                            <!-- /.box-body -->

                                            <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-save"> Alterar</i>
                                                    </button>
                                            </div>
                                    </form>
                            </div>
                            <!-- /.box -->

                    </div>
                    <!--/.col (left) -->

                    <!--/.col (right) -->
            </div>
            <!-- /.row -->
    </section>
	<!-- /.content -->
</div>


<?php $this->load->view('template_admin/footer-html');?>


<?php $this->load->view('template_admin/footer');?>
