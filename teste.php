<?php

require_once "classes/bd.php";
require_once "connect.php";
require_once "funcoes/funcoes.php";

    session_start();

    $json = file_get_contents('testJSON.json');
    $lista = json_decode($json, true);
    $pessoas = $lista['pessoas'];
    



    if(isset($_POST['gravar'])){
      $conn = new bd;
      $db = $conn->conectar($host, $user, $pass, $database);
      $conn->gravar($json, $db);
      $_SESSION['mensagem'] = "Informações gravadas com sucesso";
    }

    if(isset($_POST['ler'])){
      $conn = new bd;
      $db = $conn->conectar($host, $user, $pass, $database);
      $conn->ler($db);
    }


    if(isset($_POST['removePessoa'])){
        removerPessoa($pessoas);
    }

    if(isset($_POST['removeFilho'])){
        removerFilho($pessoas);
    }

    if(isset($_POST['nomeFilho'])){
        adicionarFilho($json);
    }

    header('location:index.php');
