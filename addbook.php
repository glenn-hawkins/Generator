<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[ - Add a Book - ]</title>
</head>

<link href="generator.css" rel="stylesheet" type="text/css" />


<script type"text/javascript">
/*
function addBook() {
    //disable the update button and load wait image
    document.getElementById('updateButton').disabled = true;
    document.getElementById('updateButton').className = "disinputbtn";
    var imgLoc = document.createElement('img');
    imgLoc.src = "wait.gif";
    var upP = document.getElementById('upPara');
    while (upP.firstChild) {upP.removeChild(upP.firstChild);}
    upP.appendChild(imgLoc);
    
    //activate engine
    var bkvar = document.getElementById('bookName').value;
    var bkcode = document.getElementById('bookCode').value;
    
    addBookEngine(bkvar, bkcode);
}

function addBookEngine(book,code) {
	xmlhttp = GetXmlHttpObject();
	
	if (xmlhttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	var url = "addbook_engine.php";
	url = url+"?book="+book;
	url = url+"&code="+code;
	url = url+"&sid="+Math.random();
	xmlhttp.onreadystatechange = addComplete;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function addComplete() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById('updateButton').disabled = false;
		document.getElementById('updateButton').className = "inputbtn";

		var nodeText = document.createTextNode("...book added...");
		var upP = document.getElementById('upPara');		
		while (upP.firstChild) {upP.removeChild(upP.firstChild);}
		upP.appendChild(nodeText);

		//clear form
		clearEntries();
	}
}

function formReset() {
    document.getElementById('addBookForm').reset();
    document.getElementById('bookName').disabled = false;
    document.getElementById('bookCode').disabled = false;
	
    document.getElementById('addBookButton').disabled = false;
    document.getElementById('addBookButton').className = "inputbtn";
}

function clearEntries() {
    document.getElementById('bookName').value = "";
    document.getElementById('bookCode').value = "";
	
	//return focus to bookName
	document.getElementById('bookName').focus();
}
*/
</script>

<body onload="formReset()">

<div class="container">
	<div class="interface">
		<p class="title">Book Addition Interface</p>
       	<br />
		<form id="addBookForm">
			Book title ：
			<input type="text" size="30" id="bookName" name="bookName" />
			Abbreviated code :
			<input type="text" size="3" id="bookCode" name="bookCode" />
			<br /><br />
			<input type="button" class="inputbtn" id="addBookButton" 
                    value="...send to database..." onclick="addBook()" />
		</form>
        <br />
        <p class="updatePara" id="upPara"></p>    
	</div>
</div>
</body>
</html>