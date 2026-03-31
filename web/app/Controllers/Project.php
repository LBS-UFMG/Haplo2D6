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
        $linhas = file('./data/'.$id.'/cnv.csv'); // lê tudo em array

        foreach ($linhas as $linha) {
            $c = explode(",",$linha);
            echo($c[0].'-'.$c[1]);
        }

    }
}
