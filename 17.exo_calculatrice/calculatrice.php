<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Calculatrice iPhone</title>
    <link rel="stylesheet" href="style.css">
    <script src="../script/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
    <style>
        .form2 {
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            width: 15%;
            margin: 0 auto 0 auto;
        }
        .form2 div {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

        }

        .form2 div input {
            width: 90%;
            padding: 10px;
            margin: 0 auto;
        }

        .form2 div button {
            padding: 15px;
            cursor: pointer;
            border: 2px ridge gray;
            margin: 10px;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="calculator">
        <form>
            <div class="display">
                <input type="text" name="display">
            </div>
            <div>
                <input type="button" value="AC" onclick="display.value = '' " class="operator">
                <input type="button" value="DE" onclick="display.value = display.value.toString().slice(0, -1) " class="operator">
                <input type="button" value="." onclick="display.value += '.' " class="operator">
                <input type="button" value="/" onclick="display.value += '/' " class="operator" >
            </div>
            <div> 
                <input type="button" value="7" onclick="display.value += '7' ">
                <input type="button" value="8" onclick="display.value += '8' ">
                <input type="button" value="9" onclick="display.value += '9' ">
                <input type="button" value="*" onclick="display.value += '*' " class="operator">
            </div>
            <div>
                <input type="button" value="4" onclick="display.value += '4' "> 
                <input type="button" value="5" onclick="display.value += '5' ">
                <input type="button" value="6" onclick="display.value += '6' ">
                <input type="button" value="-" onclick="display.value += '-' " class="operator">
            </div>
            <div>
                <input type="button" value="1" onclick="display.value += '1' ">
                <input type="button" value="2" onclick="display.value += '2' ">
                <input type="button" value="3" onclick="display.value += '3' ">
                <input type="button" value="+" onclick="display.value += '+' " class="operator">
            </div>
            <div>
                <input type="button" value="00" onclick="display.value += '00' ">
                <input type="button" value="0" onclick="display.value += '0' ">
                <input type="button" value="=" class="equal operator" onclick="display.value = eval(display.value)" >
            </div>
        </form>
    </div>
</div>

<br><br><br><br><br><br><br>

<!-- Faire un formulaire en forme de calculatrice ou on poura calculer -->
<form action="" method="post" class="form2">
        <div>
            <input type="text" id="input" readonly>
        </div>
        <div>
            <button type="button" id="7" class="number">7</button>
            <button type="button" class="number">8</button>
            <button type="button" class="number">9</button>
            <button type="button" class="number">4</button>
            <button type="button" class="number">5</button>
            <button type="button" class="number">6</button>
            <button type="button" class="number">1</button>
            <button type="button" class="number">2</button>
            <button type="button" class="number">3</button>
            <button type="button" class="number">0</button>
            <button type="button" class="number">+</button>
            <button type="button" class="number">-</button>
            <button type="button" class="egal">=</button>
            <button type="button" class="number">*</button>
            <button type="button" class="clear">C</button>
        </div>

    </form>

</body>
</html>
