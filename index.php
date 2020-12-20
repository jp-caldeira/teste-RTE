<?php

session_start();

require_once "pessoas.php";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Pessoas</title>
  </head>
  <body>

<form action="teste.php" method="post">
  <button type="submit" name="gravar">Gravar</button>
  <button type="submit" name="ler">Ler</button>
</form>

<?php if(isset($_SESSION['mensagem'])){
    echo  "<h3> {$_SESSION['mensagem']} </h3>";
    unset($_SESSION['mensagem']);
        } ?>


<form action="create.php" method="post">
    <label for="nomePessoa">Nome</label>
    <input type="text" name="nomePessoa"></input>
    <button type="submit" name="button">Incluir</button>
</form>

    <h2>Pessoas</h2>

<?php foreach($pessoas as $key=>$pessoa){ ?>
  <table>
    <tr>
    <td><?= $pessoa['nome'] ?></td>
    <form class="form2" action="teste.php" method="post">
      <td><button type="submit" value="<?= $key?>" name="removePessoa">Remover</button></td>
    </form>

    <?php if(!empty($pessoa['filhos'])){ ?>
      <table>
      <?php foreach($pessoa['filhos'] as $chave=>$filho){ ?>
        <tr>
        <td> - <?= $filho ?></td>
        <form class="teste.php" action="teste.php" method="post">
        <input type="text" name="indexPai" style="display:none" value="<?= $key?>"></input>
        <td><button type="submit" name="removeFilho" value=<?= $chave?>>Remover</button></td>
        </form>
      </tr>
    <?php  } ?>
  </table>
<?php } ?>
      </tr>
</table>
      <form action="teste.php" method="post">
        <input type="text" class="inputFilho" name="nomeFilho" style="display:none" value=""></input>
        <input type="text" class="" name="indexPai" style="display:none" value="<?= $key?>"></input>
        <button type="submit" class="addFilho">Adicionar Filho</button>
      </form>


<?php } ?>



<textarea style="display:block" name="name" rows="8" cols="80" id="json-text">
  <?= $pessoasJSON ?>
</textarea>

<script type="text/javascript" src="script.js"></script>
  </body>
</html>
