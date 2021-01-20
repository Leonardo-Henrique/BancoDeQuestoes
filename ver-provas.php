<?php

    include 'class/Prova.php';
    include 'class/Questao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver provas</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/ver-provas.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">

            function searchq(){

                var searchTxt = $("input[name='pesquisar']").val();
                
                $.post("search.php", {searchVal: searchTxt}, function(output){
                    $(".prova-box").html(output);
                                    
                });

            }

        </script>
    </head>

    <body>

     <header>

            <div class="logo">
                <a href=""><h1>logo</h1></a>
            </div>

        </header>

        <div class="content">


            <div class="center-provas">

                <div class="actions">

                <h1>Provas disponíveis</h1>

                <form action="search.php" method="post">
                    <input type="text" name="pesquisar" placeholder="Pesquisar provas" onkeypress="searchq();">
                    <!-- <input type="submit" name="enviar" value="Ver"> -->
                </form>

            <div id="output"></div>


                    <div class="clear"></div>
                </div>

               

                <?php

                    $novaProva = new Prova(null, null, null);

                    $novaProva->listarProvasIndex();


                ?>

            </div>

        </div>
        
    </body>
</html>