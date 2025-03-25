<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор постфиксной записи</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { margin-bottom: 20px; }
        input, button { padding: 8px; margin: 5px 0; }
        .result { font-size: 20px; font-weight: bold; color: green; }
        .error { font-size: 18px; color: red; }
    </style>
</head>
<body>
    <h2>Калькулятор обратной польской записи</h2>
    <form method="post">
        <label>Введите выражение в постфиксной записи:</label>
        <input type="text" name="expression" required pattern="[0-9+\-* ]+" placeholder="0-9 + - *">
        <button type="submit">Вычислить</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $expression = trim($_POST['expression']);

        function evaluateRPN($expression) {
            $tokens = explode(' ', $expression);
            $stack = [];

            foreach ($tokens as $token) {
                if (ctype_digit($token)) {  //  Проверка, является ли число целым
                    array_push($stack, (int)$token);
                } elseif (in_array($token, ['+', '-', '*'])) {  
                    if (count($stack) < 2) return "Ошибка: недостаточно операндов";
                    
                    $b = array_pop($stack);
                    $a = array_pop($stack);

                    switch ($token) {
                        case '+': array_push($stack, $a + $b); break;
                        case '-': array_push($stack, $a - $b); break;
                        case '*': array_push($stack, $a * $b); break;
                    }
                } else {
                    return "Ошибка: недопустимый символ '$token'";
                }
            }

            return count($stack) === 1 ? array_pop($stack) : "Ошибка в выражении";
        }

        $result = evaluateRPN($expression);

        if (is_numeric($result)) {
            echo "<p class='result'>Результат: " . htmlspecialchars($result) . "</p>";
        } else {
            echo "<p class='error'>" . htmlspecialchars($result) . "</p>";
        }
    }
    ?>
</body>
</html>
