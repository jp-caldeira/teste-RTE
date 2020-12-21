<?php
 session_start();

$pessoasJSON = file_get_contents('src/json/pessoas.json');
$lista = json_decode($pessoasJSON, true);
 $pessoas = $lista['pessoas'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastro - Pessoas</title>
  </head>
  <body>


<div class="container-fluid mt-2">
<form class="form-group" action="src/controller/controller.php" method="post">
  <button type="submit" class="btn btn-sm btn-primary" name="gravar">Gravar</button>
  <button type="submit" class="btn btn-sm btn-secondary" name="ler">Ler</button>
</form>
</div>

<?php if(isset($_SESSION['mensagem'])){
    echo  "<h3> {$_SESSION['mensagem']} </h3>";
    unset($_SESSION['mensagem']);
        } ?>

<div class="container-fluid">
<form class="form-group" action="src/controller/controller.php" method="post">
    <label for="nomePessoa">Nome</label>
    <input type="text" name="nomePessoa"></input>
    <button type="submit" class="btn btn-sm btn-primary" name="button">Incluir</button>
</form>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-3">

    <h3 class="text-center" style='padding:0.5rem; background: #adadad'>Pessoas</h3>

<?php foreach($pessoas as $key=>$pessoa){ ?>
  <table class="table table-bordered">
    <tr style="background:#e3dcdc">
    <td class="text-center"><strong><?= $pessoa['nome'] ?></strong></td>
    <form class="form2" action="src/controller/controller.php" method="post">
      <td><button type="submit" class="btn btn-sm btn-secondary" value="<?= $key?>" name="removePessoa">Remover</button></td>
    </form>
  </tr>
    <?php if(!empty($pessoa['filhos'])){ ?>
      <?php foreach($pessoa['filhos'] as $chave=>$filho){ ?>
        <tr>
        <td class="text-center"><?= $filho ?></td>
        <td>
        <form class="" action="src/controller/controller.php" method="post">
        <input type="text" name="indexPai" style="display:none" value="<?= $key?>"></input>
        <button type="submit" class="btn btn-sm btn-secondary" name="removeFilho" value=<?= $chave?>>Remover Filho</button>
        </form>
      </td>
      </tr>
    <?php  } ?>
<?php } ?>
</table>

      <form action="src/controller/controller.php" method="post">
        <input type="text" class="inputFilho" name="nomeFilho" style="display:none" value=""></input>
        <input type="text" class="" name="indexPai" style="display:none" value="<?= $key?>"></input>
        <button type="submit" class="btn btn-sm btn-primary" name="addFilho">Adicionar Filho</button>
      </form>
<br>
<?php } ?>
  </div>

<div class="col-4">
    <textarea style="display:block" name="name" rows="8" cols="80" id="json-text">
      <?= $pessoasJSON ?>
    </textarea>
</div>
  </div>
</div>

<script type="text/javascript" src="src/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
