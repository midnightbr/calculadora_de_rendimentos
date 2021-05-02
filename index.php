<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/calculadora_menor.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Calculadora</title>
</head>

<body>
    <h1>Calculadora de Investimento</h1>
    <div>
        <br>
        <form method="POST" action="./index.php">
            <div class="div1">
                <p id="text">
                    Valor: <input class="value" type="number" step="any" name="value">
                    <fieldset class="time">
                        <legend id="text">Duração por:</legend>
                        <input type="radio" name="time" id="month" value="1" checked>
                        <label for="month" id="text">Mês</label>
                        <input type="radio" name="time" id="year" value="2">
                        <label for="year" id="text">Ano</label>
                    </fieldset>
                </p>
                <input type="submit" value="Calcular" class="botao">
            </div>

            <div class="div2">
                <p id="text">
                    Juros:
                    <?php
                        echo "<select name='interest'>";
                        for($j = 0; $j <= 15; $j++) {
                            echo "<option value=$j>$j%</options>";
                        }
                        echo "</select>";
                    ?>
                    <br><br>
                    Duração: <input class="value" type="number" step="any" name="duration">
                </p>
            </div>
            <br>
        </form>
        <?php
            $value = isset($_POST['value']) ? $_POST['value'] : 0;
            $time = isset($_POST['time']) ? $_POST['time'] : 0;
            $duration = isset($_POST['duration']) ? $_POST['duration'] : 0;
            $interest = isset($_POST['interest']) ? $_POST['interest'] : 0;

            echo calculo($time, $value, $duration, $interest);

            function calculo($time, $value, $duration, $interest) {
                $total = 0;
                $interest = $interest / 100;
                if ($time == 1) {
                    for ($cont = 1; $cont <= $duration; $cont++) {
                        $total += $value * (1 + $interest);
                    }
                } else if ($time == 2) {
                    $duration = $duration * 12;
                    for ($cont = 0; $cont <= $duration; $cont++) {
                        $total += $value * (1 + 0.07);
                    }
                }
                $total = number_format($total, 2);
                $res = "<br><p class='res'>O retorno total esperado do investimento é de R$$total</p>";
                return $res;
            };
        ?>
    </div>
</body>

</html>