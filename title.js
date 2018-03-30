// JavaScript Document

function getTitle() {
    var chVal = document.getElementById('chapterValue').value;
    
    titleUpdate(chVal);
}

var xmlhttp;

function titleUpdate(str) {
    xmlhttp = GetXmlHttpObject();
    
    if (xmlhttp==null) {
        alert ("Browser does not support HTTP Request");
        return;
    }
    
    var url = "title_engine.php";
    url = url+"?chapter="+str;
    url = url+"&sid="+Math.random();
    xmlhttp.onreadystatechange = stateChanged;
    xmlhttp.open("GET",url,true);
    xmlhttp.send(null);

}

function stateChanged() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("titleContent").innerHTML = xmlhttp.responseText;
    }
}

function GetXmlHttpObject() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject) {
        // code for IE6, IE5
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}