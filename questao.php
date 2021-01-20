<?php
    include 'class/Questao.php';
    $idQuestao = $_GET['questao'];

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Questão</title>
    </head>

    <body>

        <?php

            $novaQuestao = new Questao(null, null, null, null);

            $novaQuestao->listarQuestaoSingle($idQuestao);

        ?>
        
    </body>
</html>