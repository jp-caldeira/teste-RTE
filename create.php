<?php

session_start();

$pessoasJSON = file_get_contents('testJSON.json');
$lista = json_decode($pessoasJSON, true);

$nome = trim($_POST['nome']);

if($_POST && !empty($nome)){

    $novaPessoa['nome'] = $nome;
    $novaPessoa['filhos'] = [];

    $lista['pessoas'][] = $novaPessoa;

    $insertData = json_encode($lista);
    file_put_contents('testJSON.json', $insertData);
} else {
  $_SESSION['mensagem'] = "Nome da pessoa não pode ser vazio";
}

header('location:index.php');
