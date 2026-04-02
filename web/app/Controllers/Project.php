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
        if(file_exists('./data/'.$id.'/cnv.csv') and ($dados['ready'] == true)){
            Project::cnv($id);
        }
        return view('project', $dados);
    }

    private function calculate_phenotype($score){
        # gPM → poor metabolizer (metabolizador pobre)
        # gIM → intermediate metabolizer (metabolizador intermediário)
        # gNM → normal metabolizer (metabolizador normal)
        # gUM → ultrarapid metabolizer (metabolizador ultrarrápido)
        if($score == 0){
            return 'gPM';
        }
        else if($score > 0 and $score < 1.25){
            return 'gIM';
        }
        else if($score >= 1.25 and $score <= 2.25){
            return 'gNM';
        }
        else if($score > 2.25){
            return 'gUM';
        }
    }

    private function cnv($id){
        // esta função realiza pós-processamento para múltiplas cópias
        $arquivo = "./data/$id/final_cnv.csv";
        $w = fopen($arquivo, "w");

        // le arquivo cnv
        $cnv_file = file('./data/'.$id.'/cnv.csv');
        $cnv = [];
        foreach ($cnv_file as $hp) {
            $c = explode(",", trim($hp));
            if (count($c) == 1) {
                $c = explode("\t", trim($hp));
            }
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

            // condição: se haplotype1 == haplotype2 and $cnv[$id] == 1
            if(($haplotype1 == $haplotype2)and($cnv[$id] == 1)){
                #echo $haplotype1.'-'.$haplotype2.'-'.$cnv[$haplotype1].'<br>';
                $texto = $num.','
                    .$id.','
                    .$haplotype1.','
                    .$functional1.','
                    .$allele1.','
                    .$activity1.','
                    .'-'.',' # haplotype2
                    .'No function'.',' # functional2
                    .'*5'.',' # allele2
                    .'0'.',' # activity2
                    .$activity1.',' # score 
                    .Project::calculate_phenotype($activity1).','
                    .'1'."\n";
                fwrite($w, $texto);
            }
            // condição: se haplotype1 == haplotype2 and $cnv[$id] > 2
            else if(($haplotype1 == $haplotype2)and($cnv[$id] > 2)){
                #echo $haplotype1.'-'.$haplotype2.'-'.$cnv[$haplotype1].'<br>';
                $texto = $num.','
                    .$id.','
                    .$haplotype1.','
                    .$functional1.','
                    .$allele1.','
                    .$activity1.','
                    .$haplotype2.'xN,' # haplotype2
                    .$functional2.',' # functional2
                    .$allele2.',' # allele2
                    .$activity1*$cnv[$id].',' # score 
                    .Project::calculate_phenotype($activity1*$cnv[$id]).','
                    .$cnv[$id]."\n";
                fwrite($w, $texto);
            }
            // condição: se haplotype1 != haplotype2
            else if(($haplotype1 != $haplotype2)and($id != 'patient_id')and($cnv[$id] != 2)){ 
                #echo $haplotype1.'-'.$haplotype2.'-'.$cnv[$haplotype1].'<br>';
                $texto = $num.','
                    .$id.','
                    .$haplotype1.','
                    .$functional1.','
                    .$allele1.','
                    .$activity1.','
                    .$haplotype2.',' # haplotype2
                    .$functional2.',' # functional2
                    .$allele2.',' # allele2
                    .$activity2.',' # activity2
                    .'*'.',' # score 
                    .'indeter'.','
                    .$cnv[$id]."\n";
                fwrite($w, $texto);
            }
            else{
                fwrite($w, trim($f).",2\n"); # grava a linha inteira
            }
        }
        
        fclose($w);
    }
}
