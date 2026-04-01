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
        <p class="lead"><b>Haplo2D6</b> is a specialized bioinformatics tool that automates the analysis of CYP2D6 phenotype prediction based on user-provided genotyping data and reference information. The tool predicts haplotypes using the PHASE algorithm and then interprets the data to predict the CYP2D6 phenotype, offering an efficient and reliable solution for researchers and clinicians studying CYP2D6 polymorphisms.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="#try" class="btn btn-success btn-lg px-4 me-md-2">Run</a>
          <a href="<?=base_url('/index.php/documentation')?>" class="btn btn-outline-secondary btn-lg px-4">Documentation</a>
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
        <a id="btnCnv" class="btn btn-sm btn-success">Load example</a>

        <textarea class="form-control" placeholder="Insert the input here..." rows="5" name="input" id="input"></textarea>
        <p class="text-muted mt-2 mb-2">Paste an "inp file" here (<a href="<?=base_url('/input/input.inp')?>" target="_blank">download an example file</a>).</p>
      </div>
      <div class="col">
        <label class="badge bg-primary mb-1">B</label> <strong class="text-">Allele reference table</strong>
        <textarea class="form-control" placeholder="Insert the reference here..." rows="5" name="model"></textarea>
        <p class="text-muted mt-2 mb-2">Paste a "tabular reference file" here (<a href="<?=base_url('/input/model2.csv')?>" target="_blank">download an example file</a>).</p>
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
              <p class="mt-3"><strong>PHASE parameters <i class="bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-title='According to PHASE documentation: "each iteration consists of performing thinning interval steps through the Markov chain, and each step updates each individual once. The number of iterations required to obtain accurate answers depends on the complexity and size of the data set". PHASE defaults: 100 1 100'></i>:</strong></p>

              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="noi" id="noi" placeholder="Number of iterations (default: 20000)" disabled>
                    <label for="noi">Number of iterations (default: 20000)</label>
                  </div>
                </div>

                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="ti" id="ti" placeholder="Thinning interval (default 500)" disabled>
                    <label for="ti">Thinning interval (default 500)</label>
                  </div>
                </div>

                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="bi" id="bi" placeholder="Burn-in (default 1000)" disabled>
                    <label for="bi">Burn-in (default 1000)</label>
                  </div>
                </div>
              </div>
            </div>
          
            <label>
              <input type="checkbox" id="defaultCheckbox" checked>
              Use default parameters for CNV <i class="bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-title='Copy Number Variations. The default values ​​consider two copies per gene. Insert the ID followed by the number of copies. Change this value by entering one item per line, separated by commas. '></i>
            </label>

            <div id="cnv-container">
              <label for="cnvData" class="small text-muted">Insert the CNV data (<a href="<?=base_url('/input/cnv.csv')?>">download an example file</a>) <i class="bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-title='Example: 1,2'></i></label><br>
              <textarea id="cnvData" name="cnvData" rows="5" class="form-control col-6"></textarea>
            </div>

            <script>
              const checkbox = document.getElementById('defaultCheckbox');
              const container = document.getElementById('cnv-container');

              function toggleTextarea() {
                if (checkbox.checked) {
                  container.style.display = 'none';
                } else {
                  container.style.display = 'block';
                }
              }

              // Inicializa o estado
              toggleTextarea();

              // Evento ao mudar o checkbox
              checkbox.addEventListener('change', toggleTextarea);
            </script>
          </div>
        </div>
      </div>

    </div>

    <input type="submit" class="btn btn-success mt-3 mb-5 w-100 p-3" value="Run">
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el))

  document.getElementById("btnCnv").addEventListener("click", function () {

    const texto = `20
9
P 2617 4300 5222 6047 6816 7051 7189 7384 8381
SSSSSSSSS



1
    C   C   C   C   C   C   G   G   C   C   C   C   G   G   G   G   G   G
2
    G   G   C   C   C   C   G   G   C   C   T   T   G   G   G   G   C   C
3
    C   C   C   C   C   C   G   G   A   A   C   C   G   G   G   G   G   G
4
    C   C   T   T   C   C   G   G   C   C   C   C   G   G   G   G   C   C
5
    C   C   C   C   T   T   G   G   C   C   T   T   G   G   G   G   C   C
6
    C   C   C   C   C   C   G   G   C   C   T   T   G   G   G   G   G   G
7
    C   C   C   C   C   C   G   G   C   C   T   T   A   A   G   G   C   C
8
    C   C   C   C   C   C   G   G   C   C   C   T   G   A   G   G   G   C
9
    C   C   C   T   C   C   G   A   C   C   C   C   G   G   G   G   G   C
10
    C   C   C   C   C   T   G   G   C   C   C   T   G   G   G   G   G   C
11
    C   G   C   T   C   C   G   G   C   C   C   T   G   G   G   G   C   C
12
    C   C   T   T   C   C   A   A   C   C   C   C   G   G   G   G   C   C
13
    C   C   C   C   C   C   G   G   C   A   C   C   G   G   G   G   G   C
14
    C   G   C   C   C   C   G   G   C   C   T   T   G   G   G   A   C   C
15
    C   C   C   T   C   C   G   A   C   C   C   T   G   G   G   G   G   C
16
    C   C   C   C   C   T   G   G   C   C   T   T   G   A   G   G   C   C
17
    C   C   T   T   C   C   G   A   C   C   C   C   G   G   G   G   C   C
18
    C   C   C   C   C   C   G   G   C   A   C   T   G   A   G   G   G   C
19
    C   G   C   C   C   C   G   G   C   C   C   T   G   G   G   G   G   C
20
    C   G   C   C   C   C   G   G   C   C   T   T   G   G   G   G   G   C`;

    document.getElementById("input").value = texto;
});

</script>
<?= $this->endSection() ?>

