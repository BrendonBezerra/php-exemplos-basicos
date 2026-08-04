<?php

$idade = 19;
$temDocumento = true;

if ($idade >= 18 && $temDocumento) {
    echo "Pode tirar a habilitação de motorista";
} else {
    echo "Não pode tirar a habilitação de motorista";
}

$feriado = false;
$fimDeSemana = true;

if ($feriado || $fimDeSemana) {
    echo "\nHoje não tem aula";
} else{
    echo "\nNão é feriado";
}