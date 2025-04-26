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
        $input = $_POST['year'];

        if (is_numeric($input) && ctype_digit($input)) {
            $year = intval($input);

            if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
                echo "<p>YES $year</p>";
            } else {
                echo "<p>NO $year</p>";
            }
        } else {
            echo "<p style='color: red;'>Ошибка: введите корректный год/p>";
        }
    }
    ?>

</body>

</html>