<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <textarea id="myTextArea" name="feef" placeholder="Enter description" rows="7" cols="40"></textarea>
    <button id="boop" onclick="boop()">Boop</button>
</body>
<script>
    // document.getElementById('boop').addEventListener

    function boop(){
        console.log("boopy");
        document.getElementById('myTextArea').value += "Hello World";
    }
</script>
</html>