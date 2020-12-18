<?php

    $jsonString = file_get_contents('testJSON.json');

    $lista = json_decode($jsonString, true);

    var_dump($lista);
