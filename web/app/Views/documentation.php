<!-- modelo para criação de views: copie este arquivo e apague os comentários -->
<?= $this->extend('template') ?>

<?= $this->section('scripts') ?>
<!-- adicione links para scripts aqui -->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>

<div class="container col-xxl-10 px-2 py-0">

    <h1 class="mt-5 mb-4">Haplo2D6 documentation</h1>

    <p><a href="<?=base_url('/docs/Documentation_Haplo2D6.pdf')?>">Click here</a> to download the complete documentation.</p>

    <h2 class="text-muted mb-3 mt-3">What is Haplo2D6?</h2>

    <p class="text-muted">Haplo2D6 is a specialized bioinformatics tool designed to predict star alleles (haplotypes) within the CYP2D6 gene by analyzing genotyping data, including SNPs and deletions. It offers an efficient and concise solution for researchers and clinicians studying the polymorphic nature of CYP2D6.</p>


    <p class="text-muted">CYP2D6 is a crucial enzyme responsible for the metabolism of 25% of prescribed medications, with a highly polymorphic nature. Haplo2D6 addresses this complexity, providing a targeted approach to haplotype and enzyme activity prediction.</p>

    <p class="text-muted">Using advanced algorithms, Haplo2D6 predicts the star allele and the enzyme activity of CYP2D6, streamlining the analysis process. Its quick and reliable prediction of star alleles facilitates a better understanding of the genetic variations within CYP2D6.</p>

    <p class="text-muted">Haplo2D6, as the name suggests, draws its inspiration from the term "haplotype", representing a combination of alleles within adjacent loci on the same chromosome, typically inherited as a unit. The "2D6" component references the CYP2D6 enzyme, a member of the cytochrome P450 superfamily encoded by the gene situated in the Cytochrome P450 Family 2 Subfamily D Member 6.

    <center><img src="<?= base_url('/img/home.png') ?>" width="400px"></center>


    <h2 class="mt-5 mb-3 text-muted">What output does Haplo2D6 provide?</h2>

    <ul class="text-muted mb-5">
    <li>ID: individual identification (ID)
</li><li>Haplotype #1: Haplotype 1 (Haplotype)
</li><li>Allele Functional #1: Enzymatic activity for haplotype 1 (Enzymatic activity)
</li><li>Allele #1: Star allele for haplotype 1 (Star allele)
</li><li>Activity Value #1: Activity score for haplotype 1 (Activity score)
</li><li>Haplotype #2: Haplotype 2 (Haplotype)
</li><li>Allele Functional #2: Enzymatic activity for haplotype 2 (Enzymatic activity)
</li><li>Allele #2: Star allele for haplotype 2 (Star allele)
</li><li>Activity Value #2: Activity score for haplotype 2 (Activity score)
</li><li>Activity Score: Final score of the two haplotypes that give the activity score (Final score)
</li><li>Phenotype: Predicted phenotype of the individual
</li><li>Diplotype: refers to the combination of two haplotypes (represented by star alleles).</li> activity score (Total score)</li>
        <li>phenotype: Predicted phenotype of the individual</li>
    </ul>


</div>

<?= $this->endSection() ?>
