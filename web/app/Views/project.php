<?php helper('App\Helpers\filtra_url'); ?>

<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->

<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
<!-- adicione o conteúdo principal aqui -->
<?php if(!$ready): ?>

<div class="text-center text-muted my-5">

    <div class="alert alert-info small">This is project ID <a href="<?=base_url('/project/'.$id)?>"><?=$id?></a>. When processing is complete, this page will automatically refresh.</div>

    <h1>PHASE is running...</h1>
    <h1 class="display-1" id="time"></h1>
    <p>Please, wait...</p>

    <script>
    const local = document.querySelector('#time');

    function contar(duracao, onde) {
        let timer = duracao, minutes, seconds;

        setInterval(function () {

            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            onde.textContent = minutes + ":" + seconds;
            if (--timer < 0) {
                timer = 0;
                window.location.href = "<?=base_url('/project/'.$id)?>";
            }
        }, 1000);
    }

    window.onload = function () {
        let duracao = 10 * 60 * 1; // Converter para segundos
        contar(duracao, local); // iniciando o timer
    };

</script>

</div>
<?php else: ?>
    <h1>The project is ready</h1>

    <div class="row mt-4">
        <div class="col-12 col-md-9 small">
            <div class="table-responsive">

                <table class="table table-hover table-striped" id="resultado">
                    <thead>
                        <tr>
                            <!-- <th>#</th>
                            <th>patient_id</th>
                            <th>1_haplotype</th>
                            <th>1_enzymatic_activity</th>
                            <th>1_allele</th>
                            <th>1_score</th>
                            <th>2_haplotype</th>
                            <th>2_enzymatic_activity</th>
                            <th>2_allele</th>
                            <th>2_score</th>
                            <th>total_score</th>
                            <th>phenotype</th> -->
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
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/final.csv'))?>">final.csv</a></li>

                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/halelos.csv'))?>">halelos.csv</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/pacientes.csv'))?>">pacientes.csv</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output'))?>">output</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_freqs'))?>">output_freqs</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_hbg'))?>">output_hbg</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_monitor'))?>">output_monitor</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_pairs'))?>">output_pairs</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_probs'))?>">output_probs</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/output_recom'))?>">output_recom</a></li>
                <li><a href="<?=filtra_url(base_url('/data/'.$id.'/log.txt'))?>">log.txt</a></li>
            </ul>
        </div>
    </div>
    

    <!-- gráficos -->
<div class="container">
    <div class="row py-5">
        <div class="col">
            <h2>Frequency of Haplotypes</h2>
            <canvas id="g1" style="max-width: auto"></canvas>
        </div>
        <div class="col">
            <h2>Frequency of Enzymatic Acitity</h2>
            <canvas id="g2" style="max-width: auto"></canvas>
        </div>
    </div>
    <div class="row pb-5">
        <div class="col">
            <h2>Frequency of Phenotype</h2>
            <canvas id="g3" style="max-width: auto"></canvas>
        </div>
        <div class="col">
            <h2>Frequency of total score</h2>
            <canvas id="g4" style="max-width: auto"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>

<script>
    // Leitura do CSV e criação do gráfico
    Papa.parse('<?=filtra_url(base_url("/data/$id/halelos.csv"))?>', {
        download: true,
        complete: function(results) {
            const labels = [];
            const data = [];

            // Itera pelos resultados para extrair os dados
            results.data.forEach((row, index) => {
                if (index > 0 && row.length === 3) { // Ignora o cabeçalho e verifica o comprimento correto da linha
                    labels.push(row[1]);
                    data.push(parseFloat(row[2]));
                }
            });

            // Configuração do gráfico
            const ctx = document.getElementById('g1').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Values',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // Isto transforma o gráfico de barras em horizontal
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>

<script>
    // Função para contar a frequência dos haplótipos
    function countHaplotypes(data, column) {
        const counts = {};
        data.forEach(row => {
            const haplotype = row[column];
            if (haplotype) {
                counts[haplotype] = (counts[haplotype] || 0) + 1;
            }
        });
        return counts;
    }

    // Leitura do CSV e criação do gráfico
    Papa.parse('<?=filtra_url(base_url("/data/$id/final.csv"))?>', {
        download: true,
        header: true,
        complete: function(results) {
            const data2 = results.data;

            // Contar a frequência dos haplótipos
            const haplotype1Counts = countHaplotypes(data2, '1_enzymatic_activity');
            const haplotype2Counts = countHaplotypes(data2, '2_enzymatic_activity');

            // Combinar os haplótipos e suas frequências
            const allHaplotypes = {};
            for (const haplotype in haplotype1Counts) {
                allHaplotypes[haplotype] = (allHaplotypes[haplotype] || 0) + haplotype1Counts[haplotype];
            }
            for (const haplotype in haplotype2Counts) {
                allHaplotypes[haplotype] = (allHaplotypes[haplotype] || 0) + haplotype2Counts[haplotype];
            }

            // Preparar dados para o gráfico
            const labels = Object.keys(allHaplotypes);
            const values = Object.values(allHaplotypes);

            // Configuração do gráfico
            const ctx2 = document.getElementById('g2').getContext('2d');
            const haplotypeChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Frequency',
                        data: values,
                        backgroundColor: 'rgba(100, 100, 192)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // Isto transforma o gráfico de barras em horizontal
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>

<script>
    // Função para contar a frequência dos fenótipos
    function countPhenotypes(data) {
        const counts = {};
        data.forEach(row => {
            const phenotype = row['phenotype'];
            if (phenotype) {
                counts[phenotype] = (counts[phenotype] || 0) + 1;
            }
        });
        return counts;
    }

    // Leitura do CSV e criação do gráfico
    Papa.parse('<?=filtra_url(base_url("/data/$id/final.csv"))?>', {
        download: true,
        header: true,
        complete: function(results) {
            const data = results.data;

            // Contar a frequência dos fenótipos
            const phenotypeCounts = countPhenotypes(data);

            // Preparar dados para o gráfico
            const labels = Object.keys(phenotypeCounts);
            const values = Object.values(phenotypeCounts);

            // Configuração do gráfico
            const ctx = document.getElementById('g3').getContext('2d');
            const phenotypeChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Frequency',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 100)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>
<script>
    // Função para contar a frequência dos valores de total_score
    function countTotalScores(data) {
        const counts = {};
        data.forEach(row => {
            const totalScore = row['total_score'];
            if (totalScore) {
                counts[totalScore] = (counts[totalScore] || 0) + 1;
            }
        });
        return counts;
    }

    // Leitura do CSV e criação do gráfico
    Papa.parse('<?=filtra_url(base_url("/data/$id/final.csv"))?>', {
        download: true,
        header: true,
        complete: function(results) {
            const data = results.data;

            // Contar a frequência dos valores de total_score
            const totalScoreCounts = countTotalScores(data);

            // Preparar dados para o gráfico
            const labels = Object.keys(totalScoreCounts);
            const values = Object.values(totalScoreCounts);

            // Configuração do gráfico
            const ctx = document.getElementById('g4').getContext('2d');
            const totalScoreChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Frequency',
                        data: values,
                        backgroundColor: 'rgba(75, 100, 100)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>

<!-- fim/gráficos -->

<?php endif; ?>

<script>

    $(()=>{
        fetch('<?=filtra_url(base_url("/data/$id/final.csv"))?>')
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
                        pageLength: 25,
                })
            })
        
    })

</script>

<?= $this->endSection() ?>
