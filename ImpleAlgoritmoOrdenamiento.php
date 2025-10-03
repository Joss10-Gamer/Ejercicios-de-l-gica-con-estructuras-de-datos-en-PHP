<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Algoritmos de Ordenamiento</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #a8ff78, #78ffd6);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
            width: 500px;
            max-width: 90%;
        }
        h1 {
            margin-bottom: 20px;
            color: #2f3640;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #444;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type=submit] {
            padding: 12px 20px;
            background: linear-gradient(90deg, #43e97b, #38f9d7);
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        input[type=submit]:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .resultado {
            margin-top: 25px;
            padding: 20px;
            background: #f7f7f7;
            color: #333;
            border-left: 6px solid #43e97b;
            border-radius: 10px;
            text-align: left;
        }
        .resultado h2 {
            margin-top: 0;
            color: #2c3e50;
        }
        .tag {
            display: inline-block;
            background: #43e97b;
            color: white;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 12px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Algoritmos de Ordenamiento</h1>
        <p>Selecciona un algoritmo para ordenar la lista:</p>
        <form method="post">
            <input type="submit" name="opcion" value="Bubble Sort">
            <input type="submit" name="opcion" value="Merge Sort">
            <input type="submit" name="opcion" value="Insertion Sort">
        </form>

        <?php
        if (isset($_POST['opcion'])) {
            $opcion = $_POST['opcion'];

            echo "<div class='resultado'>";
            echo "<h2>Resultado con $opcion <span class='tag'>Ejecutado</span></h2>";

            // --- Bubble Sort ---
            if ($opcion == "Bubble Sort") {
                $lista = [5, -3, 8, 1, 2, -7, 8];
                echo "<b>Lista original:</b> " . implode(", ", $lista) . "<br>";

                $n = count($lista);
                for ($i = 0; $i < $n - 1; $i++) {
                    for ($j = 0; $j < $n - $i - 1; $j++) {
                        if ($lista[$j] < $lista[$j + 1]) { // descendente
                            $temp = $lista[$j];
                            $lista[$j] = $lista[$j + 1];
                            $lista[$j + 1] = $temp;
                        }
                    }
                }

                echo "<b>Lista ordenada (descendente):</b> " . implode(", ", $lista);
            }

            // --- Merge Sort ---
            if ($opcion == "Merge Sort") {
                $lista = ["pera", "manzana", "uva", "sandía", "kiwi", "mango"];
                echo "<b>Lista original:</b> " . implode(", ", $lista) . "<br>";

                function mergeSort($arr) {
                    if (count($arr) <= 1) {
                        return $arr;
                    }
                    $middle = floor(count($arr) / 2);
                    $left = array_slice($arr, 0, $middle);
                    $right = array_slice($arr, $middle);

                    $left = mergeSort($left);
                    $right = mergeSort($right);

                    return merge($left, $right);
                }

                function merge($left, $right) {
                    $result = [];
                    while (count($left) > 0 && count($right) > 0) {
                        if (strcasecmp($left[0], $right[0]) <= 0) {
                            $result[] = array_shift($left);
                        } else {
                            $result[] = array_shift($right);
                        }
                    }
                    return array_merge($result, $left, $right);
                }

                $ordenada = mergeSort($lista);
                echo "<b>Lista ordenada (alfabéticamente):</b> " . implode(", ", $ordenada);
            }

            // --- Insertion Sort ---
            if ($opcion == "Insertion Sort") {
                $lista = ["Carlos", "Ana", "Beatriz", "Daniel", "Fernando", "Elena"];
                echo "<b>Lista original:</b> " . implode(", ", $lista) . "<br>";

                for ($i = 1; $i < count($lista); $i++) {
                    $key = $lista[$i];
                    $j = $i - 1;

                    while ($j >= 0 && strcasecmp($lista[$j], $key) > 0) {
                        $lista[$j + 1] = $lista[$j];
                        $j = $j - 1;
                    }
                    $lista[$j + 1] = $key;
                }

                echo "<b>Lista ordenada (alfabéticamente):</b> " . implode(", ", $lista);
            }

            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
