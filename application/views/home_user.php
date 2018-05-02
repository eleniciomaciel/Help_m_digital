<?php $this->load->view('site_template/head');?>
<?php $this->load->view('site_template/navbar');?>

<main role="main">

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

        
      <div class="album text-muted">
        <div class="container">
            <h1 class="text-center">Categorias</h1>
          <div class="row">
              
              <?php foreach ($categ as $news_item): ?>

                <div class="card">
                    <a href="<?php echo site_url('visualizar-categoria/'.$news_item['id_ct']); ?>" title="Visualizar conteúdo">
                         <img class="img-fluid" src="<?php echo base_url().'upload/categoria/'.$news_item['img_cat'];?>" alt="Card image cap"/>
                    </a>
                    <p class="card-text text-center">
                        <?php echo $news_item['nome_cat']; ?>
                    </p>
                    <a href="<?php echo site_url('visualizar-categoria/'.$news_item['id_ct']); ?>" class="btn btn-primary" title="Visualizar categoria">
                        <i class="material-icons">touch_app</i> Visualizar
                    </a>
                </div>

            <?php endforeach; ?>
         
          </div>

        </div>
      </div>

    </main>

<?php $this->load->view('site_template/footer-html');?>

<?php $this->load->view('site_template/footer');?>
