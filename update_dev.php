<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="favicon.ico"/>

<title>[ - Update Interface - ]</title>

<link href="generator.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="select.js"> </script>
<script type="text/javascript" src="update.js"> </script>

<script type="text/javascript">

waitGif = new Image();
waitGif.src = "wait.gif";

function sendUpdate() {
    //disable the update button and load wait image
    document.getElementById('updateButton').disabled = true;
    document.getElementById('updateButton').className = "disinputbtn";
    var imgLoc = document.createElement('img');
    imgLoc.src = "wait.gif";
    var upP = document.getElementById('upPara');
    while (upP.firstChild) {upP.removeChild(upP.firstChild);}
    upP.appendChild(imgLoc);
    
    //activate engine
    var chvar = document.getElementById('chapterSelect').value;
    var kjvar = document.getElementById('kanjiText').value;
    var knvar = document.getElementById('kanaText').value;
    var imvar = document.getElementById('imiText').value;
    
    updateEngine(chvar, kjvar, knvar, imvar);
}


function formReset() {
    document.getElementById('updateForm').reset();
    document.getElementById('chapterSelect').disabled = true;
    document.getElementById('kanjiText').disabled = true;
    document.getElementById('kanaText').disabled = true;
    document.getElementById('imiText').disabled = true;
    document.getElementById('updateButton').disabled = true;
    document.getElementById('updateButton').className = "disinputbtn";
}

function clearEntries() {
    document.getElementById('kanjiText').value = "";
    document.getElementById('kanaText').value = "";
    document.getElementById('imiText').value = "";
	
	//return focus to kanjiText
	document.getElementById('kanjiText').focus();
}

function enableChapter(bookname) {
    //call the update engine using select.js
    selectUpdate(bookname);

    //enable select 
    document.getElementById('chapterSelect').disabled = false;
}

function enableTextInput() {
    document.getElementById('kanjiText').disabled = false;
    document.getElementById('kanaText').disabled = false;
    document.getElementById('imiText').disabled = false;
    document.getElementById('updateButton').disabled = false;
    document.getElementById('updateButton').className = "inputbtn";
}

</script>

</head>

<body onload="formReset()">

<div class="container">
<br />
    <div class="header"></div>
    <div class="menu">
        <ul>
            <li><a href="update.php" rel="Modify Database">Update</a></li>
            <li><a href="generator.php" rel="Utilize Generator">Generator</a></li>
            <li><a href="status.html">Status</a></li>
        </ul>
    </div>
    <div class="interface">
        <p class="title">Database Update Interface</p>
<br />
            <form action="" id="updateForm">
                <select id="bookSelect" name="bookSelect" onchange="enableChapter(this.value)">
                    <option selected="selected">Select Book</option>
                    <?php
                        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        						or die('Error connecting to MySQL server.');
                            
                        $query = "SELECT title,value FROM book";
                        
                        $result = mysqli_query($dbc, $query)
                            or die('Error querying database.');
                            
                        while($row=mysqli_fetch_array($result)){
                        echo '<option value="' . $row[value] . '" name="' . $row[value] . '">' .
                            $row[title] .  "</option>";
                        }
                        
                    ?>
                </select>
                <img src="addIcon.jpg" width="15" height="15" style="vertical-align:middle;" />
                <select id="chapterSelect" name="chapterSelect" disabled="true" onchange=
                	"enableTextInput()">
                  <option selected="selected">Select Chapter</option>
                </select>
                <img src="addIcon.jpg" width="15" height="15" />
          <br /><br />
                漢字：
                <input type="text" size="10" id="kanjiText" name="kanjiText"disabled="true" />
                かな・カナ：
                <input type="text" size="10" id="kanaText" name="kanaText" disabled="true" />
                意味：
                <input type="text" size="20" id="imiText" name ="imiText" disabled="true" />
                <br /><br />
                <input type="submit" class="disinputbtn" id="updateButton" 
                    value="...send to database..." disabled="true" onclick="sendUpdate()" />
            </form>
            <p class="updatePara" id="upPara"></p>
    </div>
    <div class="footer">
    <span class="content">coded by <a href="mailto:glenn@generator.herobo.com">Glenn Hawkins</a>
    </span>
    </div>
</div>
</body>
</html>