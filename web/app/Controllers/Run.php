<?php

namespace App\Controllers;

class Run extends BaseController
{
    private function gravar($texto, $projeto){
        // essa função grava os dados em um arquivo
        $arquivo = "./data/$projeto/input.inp";
        $fp = fopen($arquivo, "w");
        fwrite($fp, $texto);
        fclose($fp);
    }

    private function gravar_model($texto, $projeto){
        // essa função grava os dados em um arquivo
        $arquivo = "./data/$projeto/model.csv";
        $fp = fopen($arquivo, "w");
        fwrite($fp, $texto);
        fclose($fp);
    }

    private function nomear_projeto($length = 6) {
        // dá um nome aleatório para o projeto
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index(){
        
        // recebe os dados em uma variável
        $dados = $this->request->getPost();

        // cria projeto
        $projeto = Run::nomear_projeto();
        $dados['id'] = $projeto;

        mkdir('./data/'.$projeto); // cria a pasta

        // grava dados no arquivo "input.inp"
        Run::gravar($dados['input'], $projeto);
        Run::gravar_model($dados['model'], $projeto);

        // inicia a execução do pipeline ********************************
        shell_exec('nohup ../app/ThirdParty/pipeline.sh '.$projeto.' > ./data/'.$projeto.'/log.txt &');


        return view('running', $dados);
    }

}
