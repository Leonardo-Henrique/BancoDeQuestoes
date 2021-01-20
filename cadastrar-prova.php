<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar prova</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/cadastrar-prova.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        
    </head>

    <body>

        <header>

            <div class="logo">
                <a href=""><h1>logo</h1></a>
            </div>

        </header>

        <div class="content">

            <div class="center cadastrar">

                <a href="../dashboard">painel ></a>
                
                <h1>cadastrar prova</h1>

                <form action="?" method="post">

                    <input  type="text" name="prova" placeholder="Prova"><br>

                    <input  type="text" name="ano" placeholder="Ano"><br>

                    <input  type="text" name="instituicao" placeholder="Instituicao"><br>

                    <input type="submit" name="enviar" value="Enviar">
                        
                </form>

            </div>

        </div>

            <?php

                if(isset($_POST['enviar'])){

                    $prova = $_POST['prova'];
                    $ano = $_POST['ano'];
                    $instituicao = $_POST['instituicao'];
                    
                    include 'class/Prova.php';

                    $novaProva = new Prova($prova, $ano, $instituicao);

                    $novaProva->cadastrarProva();

                }

            ?>
        
    </body>
</html>