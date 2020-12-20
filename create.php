<?php
session_start();
require_once 'funcoes/funcoes.php';


if(isset($_POST['nomePessoa'])){

  $nome = trim($_POST['nomePessoa']);

    if(empty($nome)){
        $_SESSION['mensagem'] = "Nome da pessoa não pode ser vazio";
    } else {
        adicionarPessoa($nome);
    }

    header('location:index.php');
    die();
}
