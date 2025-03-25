<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>leap year</title>
</head>

<body>
    <form method="POST">
        <label for="year">Введите год</label>
        <input type="number" id="year" name="year" required>
        <button type="submit">Проверить</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $year = intval($_POST['year']);

        if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
            echo "<p>Год $year является високосным</p>";
        } else {
            echo "<p>Год $year не является високосным</p>";
        }
    }
    ?>
</body>

</html>