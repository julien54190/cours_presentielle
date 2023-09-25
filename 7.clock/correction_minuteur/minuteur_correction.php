<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>minuteur</title>
</head>
<body>
    <div class="flex">
    <p id="minuteur">00:00:00</p>
    <form action="" method="post">
        <label for="heure">Heure(s)</label>
        <input type="number" name="heure" id="heure" value="0" min="0" lenght="2">

        <label for="minute">Minute(s)</label>
        <input type="number" name="minute" id="minute" value="0" min="0" max="59" lenght="2">

        <label for="seconde">Seconde(s)</label>
        <input type="number" name="seconde" id="seconde" value="0" min="0" max="59" lenght="2">

        <input type="submit" value="Régler">
        <button type = "button" id="pause" onclick="PauseTimer()">Pause</button>
        <button type = "button" id="play">Play</button>
        <button type = "button" id="reset" onclick="ResetTimer()">Reset</button>
        
        
    </form>
    </div>
    


    <?php
        echo '    <script>
        var heure = ' . (!empty($_POST["heure"]) ? $_POST["heure"] : '0').'
        var minute = ' . (!empty($_POST["minute"]) ? $_POST["minute"] : '0').'
        var seconde = ' . (!empty($_POST["seconde"]) ? $_POST["seconde"] : '0').'
        function timer () {
            document.getElementById("minuteur").innerHTML = `${(heure < 10 ? "0" : "") + heure}:${(minute < 10 ? "0" : "") + minute}:${(seconde < 10 ? "0" : "") + seconde}`
            if (seconde <= 0 && minute <= 0 && heure <= 0) return
            
            if (seconde == 0){
                if (minute > 0) {
                    seconde = 60
                    minute--
                } else {
                    if (heure > 0){
                        heure-- 
                        minute = 59
                        seconde = 60
                    }
                }
            }
            seconde--
        }
        var interval =  setInterval (timer, 1000)
        function PauseTimer() {
            clearInterval(interval)
            interval = null
            document.getElementById("minuteur").style.color = "red"
            document.getElementById("minuteur").style.fontStyle = "italic"
            document.getElementById("minuteur").style.background = "black"
        }
        document.getElementById("play").addEventListener("click", function(){
            if (interval == null) {
                interval = setInterval(timer ,1000)
                document.getElementById("minuteur").style.color = "black"
                document.getElementById("minuteur").style.background = "blue"
            }

        })
        function ResetTimer(){
            clearInterval(interval)
            document.getElementById("heure").value = "0"
            document.getElementById("minute").value = "0"
            document.getElementById("seconde").value = "0"
            document.getElementById("minuteur").textContent = "00:00:00"
        }
    </script>';
    ?>

</body>
</html>