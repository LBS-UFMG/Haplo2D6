<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

<div class="container col-xxl-10 px-2 py-0">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= base_url('/img/home2.png') ?>" class="d-block mx-lg-auto img-fluid" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Welcome to Haplo2D6</h1>
        <p class="lead"><b>Haplo2D6</b> is a specialized bioinformatics tool designed to predict star alleles (haplotypes) within the CYP2D6 gene by analyzing genotyping data, including SNPs and deletions. It offers an efficient and concise solution for researchers and clinicians studying the polymorphic nature of CYP2D6.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="#try" class="btn btn-success btn-lg px-4 me-md-2">Run</a>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Documentation</button>
        </div>
      </div>
    </div>
  </div>


  <div class="row bg-light mt-5 px-2" id="try">
  <h2 class="mt-4 pt-4 pb-3 text-muted mb-2">Run Haplo2D6</h2>

  <form action="<?= base_url('index.php/run') ?>" method="post">
    <label class="badge bg-dark mb-1">Try now:</label>
    <div class="row">
      <div class="col">
        <label class="badge bg-success mb-1">A</label> <strong class="text-">Genotype data</strong>
        <textarea class="form-control" placeholder="Insert the input here..." rows="5" name="input"></textarea>
        <p class="text-muted mt-2 mb-2">Paste an "inp file" here (<a href="<?=base_url('/input/input.inp')?>" target="_blank">download an example file</a>).</p>
      </div>
      <div class="col">
        <label class="badge bg-primary mb-1">B</label> <strong class="text-">Allele reference table</strong>
        <textarea class="form-control" placeholder="Insert the reference here..." rows="5" name="model"></textarea>
        <p class="text-muted mt-2 mb-2">Paste a "tabular reference file" here (<a href="<?=base_url('/input/model.csv')?>" target="_blank">download an example file</a>).</p>
        </div>
    </div>

    <div class="accordion accordion-flush mt-2" id="pmt">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Set parameters (advanced)
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#pmt">
          <div class="accordion-body bg-light">
            <div>
              <p><strong>Input format:</strong></p>
              <input type="radio" checked><span class="ms-2">Tabular</span>
              <input type="radio" class="ms-5" disabled><span class="ms-2 text-muted">Separated by commas (unavailable)</span>
              <input type="radio" class="ms-5" disabled><span class="ms-2 text-muted">Separated by semicolon (unavailable)</span>
            </div>
            <div>
              <p class="mt-3"><strong>PHASE parameters <i class="bi bi-question-circle-fill" title='According to PHASE documentation: "each iteration consists of performing thinning interval steps through the Markov chain, and each step updates each individual once. The number of iterations required to obtain accurate answers depends on the complexity and size of the data set". PHASE defaults: 100 1 100'></i>:</strong></p>

              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="noi" id="noi" placeholder="Number of iterations (default: 100)" disabled>
                    <label for="noi">Number of iterations (default: 100)</label>
                  </div>
                </div>

                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="ti" id="ti" placeholder="Thinning interval (default 1)" disabled>
                    <label for="ti">Thinning interval (default 1)</label>
                  </div>
                </div>

                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="bi" id="bi" placeholder="Burn-in (default 100)" disabled>
                    <label for="bi">Burn-in (default 100)</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <input type="submit" class="btn btn-success mt-3 mb-5 w-100 p-3" value="Run">
  </form>
</div>
<?= $this->endSection() ?>
