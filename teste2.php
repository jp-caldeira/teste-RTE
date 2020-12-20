<?php

  var_dump($_POST);
  die();


    $jsonString = file_get_contents('testJSON.json');

    $lista = json_decode($jsonString, true);

    //var_dump($lista);

    if(isset($_POST["remove"])){
      echo "remover definido";
    } else {
      echo "remover não definido";
    }

echo "<br>";

      if(isset($_POST['index'])){
        echo "index definido";
      } else {
        echo "index não definido";
      }
