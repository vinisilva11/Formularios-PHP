<?php

define('DIRETORIO_CADASTRO', './formulario');

if (isset($_POST['enviar'])) {
  $id = $_POST['id'];
  $descricao = $_POST['descricao'];
}

// Array que vai acumular mensagens de erro no formulário
$erros = [];

// Sanitizar os dados
// $id = filter_input(INPUT_POST, 'id',
// FILTER_SANITIZE_SPECIAL_CHARS);

// $descricao = filter_input(INPUT_POST, 'descricao',
// FILTER_SANITIZE_NUMBER_INT);

// Validação
if (!is_numeric($id)) {
  $erros[] = "Informe o numero do codigo";
}

if (strlen($descricao) > 4) {
  $erros[] = "A descrição não pode ter mais de 4 caracteres";
}

if (!empty($erros)) {
  foreach ($erros as $erro) {
    echo "<li>$erro</li>";
  }
} else {
  $cliente = [
    'id' => $id,
    'descricao' => $descricao
  ];


  if (!file_exists(DIRETORIO_CADASTRO)) {
    mkdir(DIRETORIO_CADASTRO);
  }

  
  $json = json_encode($cliente, JSON_UNESCAPED_UNICODE);
    
  $recurso = fopen(DIRETORIO_CADASTRO . "/formulario-$id.json" , 'a');

  fwrite($recurso, $json );

  fclose($recurso);
}