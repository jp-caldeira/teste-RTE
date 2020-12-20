<?php
require_once "connect.php";
require_once "pessoas.php";

var_dump($lista);
var_dump($pessoas);

$lista2['pessoas'] = [];
var_dump($lista2);
die();


  foreach($pessoas as $pessoa){

    $nome = $pessoa['nome'];

    $query = $db->prepare("INSERT INTO pessoas (nome) VALUES (:nome)");
    $query->bindValue(':nome', $nome, PDO::PARAM_STR);
    $query->execute();

    $ultimoId = $db->lastInsertId();
    $ultimoId = (int)$ultimoId;

        if (!empty($pessoa["filhos"])){
          foreach($pessoa['filhos'] as $filho){

            $nomeFilho = $filho;

            $query2 = $db->prepare("INSERT INTO filhos(pessoa_id, nome) VALUES(:ultimoId, :nomeFilho)");
            $query2->bindValue(':ultimoId', $ultimoId, PDO::PARAM_INT);
            $query2->bindValue(':nomeFilho', $nomeFilho, PDO::PARAM_STR);
            $query2->execute();
          }
      }
}
