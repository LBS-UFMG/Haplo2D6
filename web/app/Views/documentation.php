<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

<div class="container col-xxl-10 px-2 py-0">

    <h1 class="mt-5 mb-4">Haplo2D6 documentation</h1>

    <h2 class="text-muted mb-3 mt-3">What is Haplo2D6?</h2>

    <p class="text-muted">Haplo2D6 is a specialized bioinformatics tool designed to predict star alleles (haplotypes) within the CYP2D6 gene by analyzing genotyping data, including SNPs and deletions. It offers an efficient and concise solution for researchers and clinicians studying the polymorphic nature of CYP2D6.</p>


    <p class="text-muted">CYP2D6 is a crucial enzyme responsible for the metabolism of 25% of prescribed medications, with a highly polymorphic nature. Haplo2D6 addresses this complexity, providing a targeted approach to haplotype and enzyme activity prediction.</p>

    <p class="text-muted">Using advanced algorithms, Haplo2D6 predicts the star allele and the enzyme activity of CYP2D6, streamlining the analysis process. Its quick and reliable prediction of star alleles facilitates a better understanding of the genetic variations within CYP2D6.</p>

    <p class="text-muted">Haplo2D6, as the name suggests, draws its inspiration from the term "haplotype", representing a combination of alleles within adjacent loci on the same chromosome, typically inherited as a unit. The "2D6" component references the CYP2D6 enzyme, a member of the cytochrome P450 superfamily encoded by the gene situated in the Cytochrome P450 Family 2 Subfamily D Member 6.

    <center><img src="<?= base_url('/img/home.png') ?>" width="400px"></center>

    <h2 class="text-muted mt-5 pb-2">Where does the data used for analysis come from?</h2>

    <p class="text-muted">All data comes from the <a href="https://www.pharmvar.org/gene/CYP2D6" target="_blank">phamvar database</a>.</p>

    <h2 class="mt-5 mb-3 text-muted">What output does Haplo2D6 provide?</h2>

    <ul class="text-muted mb-5">
        <li>patient_id: individual identification (ID)</li>
        <li>1_haplotype: Haplotype 1 (Haplotype)</li>
        <li>1_allele: Star allele for haplotype 1 (Star allele)</li>
        <li>1_score: Activity score for haplotype 1 (Activity score)</li>
        <li>1_enzymatic_activity: Enzymatic activity for haplotype 1 (Enzymatic activity)</li>
        <li>1_score: Activity score for haplotype 1 (Activity score)</li>
        <li>2_haplotype: Haplotype 2 (Haplotype)</li>
        <li>2_enzymatic_activity: Enzymatic activity for haplotype 1</li>
        <li>2_allele: Star allele for haplotype 1</li>
        <li>2_score: Activity score for haplotype 1</li>
        <li>total_score: Final score of the two haplotypes that give the activity score (Total score)</li>
        <li>phenotype: Predicted phenotype of the individual</li>
    </ul>

    <h2 class="text-muted">SNPs evaluated</h2>

    <div class="mb-5">
    <p class="text-muted">In the current version, Haplo2D6 only evaluates the following SNPs:</p>

    <p class="text-muted">
        <strong>rsID</strong>	rs3892097	rs28371725	rs59421388	rs1065852	rs28371706	rs1080985	rs16947	rs1135840	rs5030656
    </p>
    <p class="text-muted"><strong>Nucleotide changes M33388</strong>	1846G>A 	2988G>A 	3183G>A 	100C>T	1023C>T/A	 -1584C>G	2850C>T 	4180G>C 	2615delAAG </p>
    <p class="text-muted"><strong>Effect on protein (NP_000097.3)</strong>	Splicing defect	Splicing defect	V338M	P34S	T107I/N	5' region	R296C	S486T	K281del</p>
    <p class="text-muted"><strong>Position at NC_000022.11 (Homo sapiens chromosome 22, GRCh38.p2)</strong>	g.42128945C>T	g.42127803C>T	g.42127608C>T	g.42130692G>A	g.42129770G>A/T	g.42132375G>C	g.42127941G>A	g.42126611C>G	g.42128174delCTT</p>
    <p class="text-muted"><strong>Position at NG_008376.3</strong> (CYP2D6 RefSeqGene; reverse relative to chromosome)	g.6047G>A	g.7189G>A	g.7384G>A	g.4300C>T	g.5222C>T/A	g.2617C>G	g.7051C>T	g.8381G>C	g.6816delAAG</p>

    </div>
    <center class="mb-5"><img src="<?= base_url('/img/home2.png') ?>" width="400px"></center>


</div>

<?= $this->endSection() ?>
