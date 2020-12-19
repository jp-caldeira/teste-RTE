<?php
require_once "connect.php";

$nome = "José";

$query = $db->prepare("INSERT INTO pessoas (nome) VALUES (:nome)");
$query->bindValue(':nome', $nome, PDO::PARAM_STR);
$query->execute();

$ultimoId = $db->lastInsertId();
var_dump($ultimoId);
$ultimoId = (int)$ultimoId;
var_dump($ultimoId);

$filho = "Ilso";

$query2 = $db->prepare("INSERT INTO filhos(pessoa_id, nome) VALUES(:ultimoId, :filho)");
$query2->bindValue(':ultimoId', $ultimoId, PDO::PARAM_INT);
$query2->bindValue(':filho', $filho, PDO::PARAM_STR);
$query2->execute();


//var_dump($ultimoId);
