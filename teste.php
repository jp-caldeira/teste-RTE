<?php

    session_start();

    var_dump($_POST);


    $jsonString = file_get_contents('testJSON.json');

    $lista = json_decode($jsonString, true);
    $pessoas = $lista['pessoas'];


    if (isset($_POST['remove'])){

      $index = $_POST['remove'];

      unset($pessoas[$index]);

      $lista['pessoas'] = $pessoas;

      $insertData = json_encode($lista);

      file_put_contents("testJSON.json", $insertData);
      header('location:index.php');
      die();

    }

    if(isset($_POST['removeFilho'])){

        $index = $_POST['index'];
        $indexFilho = $_POST['removeFilho'];

        unset($pessoas[$index]['filhos'][$indexFilho]);

        $lista['pessoas'] = $pessoas;
        $insertData = json_encode($lista);

        file_put_contents("testJSON.json", $insertData);
        header('location:index.php');
        die();
    }

        $index = $_POST["index"];
        $filho = trim($_POST['nomeFilho']);

        if(empty($filho)){
            $_SESSION['mensagem'] = "Nome do filho não pode ser vazio";
            header('location:index.php');
            die();
        }

        $pessoa = $pessoas[$index];

        $pessoa['filhos'][] = $filho;

        $lista['pessoas'][$index] = $pessoa;

        $insertData = json_encode($lista);

        file_put_contents("testJSON.json", $insertData);
        header('location:index.php');      
