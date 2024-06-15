<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php helper('App\Helpers\filtra_url'); ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php 
    if(isset($titulo)){ 
      echo $titulo.' | Haplelo'; 
    }else{ 
      echo 'Haplelo'; 
    }
  ?></title>

  <link rel="shortcut icon" type="image/png" href="<?=filtra_url(base_url('img/favicon.png'))?>" >

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= filtra_url(base_url('/css/estilo.css')) ?>">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  
  <script src="<?= filtra_url(base_url('/js/main.js')) ?>"></script><!-- principal script -->

</head>

<body>
  <header>

    <nav class="navbar navbar-expand-md bg-body-tertiary py-0">
      <div class="container-fluid">

        <!-- logo -->
        <a href="<?= base_url() ?>" title="Home" class="navbar-brand">
          <img src="<?= filtra_url(base_url('/img/logo_v5.svg')) ?>" style="max-width:200px" class="me-3">
        </a><!-- /logo -->

        <!-- menu sanduíche -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-licitacoes" aria-controls="menu-licitacoes" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button><!-- /menu sanduíche -->

        <style>.nav-link span:hover{border-bottom:8px #0d6efd solid;}</style>

        <div class="collapse navbar-collapse" id="menu-licitacoes">

          <!-- menu -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li><a href="<?= base_url('/') ?>" class="nav-link px-3 link-secondary"><span>Try now</span></a></li>
            <li><a href="<?= base_url('/index.php/example') ?>" class="nav-link px-3 link-secondary"><span>Example</span></a></li>
            <li><a href="#" class="nav-link px-3 link-secondary" data-bs-target="#about" data-bs-toggle="modal"><span>About</span></a></li>
          </ul><!-- /menu -->

          <!-- buscar  -->
          <!-- <form class="d-flex col-md-4 col-lg-5" role="search" action="<?= base_url('/buscar') ?>">
            <div class="form-floating col-12">

              <input type="text" class="form-control border-0 shadow-sm me-1" name="q" id="buscar"  autocomplete="off" placeholder="Buscar ">
              <label class="text-muted" for="buscar">
                <i class="bi bi-search me-1"></i> Buscar 
              </label>

              <input type="submit" hidden />
            </div>
          </form> -->
          <!-- /buscar  -->
        </div>
      </div><!-- FIM container -->
    </nav>
  </header>