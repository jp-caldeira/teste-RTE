<?php

class bd {

  public function conectar($host, $user, $password, $database)
  {
    $host = "mysql:host=".$host.";dbname=".$database;
    try {
      $db = new PDO($host, $user, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Não foi possível realizar a conexão com o banco de dados <br>";
        echo $e->getMessage();
        exit;
    }

    return $db;

  }



  public function gravar($json, $db)
  {
      $lista = json_decode($json, true);
      $pessoas = $lista['pessoas'];

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

    $lista['pessoas'] = [];
    $listaJSON = json_encode($lista);
    $jsonString = file_put_contents('../json/pessoas.json', $listaJSON);

  }

public function ler($db)
{
  $query = $db->prepare("SELECT * FROM pessoas");
  $query->execute();

  $pessoas = $query->fetchAll(PDO::FETCH_ASSOC);

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

      $listaJSON = json_encode($lista);
      $jsonString = file_put_contents('../json/pessoas.json', $listaJSON);


}


}
