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
<?php foreach($pessoas as $pessoas){ ?>

  <li><?= $pessoas['nome']; ?></li>


<?php } ?>

</table>

<textarea name="name" rows="8" cols="80" id="json-text">
  <?= $pessoasJSON ?>
</textarea>

<script type="text/javascript" src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
