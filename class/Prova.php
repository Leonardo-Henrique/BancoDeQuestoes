<?php

class Prova{

    public $prova;
    public $ano;
    public $instituicao;

    function __construct($prova, $ano, $instituicao){
        $this->prova = $prova;
        $this->ano = $ano;
        $this->instituicao = $instituicao;
        include 'conexao.php';
        $this->pdo = $pdo;
    }

    public function cadastrarProva(){

        $dadosProva = [
            'nomeProva'     => $this->prova,
            'ano'           => $this->ano,
            'instituicao'   => $this->instituicao

        ];

        $sql = "INSERT INTO prova (nome, ano, instituicao) VALUES (:nomeProva, :ano, :instituicao)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($dadosProva);

    }

    public function listarProvasIndex(){

        $sql = "SELECT * FROM prova ORDER BY id DESC";

        $dados = $this->pdo->query($sql)->fetchAll();

        foreach ($dados as $linha) {

            echo "<div class='prova-box'>";
            echo "<a href='prova/".$linha['id']."'>".$linha['nome']." ".$linha['ano']."</a>";
            // echo "<span class='qtd-questao'>220 questões<span>";
            echo "<div class='clear'></div></div>";

        }        


    }

    public function listarProvasSelect(){

        $sql = "SELECT * FROM prova";

        $dados = $this->pdo->query($sql)->fetchAll();

        echo "<select name='prova'>";

        foreach ($dados as $linha) {

            echo "<option value='".$linha['id']."'>".$linha['nome']." ".$linha['ano']."</option>";

        }

        echo "</select>";

    }

    public function pesquisarProva($nome){

        $output;

        $sql = "SELECT * from prova WHERE nome LIKE '%$nome%' OR ano LIKE '%$nome%'";

        $dados = $this->pdo->query($sql)->fetchAll();

        foreach ($dados as $linha) {
            $nome = $linha['nome'];
            $ano = $linha['ano'];
            $id_prova = $linha['id'];
            $output = $nome." ".$ano;
        }

        if($output){
            echo "<a href='prova/".$id_prova."'>".$output."</a>";
            echo "<div class='clear'></div></div>";
        }else{
            echo "não encontramos a prova :c";
        }



    }

}

?>