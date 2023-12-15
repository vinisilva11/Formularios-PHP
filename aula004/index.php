<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Formulário</title>
  </head>
  <body>
    <form action="gravar.php" method="post">
      <label for="number">Código:</label>
      <?php 
        //  Gerando número aleatórios
         $numero_aleatorio = rand(1,1000);
      ?>
      <input type="number" name="id" value="<?=$numero_aleatorio?>" />


      <label for="nome">Nome:</label>
      <input type="text" name="nome" autofocus />

      <label for="idade">Idade:</label>
      <input type="number" name="idade" min="1" max="120" step="1" />

      <input type="submit" name="enviar" value="Enviar" />
    </form>
  </body>
</html>
