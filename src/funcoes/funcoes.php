<?php



function adicionarPessoa(string $nome)
{
  $novaPessoa['nome'] = $nome;
  $novaPessoa['filhos'] = [];

  $pessoasJSON = file_get_contents('../json/pessoas.json');
  $lista = json_decode($pessoasJSON, true);

  $lista['pessoas'][] = $novaPessoa;

  $insertData = json_encode($lista);
  file_put_contents('../json/pessoas.json', $insertData);
}

function removerPessoa($array)
{
  $index = $_POST['removePessoa'];

  unset($array[$index]);

  $lista['pessoas'] = $array;


  $insertData = json_encode($lista);

  file_put_contents("../json/pessoas.json", $insertData);
}

function removerFilho($array)
{
  $index = $_POST['indexPai'];
  $indexFilho = $_POST['removeFilho'];

  unset($array[$index]['filhos'][$indexFilho]);

  $lista['pessoas'] = $array;
  $insertData = json_encode($lista);

  file_put_contents("../json/pessoas.json", $insertData);
}

function adicionarFilho($json)
{
      $index = $_POST["indexPai"];
      $filho = trim($_POST['nomeFilho']);

        if(empty($filho)){
            $_SESSION['mensagem'] = "Nome do filho não pode ser vazio";

        } else {

        $lista = json_decode($json, true);

        $pessoas = $lista['pessoas'];

        $pessoas[$index]['filhos'][] = $filho;

        $lista["pessoas"] = $pessoas;

        $insertData = json_encode($lista);

        file_put_contents("../json/pessoas.json", $insertData);
      }
}
