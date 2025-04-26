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
        $start = $_POST['start'];
        $end = $_POST['end'];
        $found = false;

        if (
            !ctype_digit($start) || !ctype_digit($end) ||
            strlen($start) !== 6 || strlen($end) !== 6 ||
            $start < 100000 || $end > 999999 ||
            $start > $end
        ) {
            echo "<p>Ошибка: введите корректные шестизначные номера билетов!</p>";
            return;
        }

        for ($ticket = (int)$start; $ticket <= (int)$end; $ticket++) {
            $leftHalf = (int)($ticket / 1000);
            $rightHalf = (int)$ticket % 1000;

            $firstSum = array_sum(str_split($leftHalf));
            $secondSum = array_sum(str_split($rightHalf));

            if ($firstSum === $secondSum) {
                echo "<p>$ticket</p>";
                $found = true;
            }
        }

        if (!$found) {
            echo "<p>Счастливых билетов в этом диапазоне не найдено.</p>";
        }
    }
    ?>


</body>

</html>