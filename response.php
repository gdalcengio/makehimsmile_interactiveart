<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Make Thor Happy</title>

    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>
    <h1>thor says</h1>
<?php
    $connection;
    $result;
    
    openConnection($connection);
    getListings($connection, $result);
    $message = mysqli_fetch_array($result);
    echo $message['text'];
    closeConnection($connection, $result);
?>
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
    
    
    //function to perform the query to the table
    function performQuery(&$connection, &$result, $queryToPerform) {
        //Perform database query
        $result = mysqli_query($connection, $queryToPerform);

        //Test if there was a query error 
        if (!$result) { 
            die("Database query failed."); 
        } 
    }


    //function to select the proper listings
    function getListings(&$connection, &$result) {
        $query = "SELECT text FROM compliments WHERE isSafe ORDER BY RAND(id) LIMIT 1";
        // echo $query;

        performQuery($connection, $result, $query);   //now perform the query
    }
    
    
    //function to close the connection to the database
    function closeConnection(&$connection, &$result) {
        //Release returned data 
        mysqli_free_result($result);
        //Close database connection 
        mysqli_close($connection); 
    }
    
?>