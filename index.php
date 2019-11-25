<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Make Thor Happy</title>

    <link href="css/normalize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fondamento&display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<body onclick="startDictation(event)">
    <div class="content">
        <img src="img/thor_sad.jpg" alt="a picture of thor being sad">
        <h1>make thor happy</h1>
        <form action="response.php" method="POST" autocomplete="off" id="compliment-form">
            <input type="text" name="textVal" id="compliment-input">
        </form>


        
        <div>
            <!-- <a href="#" id="start_button" >Dictate</a> -->
            <!-- <a href="#" id="start_button" onclick="()">Dictate</a> -->
        </div>

        <div id="results">
            <span id="final_span" class="final"></span>
            <span id="interim_span" class="interim"></span>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>