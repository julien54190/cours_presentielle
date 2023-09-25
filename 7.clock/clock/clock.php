<!DOCTYPE html>
<html>
<head>
    <style>
        #clock {
            width: 200px;
            height: 200px;
            border: 2px solid #000;
            border-radius: 50%;
            position: relative;
        }

        #hour-hand, #minute-hand, #second-hand {
            position: absolute;
            transform-origin: 50% 100%;
            background-color: #000;
            transition: transform 0.5s ease-in-out;
        }

        #hour-hand {
            width: 4px;
            height: 50px;
            top: 50px;
            left: 98px;
        }

        #minute-hand {
            width: 2px;
            height: 70px;
            top: 30px;
            left: 99px;
        }

        #second-hand {
            width: 1px;
            height: 80px;
            top: 20px;
            left: 100px;
            background-color: red;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="clock">
        <div id="hour-hand"></div>
        <div id="minute-hand"></div>
        <div id="second-hand"></div>
    </div>
    <form id="timeForm" method="post">
        <label for="hour">Heure:</label>
        <input type="number" id="hour" name="hour" min="0" max="23" value="0">
        <label for="minute">Minute:</label>
        <input type="number" id="minute" name="minute" min="0" max="59" value="0">
        <label for="second">Seconde:</label>
        <input type="number" id="second" name="second" min="0" max="59" value="0">
        <button type="submit">Définir l'heure</button>
    </form>

    <script>
        function updateClock() {
            const now = new Date();
            const hour = now.getHours() % 12;
            const minute = now.getMinutes();
            const second = now.getSeconds();

            const hourAngle = (hour + minute / 60) * 360 / 12;
            const minuteAngle = (minute + second / 60) * 360 / 60;
            const secondAngle = (second * 360 / 60);

            document.getElementById('hour-hand').style.transform = `rotate(${hourAngle}deg)`;
            document.getElementById('minute-hand').style.transform = `rotate(${minuteAngle}deg)`;
            document.getElementById('second-hand').style.transform = `rotate(${secondAngle}deg)`;
        }

        // Mettez à jour l'horloge toutes les secondes
        setInterval(updateClock, 1000);
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hour = $_POST["hour"];
    $minute = $_POST["minute"];
    $second = $_POST["second"];

    if ($hour >= 0 && $hour <= 23 && $minute >= 0 && $minute <= 59 && $second >= 0 && $second <= 59) {
        date_default_timezone_set("UTC");
        $timestamp = strtotime("today") + $hour * 3600 + $minute * 60 + $second;
        date_default_timezone_set("Your Timezone"); // Remplacez "Your Timezone" par votre fuseau horaire

        $formattedTime = date("H:i:s", $timestamp);

        echo "<script>document.getElementById('hour').value = '$hour';</script>";
        echo "<script>document.getElementById('minute').value = '$minute';</script>";
        echo "<script>document.getElementById('second').value = '$second';</script>";
        echo "<script>updateClock();</script>";
    } else {
        echo "<script>alert('Veuillez entrer une heure valide.');</script>";
    }
}
?>
