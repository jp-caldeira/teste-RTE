<?php

    var_dump($_POST);

    $jsonString = file_get_contents('testJSON.json');

    $lista = json_decode($jsonString, true);

    $pessoas = $lista['pessoas'];

    $index = $_POST["index"];
    $filho = $_POST['nomeFilho'];

    $pessoa = $pessoas[$index];

    $pessoa['filhos'][] = $filho;

    $lista['pessoas'][$index] = $pessoa;

    var_dump($lista);

    $insertData = json_encode($lista);

    file_put_contents("testJSON.json", $insertData);

    //header('location:index.php');







    // if($_POST){
    //   var_dump($_POST);
    // }
