<!DOCTYPE html>
<html>
<head>
    <title>Jeu de Devinette</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #222;
            color: #fff;
        }

        #container {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            background-color: #333;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            color: #007bff;
        }

        #message {
            font-size: 18px;
            margin-top: 10px;
        }

        input[type="number"] {
            width: 50px;
            padding: 5px;
            font-size: 16px;
            margin-top: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
        }

        #attempts {
            color: #888;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Jeu de Devinette</h1>
        <p>Devinez un nombre entre 1 et 50 :</p>
        <input type="number" id="guess" min="1" max="50">
        <button id="check">Vérifier</button>
        <p id="message"></p>
        <p id="attempts"></p>
    </div>

    <script>
        const secretNumber = Math.floor(Math.random() * 50) + 1;
        let attempts = 0;
        const maxAttempts = 5;

        document.getElementById("check").addEventListener("click", function () {
            if (attempts >= maxAttempts) {
                setMessage(`Vous avez atteint le nombre maximum d'essais. Le nombre secret était ${secretNumber}.`, "red");
                disableInput();
            } else {
                const guess = parseInt(document.getElementById("guess").value);
                attempts++;

                if (isNaN(guess) || guess < 1 || guess > 50) {
                    setMessage("Veuillez entrer un nombre valide entre 1 et 50.", "red");
                    return;
                }

                if (guess === secretNumber) {
                    setMessage(`Bravo ! Vous avez deviné le nombre en ${attempts} essais.`, "green");
                    disableInput();
                } else if (guess < secretNumber) {
                    setMessage("Le nombre secret est plus grand. Essayez à nouveau.", "blue");
                } else {
                    setMessage("Le nombre secret est plus petit. Essayez à nouveau.", "blue");
                }

                updateAttempts();
            }
        });

        function setMessage(message, color) {
            const messageElement = document.getElementById("message");
            messageElement.textContent = message;
            messageElement.style.color = color;
        }

        function updateAttempts() {
            const attemptsElement = document.getElementById("attempts");
            const remainingAttempts = maxAttempts - attempts;
            attemptsElement.textContent = `Essais restants : ${remainingAttempts}`;
        }

        function disableInput() {
            document.getElementById("guess").disabled = true;
            document.getElementById("check").disabled = true;
        }
    </script>
</body>
</html>

