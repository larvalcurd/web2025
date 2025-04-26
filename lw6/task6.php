<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Translator</title>
</head>

<body>
    <form method="post">
        <label>Введите число:</label>
        <input type="number" name="number" required min="0" step="1">
        <br>
        <button type="submit">Вычислить факториал</button>
    </form>

    <?php
    function factorial($n)
    {
        if ($n < 0) {
            return "Ошибка: факториал определен только для неотрицательных чисел";
        }
        if ($n <= 1) {
            return 1;
        }
        return $n * factorial($n - 1);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['number']) && is_numeric($_POST['number'])) {
            $number = (int) $_POST['number'];
            if ($number < 0) {
                echo "<p style='color: red;'>Ошибка: введите неотрицательное число.</p>";
            } else {
                echo "<p>Факториал числа $number равен: " . factorial($number) . "</p>";
            }
        } else {
            echo "<p>Ошибка: введите данные корректно</p>";
        }
    }
    ?>

</body>

</html>