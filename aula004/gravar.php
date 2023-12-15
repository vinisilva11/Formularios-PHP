<?php

define('DIRETORIO_CADASTRO', './cadastro');

// Função para carregar os registros do arquivo JSON
function carregarRegistros() {
    $arquivo = DIRETORIO_CADASTRO . "/registros.json";
    if (file_exists($arquivo)) {
        return json_decode(file_get_contents($arquivo), true);
    }
    return [];
}

// Função para salvar os registros no arquivo JSON
function salvarRegistros($registros) {
    $arquivo = DIRETORIO_CADASTRO . "/registros.json";
    file_put_contents($arquivo, json_encode($registros, JSON_UNESCAPED_UNICODE));
}

if (isset($_POST['enviar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    // Validação
    $erros = [];

    if (!is_numeric($id)) {
        $erros[] = "<p class='erro'>Informe um número do código</p>";
    }

    if ($nome == '') {
        $erros[] = "<p class='erro'>Digite seu nome</p>";
    }

    if (!is_numeric($idade)) {
        $erros[] = "<p class='erro'>Informe sua idade</p>";
    }

    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo $erro;
        }
    } else {
        // Carrega os registros existentes
        $registros = carregarRegistros();

        // Adiciona o novo registro ao array
        $cliente = [
            'id' => $id,
            'nome' => $nome,
            'idade' => $idade,
            'json' => json_encode(['id' => $id, 'nome' => $nome, 'idade' => $idade], JSON_UNESCAPED_UNICODE)
        ];

        $registros[] = $cliente;

        // Salva os registros atualizados no arquivo
        salvarRegistros($registros);
    }
}

// Carrega novamente os registros após adicionar um novo
$registros = carregarRegistros();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Registros</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>IDADE</th>
            <th>JSON</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?=$registro['id']?></td>
                    <td><?=$registro['nome']?></td>
                    <td><?=$registro['idade']?></td>
                    <td><?=$registro['json']?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <button type="submit"><a href="index.php">Voltar para a Página Principal</a></button>
</body>
</html>
