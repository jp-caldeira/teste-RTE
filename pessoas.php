<?php

$pessoasJSON = file_get_contents('testJSON.json');
$lista = json_decode($pessoasJSON, true);
$pessoas = $lista['pessoas'];
