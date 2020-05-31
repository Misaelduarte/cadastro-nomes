<?php
/* 
Este código serve para validação dos nomes,
e criação do arquivo que ira salvas esses nomes (./names.txt);
*/
session_start();  // Iniciando session

// Validando nome inserido, e salvando na sessão;
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); 
$_SESSION['aviso'] = '<div class="aviso-session">* Preencha o campo *</div>';


// Se o nome estiver validado, automaticamente será criado um arquivo 'names.txt';
if($name) {
    $get_name = file_get_contents('names.txt');
    $get_name .= "$name\n";
    file_put_contents('names.txt', $get_name);

    // Redirecionando para o index.php;
    header("Location: index.php");
    exit;
} else {
    // Se o name não for validado salvar mensagem da sessão
     $_SESSION['aviso'];

    header("Location: index.php");
    exit;
}

