<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <?php

    $arquivo = "./dados.txt";
    $pont = fopen($arquivo, "r");
    $linha = fgets($pont);
    $i = 0;

    while ($linha) {
      echo $linha ."<br>";
      $linhas[$i++] = $linha; 
      $linha = fgets($pont);
    }

    sort($linhas);
    ?>
    
    <select name="uf">
      <?php
        for ($i=0; $i<count($linhas) ; $i++) { 
          echo "<option value='$linhas[$i]'>$linhas[$i]</option>";
        }
      ?>
    </select>
</body>
</html>
