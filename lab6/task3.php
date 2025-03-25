<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Translator</title>
</head>

<body>

    <form method="post">
        <label>Введите дату (ДД.ММ.ГГГГ):</label>
        <input type="text" name="date" required pattern="^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[0-2])\.[0-9]{4}$"
            title="Формат даты: ДД.ММ.ГГГГ" placeholder="ДД.ММ.ГГГГ">
        <button type="submit">Узнать знак зодиака</button>
    </form>


    <?php
    function getZodiacSign($day, $month)
    {
        $zodiacs = [
            ["Козерог", 20],
            ["Водолей", 19],
            ["Рыбы", 20],
            ["Овен", 20],
            ["Телец", 20],
            ["Близнецы", 21],
            ["Рак", 22],
            ["Лев", 22],
            ["Дева", 22],
            ["Весы", 23],
            ["Скорпион", 22],
            ["Стрелец", 21],
            ["Козерог", 31]
        ];

        return ($day <= $zodiacs[$month - 1][1])
            ? $zodiacs[$month - 1][0]
            : $zodiacs[$month][0];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $date = $_POST['date'];
        list($day, $month, $year) = explode('.', $date);

        if (checkdate($month, $day, $year)) {
            echo "<p>Ваш знак зодиака: " . getZodiacSign((int) $day, (int) $month) . "</p>";
        } else {
            echo "<p>Ошибка: введите корректную дату!</p>";
        }
    }
    ?>

</body>

</html>