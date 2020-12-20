<?php

require_once "connect.php";

$query = $db->prepare("SELECT * FROM pessoas");
$query->execute();

$pessoas = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($pessoas);

foreach ($pessoas as $key=>$pessoa){

    $id_pessoa = $pessoa["id"];
    $nome = $pessoa["nome"];

    $query2 = $db->prepare("SELECT nome FROM filhos WHERE pessoa_id=:id");

    $query2->bindParam(':id', $id_pessoa, PDO::PARAM_INT);
    $query2->execute(["id"=>$id_pessoa]);

    $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);

    foreach($result2 as $key=>$filho){
      $filhos[$key] = $filho['nome'];
    }

     $novaPessoa['nome'] = $nome;
     $novaPessoa["filhos"] = $filhos;
     $filhos = [];
     $lista['pessoas'][] = $novaPessoa;
  }

// var_dump($lista);
//
$listaJSON = json_encode($lista);

$jsonString = file_put_contents('testJSON.json', $listaJSON);

$listaJSON = file_get_contents('testJSON.json');
$lista_original = json_decode($listaJSON, TRUE);

var_dump($lista_original['pessoas']);
