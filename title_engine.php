<?php
    
    $chapter = $_GET['chapter']; // get chapter
              
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        						or die('Error connecting to MySQL server.');
              
    $query = "SELECT title, chapter FROM chapter WHERE value = '$chapter'";
    
    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');
              
    while($row=mysqli_fetch_array($result)) {
        echo $row[title] . ' : ' . $row[chapter];
    }
?>