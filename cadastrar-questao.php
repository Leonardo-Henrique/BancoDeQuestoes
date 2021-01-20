<?php
    
    include 'class/Questao.php';
    include 'class/Prova.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar questão</title>
    </head>

    <body>

    <a href="../dashboard">Volta à página inicial</a>

    <h1>Cadastrar questao</h1>

        <form action="" method="post">

            <input type="text" name="comando" placeholder="Comando"><br>

            <textarea placeholder="Texto da questão" name="texto"></textarea><br>

            <input  type="text" name="referencia" placeholder="Referência"><br>


            <?php

                $novaProva = new Prova(null, null, null);

                $novaProva->listarProvasSelect();
                

            ?>

            <hr>

            <span>Alternativa</span><br>
            <select>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>E</option>
            </select>

            <input  type="text" name="texto_alternativa" placeholder="Texto da alternativa"><br>

            

            <input type="submit" value="Enviar" name="enviar">

        </form>

        <?php

            if(isset($_POST['enviar'])){
                $comando = $_POST['comando'];
                $texto = $_POST['texto'];
                $referencia = $_POST['referencia'];
                $id_prova = $_POST['prova'];

                $novaQuestao = new Questao($comando, $texto, $referencia, $id_prova);

                $novaQuestao->cadastrarQuestao();
            }

        ?>
        
    </body>
</html>