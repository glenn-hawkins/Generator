<?php
    
    $chapter = $_GET['chapter']; // get parameters
    $kanji = $_GET['kanji'];
    $kana = $_GET['kana'];
    $imi = $_GET['imi'];
              
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 
        DB_NAME)
        or die('Error connecting to MySQL server.');
              
    $query = "INSERT INTO vocab (chapter, kanji, kana, imi) " .
    "VALUES ('$chapter', '$kanji', '$kana', '$imi')";
    
    mysqli_query($dbc, $query)
        or die('Error querying database.');
        
?>