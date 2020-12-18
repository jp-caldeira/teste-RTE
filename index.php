<?php
$pessoasJSON = file_get_contents('testJSON.json');
$lista = json_decode($pessoasJSON, true);
$pessoas = $lista['pessoas'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teste</title>
  </head>
  <body>

<button type="button" name="button">Gravar</button>
<button type="button" name="button">Ler</button>

<form action="create.php" method="post">
  Nome:
<input type="text" name="nome"></input>
<button type="submit" name="button">Incluir</button>
</form>

<table>
<h2>Pessoas</h2>
<ul id="item1"></ul>
<?php foreach($pessoas as $key=>$pessoa){ ?>

  <li>
    <?= $key . " " . $pessoa['nome']; ?>
    <form class="form2" action="teste.php" method="post">
    <button type="submit" name="remove" value="<?= $key ?>">Remover</button>
    <input type="text" name="nomeFilho" class="inputFilho" style="display:none" value=""></input>
    <button type="submit" name="index" class="addFilho" value="<?= $key?>">Adicionar Filho</button>
    </form>
    <?php if(!empty($pessoa['filhos'])){ ?>
      <ul>
      <?php foreach($pessoa['filhos'] as $filho){ ?>
        <li> <?= $filho ?> </li>
    <?php  } ?>
  </ul>
<?php } ?>
</li>
<?php } ?>
</table>

<textarea name="name" rows="8" cols="80" id="json-text">
  <?= $pessoasJSON ?>
</textarea>

<script type="text/javascript" src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
