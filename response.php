<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Make Thor Happy</title>

    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>
    <div class="content">
        <h1>thor says:</h1>
<?php
        $connection;
        $result;
        $otherResult;
        
        openConnection($connection);
        getCompliment($connection, $result);
        $message = mysqli_fetch_array($result);
        echo "<p class=\"txt\">and... ".$message['text']."</p>";
        addMessage($connection, $otherResult);
        closeConnection($connection, $result, $otherResult);
?>
        <select>

        </select>

        <a href="index.php">go back</a>
    </div>

    <script src="TTS.js"></script>
</body>
</html>














<!-- functions -->
<?php
    //function to open connection to database
    function openConnection(&$connection) {
        //open the connection to the database
        $connection = mysqli_connect("localhost", "root", "", "iat222"); 

        // Test if connection succeeded 
        if(mysqli_connect_errno()) { 
            // if connection failed, skip the rest of PHP code, and print an error 
            die("Database connection failed: " . 
                mysqli_connect_error() . 
                " (" . mysqli_connect_errno() . ")" 
                ); 
        } 
    }

    function addMessage(&$connection, &$result) {
        $text = "";
        $text = $_POST["textVal"];
        if (!isset($_POST["textVal"])) {
            ;
        }
        $insertQuery = "INSERT INTO compliments (text, isSafe) VALUES(\"".$text."\", 1);";
        performQuery($connection, $result, $insertQuery);
    }
    
    
    //function to perform the query to the table
    function performQuery(&$connection, &$result, $insertQuery) {
        //Perform database query
        $result = mysqli_query($connection, $insertQuery);

        //Test if there was a query error 
        if (!$result) { 
            die("Database query failed."); 
        } 
    }


    //expects successful connection, returns msqli object
    function getCompliment(&$connection, &$result) {
        $query = "SELECT text FROM compliments WHERE isSafe ORDER BY RAND() LIMIT 1";
        // echo $query;

        performQuery($connection, $result, $query);
    }
    
    
    //function to close the connection to the database
    function closeConnection(&$connection, &$result, &$otherResult) {
        //Release returned data 
        // mysqli_free_result($result);
        // mysqli_free_result($otherResult);
        //Close database connection 
        mysqli_close($connection); 
    }
    
?>