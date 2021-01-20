<?php

    class Questao{

        public $comando;
        public $referencia;
        public $texto;
        public $prova_id;
        

        function __construct($comando, $texto, $referencia, $prova_id){
            $this->comando = $comando;
            $this->referencia = $referencia;
            $this->texto = $texto;
            $this->prova_id = $prova_id;
            include('conexao.php');
            $this->pdo = $pdo;

        }
        
        public function cadastrarQuestao(){

            $dadosQuestao = [
                'comando'       =>$this->comando,
                'referencia'    =>$this->referencia,
                'texto'         =>$this->texto,
                'prova_id'      =>$this->prova_id,
                'img'           => 6
            ];

        
            //insere dados questão
            $insertQuestao = "INSERT INTO questao (comando, referencia, texto, prova_id, imagem_id) VALUES (:comando, :referencia, :texto, :prova_id, :img)";

            $stmt = $this->pdo->prepare($insertQuestao);

            $stmt->execute($dadosQuestao);

            header('Location: cadastrar/questao.php');
        }

        public function listarQuestoes($id){

            $sql = "SELECT * from questao WHERE prova_id = $id";

            $dados = $this->pdo->query($sql)->fetchAll();

            foreach ($dados as $linha) {
                echo "<div class='prova-box'>";
                echo "<a href='questao/".$linha['id']."'>".substr($linha['texto'], 0, 50)."...</a>";
                echo "<div class='clear'></div>";
                echo "</div>";
            }

        }

        public function listarQuestaoSingle($id){

            $sql = "SELECT * from questao WHERE id = $id";

            $dados = $this->pdo->query($sql)->fetchAll();

            foreach ($dados as $linha) {
                echo "comando: ".$linha['comando']."<br>";
                echo "texto: ".$linha['texto']."<br>";
                echo "referencia: ".$linha['referencia']."<br>";

            }

        }


        //mostra quantidade de questoes que aquela prova tem
        public function quantificarQuestoes($id){
            $sql = "SELECT * from questao WHERE prova_id = $id";

            $dados = $this->pdo->query($sql)->fetchAll();

            $cont = 0;

            foreach ($dados as $linha) {
                $cont++;
            }

            echo "<span>".$cont."</span>";
        }

    }

?>