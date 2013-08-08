<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Blast: Email Tracking Generator</title>
  <link href="css/demo.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="javascript/jquery.js"></script>

</head>
<body>
  <div align="right" style="padding-left:10px;padding-right:10px;float: right;">
<input id="toggleh21" type="submit" value="Show links" name="toggleh21">
<script>
  // basic show and hide
   $(document).ready(function() {
   $('div.showhide21').hide();
 });
 $(document).ready(function() {
   $('#hideh21').click( function() {
    $('div.showhide2').hide();
   });
   $('#showh21').click( function() {
    $('div.showhide21').show();
   });
   $('#toggleh21').click( function() {
    $('div.showhide21').toggle();
   });
 });
</script>
<div class="showhide21" style="padding-right:10px;padding-right:10px;text-align:right;">
<div align="right" style="width:100px;" >

<a href="adminblast.php">Homepage</a>
</div>
</div>
</div>
<script language="javascript" type="text/javascript">
<!--
//Browser Support Code
function ajaxFunction(){
var x=document.forms["myForm"]["info"].value;
if (x==null || x=="")
  {
  alert("Please place the subject of the blast");
  return false;
  }
  var x=document.forms["myForm"]["user"].value;
if (x==null || x=="")
  {
  alert("Please place a admin name into the form");
  return false;
  }
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
				var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var user = document.getElementById('user').value;
	var info = document.getElementById('info').value;
	var queryString = "?user=" + user + "&info=" + info;
	ajaxRequest.open("GET", "adminajax.php" + queryString, true);
	ajaxRequest.send(null); 
}
-->
</script>
<h1>Blast Image Generator</h1>
<div style="text-align:left; padding-left:10px;">
<form name='myForm'>
Admin  Name: <input type="text" id="user"><br />
Subject Line: <input type="text" id="info" size="100"><br />

<input type='button' onclick='ajaxFunction()' value='Submit' />
</form><br /><br />
</div>
<div id='ajaxDiv'><h3>Tracking Image Link will Display Here</h3></div>


</body>
</html>