<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="favicon.ico"/>

<title>[ - Flash Cards - ]</title>

<script type="text/javascript" src="title.js"> </script>

<style type="text/css">

table {
    border-collapse: collapse;
    width: 90%;
}

th {
    font-weight:bold;
    width: 50%;
    border: 1px solid #000000;
    text-align: center;
}

td {
    height: 2.5cm;
    width: 50%;
    border: 1px solid #000000;
    padding: 7px;
    text-align: center;
}


td.front {
    font-size: 300%;
    vertical-align: middle;
    border-right-style: dashed;
}

td.top {
    vertical-align: top;
    border-left-style: none;
    border-bottom-style: none;
}

td.bottom {
    vertical-align: bottom;
    border-left-style: none;
    border-top-style: none;
}

</style>

</head>

<body onload="getTitle()">
<table align="center">
    <tr><th colspan="2"><span id="titleContent"></span> : Flash Cards</th></tr>
    
    <?php
    
        $chapter = $_GET['chapter']; // get chapter
                  
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        						or die('Error connecting to MySQL server.');
                  
        $query = "SELECT kanji, kana, imi FROM vocab WHERE chapter = '$chapter'";
        
        $result = mysqli_query($dbc, $query)
            or die('Error querying database.');
                  
        while($row=mysqli_fetch_array($result)) {
            if ($row[kanji] == "") {
                echo '<tr><td class="front" rowspan="2">' . $row[kana] . '</td>' . PHP_EOL .
                 '<td class="top"></td></tr>' . PHP_EOL . '<tr><td class="bottom">' . $row[imi] . '</td></tr>' .
                 PHP_EOL;
            } else {            
                echo '<tr><td class="front" rowspan="2">' . $row[kanji] . '</td>' . PHP_EOL .
                 '<td class="top">' . $row[kana] . '</td></tr>' . PHP_EOL . 
                 '<tr><td class="bottom">' . $row[imi] . '</td></tr>' . PHP_EOL;
            }
        }
        
    ?>
    
</table>

<?php
    echo '<input type="hidden" id="chapterValue" value="' . $chapter . '" />' . PHP_EOL;
?>

</body>
</html>
