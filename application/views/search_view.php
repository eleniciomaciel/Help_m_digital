<?php $this->load->view('site_template/head');?>
<?php $this->load->view('site_template/navbar');?>
<?php $dados = $this->news_model->home_categoria_site();?>

    <main role="main">

<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Suporte online</h1>

  

      <p class="lead text-muted">
          Aqui você encontra os conteúdos de nossa plataforma, entenda como o app funciona e como 
          ele pode agilizar a sua vida escolar. Encontra suporte e atendimento online para a sua equipe.
      </p>
      <p>
        <a href="#" class="btn btn-primary">Central de atendimento</a>
        <a href="#" class="btn btn-secondary">Recursos do app</a>
      </p>
    </div>
</section>

        <main role="main" class="container">
      <div class="row">
          <!-- //.inicio do laço -->
          
          

        <?php foreach($data as $row):?>   
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            <?php echo $row->nome_titulo;?> 
          </h3>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row->descricao_c;?> </h2>
            <p class="blog-post-meta">Publicado em <?php echo $row->data_c;?></p>
           
                <div class="container">
                    <div class="row">
                    <div class="col-12">
                        <?php echo $row->assunto_c;?>
                    </div>
                    </div>
                </div>
          </div><!-- /.blog-post -->


        </div>
       <?php endforeach;?>  
          <!-- /.fim do laço -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Categorias</h4>
            <p class="mb-0">Pesquisa por categoria.</p>
          </div>

          <div class="p-3">
            <ol class="list-unstyled mb-0">
                <li>
                    <?php foreach ($dados as $news_item): ?>
                        <a href="<?php echo site_url('visualizar-categoria/'.$news_item['id_ct']); ?>">
                            <?php echo $news_item['nome_cat']; ?>
                        </a><br>
                    <?php endforeach; ?>
              </li>
            </ol>
          </div>

        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main>
    </main>

<?php $this->load->view('site_template/footer-html');?>

<?php $this->load->view('site_template/footer');?>
