<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minuteur Hi-Tech</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .timer-container {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .timer {
            font-size: 48px;
            margin-bottom: 10px;
            color: #007bff;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 18px;
            margin-top: 10px;
        }

        input[type="number"] {
            width: 50px;
            text-align: center;
            font-size: 18px;
            padding: 5px;
            border: 2px solid #007bff;
            border-radius: 5px;
            margin-top: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
        }

        button.reset-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="timer-container">
        <div class="timer" id="timer">00:00:00</div>
        <form method="post">
            <label for="hours">Heures:</label>
            <input type="number" id="hours" name="hours" min="0" value="0">
            <label for="minutes">Minutes:</label>
            <input type="number" id="minutes" name="minutes" min="0" value="0">
            <label for="seconds">Secondes:</label>
            <input type="number" id="seconds" name="seconds" min="0" max="59" value="0">
            <button type="button" onclick="startTimer()">Démarrer le minuteur</button>
            <button type="button" onclick="resetTimer()" class="reset-button">Réinitialiser</button>
        </form>
    </div>

    <?php
    session_start();

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["start_timer"])) {
        $hours = isset($_POST["hours"]) ? intval($_POST["hours"]) : 0;
        $minutes = isset($_POST["minutes"]) ? intval($_POST["minutes"]) : 0;
        $seconds = isset($_POST["seconds"]) ? intval($_POST["seconds"]) : 0;

        // Calculer la durée totale en secondes
        $totalTimeInSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;

        // Stocker la durée dans une variable de session
        $_SESSION["total_time"] = $totalTimeInSeconds;
        $_SESSION["start_time"] = time();
    }

    // Vérifier si le minuteur est actif
    if (isset($_SESSION["total_time"]) && isset($_SESSION["start_time"])) {
        // Calculer le temps écoulé
        $currentTime = time();
        $elapsedTime = $currentTime - $_SESSION["start_time"];

        // Calculer le temps restant
        $remainingTime = $_SESSION["total_time"] - $elapsedTime;

        // Assurer que le temps restant ne devienne pas négatif
        $remainingTime = max(0, $remainingTime);

        // Convertir le temps restant en heures, minutes et secondes
        $remainingHours = floor($remainingTime / 3600);
        $remainingMinutes = floor(($remainingTime % 3600) / 60);
        $remainingSeconds = $remainingTime % 60;
    } else {
        // Si le minuteur n'est pas actif, initialiser les variables à zéro
        $remainingHours = 0;
        $remainingMinutes = 0;
        $remainingSeconds = 0;
    }
    ?>

    <script>
        let timerInterval;
        let totalTimeInSeconds;

        function updateTimerDisplay() {
            const hours = Math.floor(totalTimeInSeconds / 3600).toString().padStart(2, '0');
            const minutes = Math.floor((totalTimeInSeconds % 3600) / 60).toString().padStart(2, '0');
            const seconds = (totalTimeInSeconds % 60).toString().padStart(2, '0');
            document.getElementById('timer').textContent = `${hours}:${minutes}:${seconds}`;
        }

        function startTimer() {
            const hours = parseInt(document.getElementById('hours').value);
            const minutes = parseInt(document.getElementById('minutes').value);
            const seconds = parseInt(document.getElementById('seconds').value);

            if (isNaN(hours) && isNaN(minutes) && isNaN(seconds)) {
                alert('Veuillez entrer une durée valide.');
                return;
            }

            totalTimeInSeconds = ((isNaN(hours) ? 0 : hours * 3600) + (isNaN(minutes) ? 0 : minutes * 60) + (isNaN(seconds) ? 0 : seconds));
            updateTimerDisplay();

            if (timerInterval) {
                clearInterval(timerInterval);
            }

            timerInterval = setInterval(function () {
                if (totalTimeInSeconds <= 0) {
                    clearInterval(timerInterval);
                    alert('Minuteur terminé!');
                } else {
                    totalTimeInSeconds--;
                    updateTimerDisplay();
                }
            }, 1000);
        }

        function resetTimer() {
            clearInterval(timerInterval);
            document.getElementById('hours').value = '0';
            document.getElementById('minutes').value = '0';
            document.getElementById('seconds').value = '0';
            document.getElementById('timer').textContent = '00:00:00';
        }
    </script>
</body>
</html>
