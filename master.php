<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="favicon.ico"/>

<title>[ - Master List - ]</title>

<script type="text/javascript" src="title.js"> </script>

<style type="text/css">

table {
    border-collapse: collapse;
    width: 90%;
}

th {
    font-weight:bold;
}

th, td {
    width: 33%;
    border: 1px solid #000000;
    text-align: center;
}

</style>

</head>

<body onload="getTitle()">
<table align="center">
    <tr><th colspan="3"><span id="titleContent"></span> : Master List</th></tr>
    <tr>
        <th>漢字</th>
        <th>かな・カナ</th>
        <th>意味</th>
    </tr>
    <?php
    
        $chapter = $_GET['chapter']; // get chapter
                  
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        						or die('Error connecting to MySQL server.');
                  
        $query = "SELECT kanji, kana, imi FROM vocab WHERE chapter = '$chapter'";
        
        $result = mysqli_query($dbc, $query)
            or die('Error querying database.');
                  
        while($row=mysqli_fetch_array($result)) {
            echo '<tr><td>' . $row[kanji] . '</td><td>' . $row[kana] .
             '</td><td>' . $row[imi] . '</td></tr>' . PHP_EOL;
        }
        
    ?>
</table>

<?php
    echo '<input type="hidden" id="chapterValue" value="' . $chapter . '" />' . PHP_EOL;
?>

</body>
</html>
