<?php
/*
 * Iniciando sistema para cadastro de nomes;
 * Sistema simples, usando conceitos de file_get_contents e file_put_contents;
 * Inserindo nome, e salvando em um arquivo .txt;
 */
session_start(); // Iniciando session;
require './index.html'; // Requerindo arquivo index.html;

// Condição para caso exista o arquivo ./names.txt;
if(file_exists('./names.txt')) {
    // Pegando informação do arquivo ./names.txt;
    $getting_name = file_get_contents('names.txt');
    $names = explode("\n", $getting_name);

    // Remove o último item do array que é um espaço vazio gerado pelo --> $novoNome."\n"
    $remove_last_name = array_pop($names);

    echo "<div class='container-list-names'><ul>";
    // Definindo um loop para cada nome inserido aparecer na tela em formato de lista não ordenada;
    foreach($names as $name) {
        echo '<li>'.$name.'</li>';
        $remove_last_name;
    }

    echo "</ul></div>";
} else {
    // Se não existir o arquivo 'names.txt', mostrar mesnsagem salva na sessaão
    echo $_SESSION['aviso'];
    $_SESSION['aviso'] = '';
}

?>
