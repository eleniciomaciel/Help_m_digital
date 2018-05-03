<?php $this->load->view('template_admin/head');?>
<?php $this->load->view('template_admin/menu');?>
<?php $this->load->view('template_admin/aside');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

            <button type="button" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target=".bd-exampleConteudo-modal-lg">
                <i class="fa fa-cogs"> Adicionar conteúdo</i>
            </button>

<!-- /************************************************************************************.inicio table -->
<div class="box">
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Categoria</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                    <?php
                    $this->db->select('*');
                    $this->db->from('conteudo_c');
                    $this->db->join('man_categoria', 'conteudo_c.categoria_fk_c = man_categoria.id_ct');
                    $this->db->join('man_titulo', 'man_titulo.id_titulo = conteudo_c.titulo_c');
                    $this->db->order_by('id_c', 'DESC');
                    $sl = $this->db->get();
                    foreach ($sl->result() as $dd) {
                            ?>
                            <tr>
                                <td><?php echo $dd->nome_titulo;?></td>
                                <td><?php echo $dd->descricao_c;?></td>
                                <td><?php echo $dd->nome_cat;?></td>
                                <td><?php 
                                        if($dd->revisar_publicado == '1') {
                                            echo $dd->revisar_publicado = '<span class="badge bg-blue">Publicado!</span>';
                                        }elseif ($dd->revisar_publicado == NULL) {
                                            echo $dd->revisar_publicado = '<span class="badge bg-red">Em revisão!</span>';
                                        }
                                    ;?>
                                </td>
                                <td>
                                    <ul class="nav nav-tabs pull-left">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                                    Opções <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#" class="verConteudo" id="<?php echo $dd->id_c;?>">
                                                                <i class="fa fa-eye"> Alterar</i>
                                                        </a>
                                                </li>
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" class="publicar" href="#" id="<?php echo $dd->id_c;?>">
                                                            <i class=" fa fa-check-square-o"> Publicar</i>    
                                                        </a>
                                                </li>
                                                <li role="presentation" class="divider"></li>
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#" class="delete" id="<?php echo $dd->id_c ;?>">
                                                        <i class="fa fa-trash"> Deletar</i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php
                    }
                    ?>


                </tbody>
                <tfoot>
                <tr>
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Categoria</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                </tfoot>
              </table>
            </div>
		</div>
<!-- /************************************************************************************.fim table -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>


<?php $this->load->view('template_admin/footer-html');?>

<!-- Modal visualizar conteúdo e update dos conteúdos via ajax json DADOS VINDO DO FOOTER ***************************************/////////////////////////////////-->
<div class="modal fade bd-exampleVer-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //INICIO FORM VER -->
                <form id="form_update_conteudo">
                <div class="alert alert-danger print-error-msg" style="display:none"></div>
                    <div class="form-group">
                        <label>Título:</label>

                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-width"></i>
                          </div>
                            <select class="form-control"  name="titulo_cont" id="titulo_cont">
                            <option selected="" disabled="" value="">Selecione aqui...</option>
                                <?php
                                $this->db->select('*');
                                $this->db->from('man_titulo');
                                $this->db->order_by('id_titulo', 'DESC');
                                $query_titulo = $this->db->get();
                                foreach ($query_titulo->result() as $tit) {
                                        ?>
                                        <option value="<?php echo $tit->id_titulo ;?>"><?php echo $tit->nome_titulo ?></option>
                                        <?php
                                      }
                                ?>
                          </select>
                        </div>
                        <!-- /.input group -->
                      </div>

                      <!-- /.form group -->

                      <!-- phone mask -->
                      <div class="form-group">
                        <label>Descrição:</label>

                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-align-left"></i>
                          </div>
                            <input type="text" class="form-control" name="descri_cont" id="descri_cont">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->

                      <!-- phone mask -->
                      <div class="form-group">
                        <label>Categoria:</label>

                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-list-ul"></i>
                          </div>
                            <select class="form-control"  name="catego_cont" id="catego_cont">
                                <option selected disabled value="">Selecione aqui...</option>
                                <?php
                                $this->db->select('*');
                                $this->db->from('man_categoria');
                                $this->db->order_by('id_ct', 'DESC');
                                $result = $this->db->get();
                                foreach ($result->result() as $res) {
                                        ?>
                                <option value="<?php echo $res->id_ct ;?>"><?php echo $res->nome_cat ?></option>
                                        <?php
                                      }
                                ?>
                          </select>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                      <!-- IP mask -->
                      <div class="form-group">
                          <label>Conteúdo</label>
                          <textarea class="form-control" id="assunt_cont" name="assunt_cont" rows="6" placeholder="Digite aqui um assunto..."></textarea>
                        </div>
                      <!-- /.form group -->
                      <div class="checkbox">
                        <label>
                            <input type="checkbox" name="status_cont" value="1" <?php echo set_checkbox('status_cont', '1'); ?> /> Publicar?
                        </label>
                      </div>
                      

                      <input type="hidden" name="id_cont" id="id_cont">
                      
                      <div class="callout callout-success success-msg" style="display:none"></div>


                      <button type="submit" class="btn btn-primary">
                          <i class="fa fa-refresh"> Alterar</i>  
                      </button>
                </form>
                <!-- //FIM FORM VER-->
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal adiciona conteudo da home do admin ////////////////////////////////////////////////////////////////////////////////////////////************-->
<div class="modal fade bd-exampleConteudo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar conteúdo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //inicio form -->
        <div class="box box-danger">
           
            <div class="box-body">
                <div class="alert alert-danger print-error-msg" style="display:none"></div>
            <form id="add_cont_dados">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Título:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-text-width"></i>
                  </div>
                    <select class="form-control"  name="titulo_conteudo_dd" id="titulo_conteudo_dd">
                    <option selected="" disabled="" value="">Selecione aqui...</option>
                        <?php
                        $this->db->select('*');
                        $this->db->from('man_titulo');
                        $this->db->order_by('id_titulo', 'DESC');
                        $query_titulo = $this->db->get();
                        foreach ($query_titulo->result() as $tit) {
                                ?>
                                <option value="<?php echo $tit->id_titulo ;?>"><?php echo $tit->nome_titulo ?></option>
                                <?php
                              }
                        ?>
                  </select>
                </div>
                <!-- /.input group -->
              </div>

              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Descrição:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-align-left"></i>
                  </div>
                    <input type="text" class="form-control" name="descricao_cont" id="descricao_cont">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Categoria:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-list-ul"></i>
                  </div>
                    <select class="form-control"  name="select_cat_dados" id="select_cat_dados">
                        <option selected disabled value="">Selecione aqui...</option>
                        <?php
                        $this->db->select('*');
                        $this->db->from('man_categoria');
                        $this->db->order_by('id_ct', 'DESC');
                        $result = $this->db->get();
                        foreach ($result->result() as $res) {
                                ?>
                        <option value="<?php echo $res->id_ct ;?>"><?php echo $res->nome_cat ?></option>
                                <?php
                              }
                        ?>
                  </select>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- IP mask -->
              <div class="form-group">
                  <label>Conteúdo</label>
                  <textarea class="form-control" id="editor1" name="editor2" rows="6" placeholder="Digite aqui um assunto..."></textarea>
                </div>
              <!-- /.form group -->
              <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="publish" id="publish" value="1">
                      Publicar
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="publish" id="publish" value="0">
                      Revisão
                    </label>
                  </div>
                </div>
              
              <div class="callout callout-success success-msg" style="display:none"></div>
              
              
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"> Salvar</i>  
              </button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        <!-- //fim do fom -->
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="atualizar()">
            <i class="fa fa-close"> Fechar</i>
        </button>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('template_admin/footer');?>
