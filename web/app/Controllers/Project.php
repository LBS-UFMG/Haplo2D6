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
        if (($f = fopen('./data/'.$id.'/cnv.csv', 'r')) !== false) {
            $header = fgetcsv($f); // cabeçalho
            while ($row = fgetcsv($f)) {
                $cnv[] = array_combine($header, $row);
            }
            fclose($f);
        }

        foreach($cnv as $c){
            print($c);
        }
    }
}
