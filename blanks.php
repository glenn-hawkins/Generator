<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="favicon.ico"/>

<title>[ - Practice Sheet - ]</title>

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

td.empty {
    background-color: gray;
}

</style>

</head>

<body onload="getTitle()">
<table align="center">
    <tr><th colspan="3"><span id="titleContent"></span> : Practice Sheet</th></tr>
    <tr>
        <th>漢字</th>
        <th>かな・カナ</th>
        <th>意味</th>
    </tr>
    <?php
    
        $chapter = $_GET['chapter']; // get chapter
        $n = 0; //initialize variable for random
                  
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        						or die('Error connecting to MySQL server.');
                  
        $query = "SELECT kanji, kana, imi FROM vocab WHERE chapter = '$chapter'";
        
        $result = mysqli_query($dbc, $query)
            or die('Error querying database.');
                  
        while($row=mysqli_fetch_array($result)) {
            if ($row[kanji] == "") {
                $n = rand(1,2); //select a row to display at random
                
                if ($n == 1) {
                echo '<tr><td class="empty"></td><td>' . $row[kana] . '</td><td></td></tr>' . PHP_EOL;
                } else {
                echo '<tr><td class="empty"></td><td></td><td>' . $row[imi] . '</td></tr>' . PHP_EOL;
                }
            } else {
                $n = rand(1,3); //select a row to display at random
                
                if ($n == 1) {
                echo '<tr><td>' . $row[kanji] . '</td><td></td><td></td></tr>' . PHP_EOL;
                } elseif ($n == 2) {
                echo '<tr><td></td><td>' . $row[kana] . '</td><td></td></tr>' . PHP_EOL;
                } else {
                echo '<tr><td></td><td></td><td>' . $row[imi] . '</td></tr>' . PHP_EOL;
                }
            }
        }
        
    ?>
</table>

<?php
    echo '<input type="hidden" id="chapterValue" value="' . $chapter . '" />' . PHP_EOL;
?>

</body>
</html>
