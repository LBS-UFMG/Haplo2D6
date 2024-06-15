<?php helper('App\Helpers\filtra_url'); ?>

<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->

<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
<!-- adicione o conteúdo principal aqui -->

    <h1>Project example</h1>

    <div class="row mt-4">
        <div class="col-12 col-md-9 small">
            <div class="table-responsive">

                <table class="table table-hover table-striped" id="resultado">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Haplotype #1</th>
                            <th>Enzymatic activity #1</th>
                            <th>Allele #1</th>
                            <th>Score #1</th>
                            <th>Haplotype #2</th>
                            <th>Enzymatic activity #2</th>
                            <th>Allele #2</th>
                            <th>Score #2</th>
                            <th>Total Score</th>
                            <th>Phenotype</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-md-3 p-4 bg-light">
            <p class="text-muted">Download files:</p>
            <ul>
                <li><a href="<?=filtra_url(base_url('/example/final.csv'))?>">final.csv</a></li>

                <li><a href="<?=filtra_url(base_url('/example/halelos.csv'))?>">halelos.csv</a></li>
                <li><a href="<?=filtra_url(base_url('/example/pacientes.csv'))?>">pacientes.csv</a></li>
                <li><a href="<?=filtra_url(base_url('/example/output'))?>">output</a></li>
                <li><a href="<?=filtra_url(base_url('/example/output_freqs'))?>">output_freqs</a></li>
                <li><a href="<?=filtra_url(base_url('/example/output_hbg'))?>">output_hbg</a></li>
                <li><a href="<?=filtra_url(base_url('/example/output_monitor'))?>">output_monitor</a></li>
                <li><a href="<?=filtra_url(base_url('/example/output_pairs'))?>">output_pairs</a></li>
                <li><a href="<?=filtra_url(base_url('/example/output_probs'))?>">output_probs</a></li>
                <li><a href="<?=filtra_url(base_url('/example/output_recom'))?>">output_recom</a></li>
                <li><a href="<?=filtra_url(base_url('/example/log.txt'))?>">log.txt</a></li>
            </ul>
        </div>
    </div>
    

<script>

    $(()=>{
        fetch('<?=filtra_url(base_url("/example/final.csv"))?>')
            .then(response => response.text())
            .then(dados => {

                // console.log('datatable:', dados)
                $('#resultado').DataTable({
                    data: dados.split('\n')
                        .filter(j=>{if(j.substr(0,1) != ','){return j}})
                        .map(i=>{
                            itens = i.split(',')
                            // console.log(itens)
                            return itens
                        }),
                        pageLength: 50,
                })
            })
        
    })

</script>

<?= $this->endSection() ?>
