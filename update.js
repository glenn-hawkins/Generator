// JavaScript Document

function updateEngine(chapter,kanji,kana,imi) {
	xmlhttp = GetXmlHttpObject();
	
	if (xmlhttp==null) {
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	var url = "update_engine.php";
	url = url+"?chapter="+chapter;
	url = url+"&kanji="+kanji;
	url = url+"&kana="+kana;
	url = url+"&imi="+imi;
	url = url+"&sid="+Math.random();
	xmlhttp.onreadystatechange = stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function stateChanged2() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById('updateButton').disabled = false;
		document.getElementById('updateButton').className = "inputbtn";

		var nodeText = document.createTextNode("...update sent...ready to send again...");
		var upP = document.getElementById('upPara');		
		while (upP.firstChild) {upP.removeChild(upP.firstChild);}
		upP.appendChild(nodeText);

		//clear form
		clearEntries();
	}
}