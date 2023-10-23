<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../script/jquery-3.7.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>La vache <span class="b">Bleue</span> Par Gelett Burgess</h1>

    <p>Je n'ai jamais vu une vache <span class="b">Bleu</span>, Je n'espère jamais voir un; Mais je peux vous dire, de toute façon, Je verrais plutôt qu'être un !</p>

    <p>Changer la couleur de la vache : <input type="text" name="change" id="change"> <button type="button" id="ChangeColor">Changer !</button></p>

    <script>
        $(document).ready(function(){
            $("#ChangeColor").click(function() {
                const color1 = $("#change").val();
                $(".b").text(color1);
            })
        })
    </script>
</body>
</html>