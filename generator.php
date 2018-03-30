<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="favicon.ico"/>

<title>[ - Generator - ]</title>

<link href="generator.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="select.js"> </script>
<script type="text/javascript" src="request.js"> </script>

<script type="text/javascript">

waitGif = new Image();
waitGif.src = "wait.gif";

function sendRequest() {
    //disable the update button and load wait image
    document.getElementById('requestButton').disabled = true;
    document.getElementById('requestButton').className = "disinputbtn";
    var imgLoc = document.createElement('img');
    imgLoc.src = "wait.gif";
    var upP = document.getElementById('upPara');    
    while (upP.firstChild) {upP.removeChild(upP.firstChild);}
    upP.appendChild(imgLoc);
    
    //activate engine
    //var bkvar = document.getElementById('bookSelect').value;
    var chvar = document.getElementById('chapterSelect').value;
    var fmvar = document.getElementById('listFormat').value;
    
    requestEngine(chvar, fmvar);
	
	//feedback
	document.getElementById('requestButton').disabled = false;
    document.getElementById('requestButton').className = "inputbtn";
    var nodeText = document.createTextNode("...request sent...ready to send again...");
    var upP = document.getElementById('upPara');
    while (upP.firstChild) {upP.removeChild(upP.firstChild);}       
    upP.appendChild(nodeText);
    
}

function formReset() {
    document.getElementById('requestForm').reset();
    document.getElementById('chapterSelect').disabled = true;
    document.getElementById('listFormat').disabled = true;
    document.getElementById('requestButton').disabled = true;
    document.getElementById('requestButton').className = "disinputbtn";
}

function enableChapter(bookname) {
    //call the update engine using select.js
    selectUpdate(bookname);

    //enable select 
    document.getElementById('chapterSelect').disabled = false;
}

function enableListFormat() {
    document.getElementById('listFormat').disabled = false;
    document.getElementById('requestButton').disabled = false;
    document.getElementById('requestButton').className = "inputbtn";
}

function formatInfo() {
	var curFormat = document.getElementById('listFormat').value;
	if (curFormat == 1) {
		var nodeText = document.createTextNode("...provides a list of all terms...");
    	var upP = document.getElementById('upPara');
    	while (upP.firstChild) {upP.removeChild(upP.firstChild);}       
    	upP.appendChild(nodeText);
	} else if (curFormat == 2) {
		var nodeText = document.createTextNode("...only one entry for each term is provided, fill in the rest...");
    	var upP = document.getElementById('upPara');
    	while (upP.firstChild) {upP.removeChild(upP.firstChild);}       
    	upP.appendChild(nodeText);
	} else {
		var nodeText = document.createTextNode("...creates flash cards of all terms, print one-sided, fold, glue, and cut...");
    	var upP = document.getElementById('upPara');
    	while (upP.firstChild) {upP.removeChild(upP.firstChild);}       
    	upP.appendChild(nodeText);
	}
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
        <p class="title">Generator Interface</p>
<br />
            <form action="" id="requestForm">
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
                <select id="chapterSelect" name="chapterSelect" disabled="true" onchange=
                	"enableListFormat()">
                    <option selected="selected">Select Chapter</option>
                </select>
                <br /><br />
                <select id="listFormat" name="listFormat" disabled="true" onchange="formatInfo()">
                    <option selected="selected">Select Format</option>
                    <option value="1">Master List</option>
                    <option value="2">Practice Sheet</option>
                    <option value="3">Flash Cards</option>
                </select>
                <br /><br />
                <input type="button" class="disinputbtn" id="requestButton" 
                    value="...activate Generator..." disabled="true" onclick="sendRequest()" />
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