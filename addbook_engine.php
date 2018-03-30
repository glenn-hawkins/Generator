<?php
    
    $book = $_GET['book']; // get parameters
    $code = $_GET['code'];
              
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        						or die('Error connecting to MySQL server.');
              
    $query = "INSERT INTO book (title, value) " .
    "VALUES ('$book', '$code')";
    
    mysqli_query($dbc, $query)
        or die('Error querying database.');
        
?>