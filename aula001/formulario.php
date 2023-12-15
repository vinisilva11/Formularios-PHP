<?php

if (isset($_POST['bt_enviar'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $idade = $_POST['idade'];
  $peso = $_POST['peso'];
}

// Array de erros para armazenar todas as mensagens de erros que será exibida no sistema
$erros = [];

// Sanitizar = Limpeza dos dados
$nome = filter_input(INPUT_POST, 'nome' ,
FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_input(INPUT_POST, 'email' ,
FILTER_SANITIZE_EMAIL);

$idade = filter_input(INPUT_POST, 'idade' ,
FILTER_SANITIZE_NUMBER_INT);

$peso = filter_input(INPUT_POST, 'peso' ,
FILTER_SANITIZE_NUMBER_FLOAT,
FILTER_FLAG_ALLOW_FRACTION);

echo "NOME: $nome <br>";
echo "EMAIL: $email <br>";
echo "IDADE: $idade <br>";
echo "PESO: $peso <br>";

// Filtros


// Validação e-mail
if (!$email = filter_var(INPUT_POST, 'email',
FILTER_VALIDATE_EMAIL)) {
   $erros[] = "E-mail Inválido";
}

// Validação idade
if (!$idade = filter_var(INPUT_POST, 'idade',
FILTER_VALIDATE_INT)) {
   $erros[] = "A Idade tem que ser um número real";
}

// Validação peso
if (!$peso = filter_var(INPUT_POST, 'peso',
FILTER_VALIDATE_FLOAT)) {
   $erros[] = "O Peso tem que ser um numero real com casas decimais";
}

if (!empty($erros)) {
   foreach ($erros as $erro) {
     echo "<li>$erro</li>";
    } 
}  else {
     echo "Os dados estão corretos";
}



 