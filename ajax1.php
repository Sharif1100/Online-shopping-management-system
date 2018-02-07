<!DOCTYPE html>
<html>
<head>
<script>
function showUser(str) {
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    //document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
      //document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","getuser.php?signal=read&q="+str,true);
  xmlhttp.send();
}


  /*if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
//else{   
  if (window.XMLHttpRequest) {  
  xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();*/
//}
</script>
</head>
<body>
<?php require 'template/header.php'; ?>
<!--<form>
<input type="text"  onkeyup="showUser(this.value)">
<div id="txtHint"><b>Person info will be listed here.</b></div>


<input type="submit"  onclick="showUser(this.value)">
</form>
<br>-->


</body>
</html>
<!--
<!DOCTYPE html>
<html>
<head>
<script>
			
function showUser(str){
			 //var results = '';
//str=document.getElementById('searchInput').value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			//alert(xmlhttp.responseText);
			//document.getElementById("spinner").style.visibility= "hidden";
		
		document.getElementById("txtHint").innerHTML = msg;
		
		}
	};
			
			
			//document.getElementById("spinner").style.visibility= "hidden";
		
			
		//var url="j.php?signal=readNAME&name="+str;
	//alert(url);
xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}

</script>
</head>
   <form>
<input type="text"  onkeyup="showUser(this.value)">
<div id="txtHint"><b>Person info will be listed here.</b></div>


<input type="submit"  onclick="showUser(this.value)">
</form>
<br>
		</body>
</html>-->