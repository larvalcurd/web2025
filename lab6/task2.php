<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Translator</title>
</head>

<body>

    <form method="POST">
        <label for="digit">Введите цифру (0-9):</label>
        <input type="number" id="digit" name="digit" min="0" max="9" required>
        <button type="submit">Перевести</button>
    </form>

    <?php
    function digitToWord($digit)
    {
        $words = [
            "Ноль",
            "Один",
            "Два",
            "Три",
            "Четыре",
            "Пять",
            "Шесть",
            "Семь",
            "Восемь",
            "Девять"
        ];

        return isset($words[$digit]) ? $words[$digit] : "Ошибка: введите цифру от 0 до 9";
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $digit = intval($_POST['digit']);

        echo "<p>Результат: " . digitToWord($digit) . "</p>";
    }
    ?>

</body>

</html>