<?php $this->load->view('site_template/head');?>
<?php $this->load->view('site_template/navbar');?>

<main role="main" class="container">
    <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Suporte online</h1>

      <form id="form_search" action="<?php echo site_url('search/search_all');?>" method="GET">
        <div class="input-group mb-3">
            <?php $this->load->view('template_home/search_home');?>
          </div>
      </form>

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
    
      <div class="row">
          
               <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h3>  
                <?php foreach ($cat_dados as $news_cat): ?>
                    <?php echo $news_cat['nome_cat']; ?>
                <?php endforeach; ?>
            </h3>
        </div>

          <div class="p-3">
            <h4 class="font-italic">Manual do usuário <i class="material-icons">send</i></h4>
            <ol class="list-unstyled mb-0">
                <?php foreach ($ordernacao as $news_ord): ?>
                    <li>
                        <a href="#"><?php echo $news_ord['nome_ordenacao']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->
        
        
        <!-- /.card flex-md-row mb-4 box-shadow h-md-250 -->
        <div class="col-md-8 blog-main ">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            <i class="material-icons">label_outline</i> Manual do usuário
          </h3>

        <div class="blog-post">
            <ol class="list-unstyled mb-0">
                <?php foreach ($cat_titulo as $news_tit): ?>
                    <li>
                        <a href="<?php echo site_url('leia-mais/'.$news_tit['id_titulo']); ?>">
                            <i class="material-icons">local_library</i> <?php echo $news_tit['nome_titulo']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div><!-- /.blog-post -->



        </div><!-- /.blog-main -->

 

      </div><!-- /.row -->

    </main>

<!-- /.row ////////////////////////////////////////////////////////////////////////////////////////***********************************************-->
<?php $this->load->view('site_template/footer-html');?>

<?php $this->load->view('site_template/footer');?>

