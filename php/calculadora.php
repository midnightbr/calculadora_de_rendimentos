<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" href="./img/calculadora_menor.png" type="image/png">
  <title>Calculadora</title>
</head>

<body>
  <div>
    <h1>Calculadora de Investimento</h1>
    <?php
    $value = $_GET['value'];
    $time = $_GET['time'];
    $duration = $_GET['duration'];

    $total = 0;
    if ($time == 1) {
      for ($cont = 0; $cont <= $duration; $cont++) {
        $total += $value * (1 + 0.07);
      }
    } else if ($time == 2) {
      $duration = $duration * 12;
      for ($cont = 0; $cont <= $duration; $cont++) {
        $total += $value * (1 + 0.07);
      }
    }
    echo "O redimento total estimado do investimento é de R$" . number_format($total, 2);
    ?>
    <br><br>
    <a href="javascript:history.go(-1)" class="botao">Voltar</a>
  </div>
</body>

</html>