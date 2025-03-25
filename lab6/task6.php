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
        if ($n <= 1) {
            return 1;
        }
        return $n * factorial($n - 1);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $number = (int) $_POST['number'];

        echo "<p>Факториал числа $number равен: " . factorial($number) . "</p>";
    }
    ?>

</body>

</html>