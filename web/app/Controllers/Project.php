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
        $arquivo = "./data/$id/final_table_cnv.csv";
        $w = fopen($arquivo, "w");

        // le arquivo cnv
        $cnv_file = file('./data/'.$id.'/cnv.csv');
        $cnv = [];
        foreach ($cnv_file as $hp) {
            $c = explode(",", trim($hp));
            $cnv[$c[0]] = $c[1];
        }
        
        // le arquivo final_table.csv
        $final = file('./data/'.$id.'/final.csv'); 
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

            // condição: se haplotype1 == haplotype2 and $cnv[haplotype2] == 1
            if(($haplotype1 == $haplotype2)and($cnv[$haplotype1] == 1)){
                #echo $haplotype1.'-'.$haplotype2.'-'.$cnv[$haplotype1].'<br>';
                $texto = $num.','
                    .$id.','
                    .$haplotype1.','
                    .$functional1.','
                    .$allele1.','
                    .$activity1.','
                    .'Copies = '.$cnv[$haplotype1].',' # haplotype2
                    .'-'.',' # functional2
                    .'-'.',' # allele2
                    .'-'.',' # activity2
                    .$activity1.',' # score
                    .explode('/',$phenotype)[0];

                fwrite($w, $texto);
            }
            else{
                fwrite($w, $f); # grava a linha inteira
            }
        }
        
        fclose($w);
    }
}
