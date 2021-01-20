<?php

    include 'class/Prova.php';

    if(isset($_POST['searchVal'])){
        $pesquisa = $_POST['searchVal'];
        $novaProva = new Prova(null, null, null);
        $novaProva->pesquisarProva($pesquisa);

    }