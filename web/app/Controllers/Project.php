<?php

namespace App\Controllers;

class Project extends BaseController
{
    public function index($id)
    {
        $dados['id'] = $id;
        $dados['ready'] = false;

        if(file_exists('./data/'.$id.'/finished.txt')){
            $dados['ready'] = true;
        }
        if(file_exists('./data/'.$id.'/cnv.csv')){
            Project::cnv($id);
        }
        return view('project', $dados);
    }

    private function cnv($id){
        // esta função realiza pós-processamento para múltiplas cópias

        // le arquivo cnv
        $cnv = file('./data/'.$id.'/cnv.csv'); // lê tudo em array

        foreach ($cnv as $hp) {
            $c = explode(",",$hp);
            #echo($c[0].'-'.$c[1]);
        }

        // le arquivo final_table.csv
        $final = file('./data/'.$id.'/final_table.csv'); 
        foreach ($final as $f) {
            $l = explode(",",$f);
            #,ID,Haplotype #1,Allele Functional #1,Allele #1,Activity Value #1,Haplotype #2,Allele Functional #2,Allele #2,Activity Value #2,Activity Score,Phenotype

            $num = $l[0];
            $id = $l[1];
            $haplotype1 = $l[2];
            $functional1 = $l[3];
            $allele1 = $l[4];
            $activity1 = $l[5];
            $haplotype2 = $l[6];
            $functional2 = $l[7];
            $allele2 = $l[8];
            $activity2 = $l[9];
            $score = $l[10];
            $phenotype = $l[11];

            echo "num: $num<br>";
echo "id: $id<br>";
echo "haplotype1: $haplotype1<br>";
echo "functional1: $functional1<br>";
echo "allele1: $allele1<br>";
echo "activity1: $activity1<br>";
echo "haplotype2: $haplotype2<br>";
echo "functional2: $functional2<br>";
echo "allele2: $allele2<br>";
echo "activity2: $activity2<br>";
echo "score: $score<br>";
echo "phenotype: $phenotype<br>";
            

        }

    }
}
