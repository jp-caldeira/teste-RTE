<?php


$pessoasJSON = file_get_contents('testJSON.json');
$lista = json_decode($pessoasJSON, true);

if($_POST && $_POST['nome'] !== ''){

    $novaPessoa['nome'] = $_POST['nome'];
    $novaPessoa['filhos'] = [];

    $lista['pessoas'][] = $novaPessoa;

    $insertData = json_encode($lista);
    file_put_contents('testJSON.json', $insertData);
}

header('location:index.php');
