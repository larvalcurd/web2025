<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Translator</title>
</head>

<body>

    <form method="POST">
        <label>Начальный номер билета:</label>
        <input type="number" name="start" required min="100000" max="999999" step="1">
        <br>
        <label>Конечный номер билета:</label>
        <input type="number" name="end" required min="100000" max="999999" step="1">
        <br>
        <button type="submit">Найти счастливые билеты</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получаем начальный и конечный номер билета
        $start = $_POST['start'];
        $end = $_POST['end'];

        // Проходим по всем номерам билетов в заданном диапазоне
        for ($ticket = (int) $start; $ticket <= (int) $end; $ticket++) {
            // Получаем левую и правую половины билета
            $leftHalf = (int) ($ticket / 1000);  // Целочисленное деление на 1000 (первые 3 цифры)
            $rightHalf = $ticket % 1000;        // Остаток от деления на 1000 (последние 3 цифры)
    
            // Считаем сумму цифр для каждой половины
            $firstSum = array_sum(str_split($leftHalf));
            $secondSum = array_sum(str_split($rightHalf));

            // Если суммы равны, выводим билет как счастливый
            if ($firstSum === $secondSum) {
                echo "<p>$ticket</p>";
            }
        }
    }
    ?>

</body>

</html>