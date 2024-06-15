<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

<h2 class="mt-4 text-muted mb-2">Welcome to HAPLELO</h2>

<form action="<?= base_url('run') ?>" method="post">
  <label class="badge bg-success mb-1">Try now:</label>
  <div class="row">
    <div class="col">
      <textarea class="form-control" placeholder="Insert the input here..." rows="5" name="input"></textarea>
    </div>
    <div class="col">
      <p class="text-muted mt-2 mb-2">or submit the "inp file" here (<a href="/input/input.inp" target="_blank">download an example file</a>):</p>
      <input type="file" name="input">
    </div>
  </div>

  <div class="accordion accordion-flush mt-2" id="pmt">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
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
                  <input type="number" class="form-control" id="noi" placeholder="Number of iterations (default: 400000)">
                  <label for="noi">Number of iterations (default: 400000)</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="ti" placeholder="Thinning interval (default 1000)">
                  <label for="ti">Thinning interval (default 1000)</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="bi" placeholder="Burn-in (default 50000)">
                  <label for="bi">Burn-in (default 50000)</label>
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

<?= $this->endSection() ?>