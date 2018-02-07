<!DOCTYPE html>
<html>
<head>
<script>
			
function showHint(){
			 //var results = '';
str=document.getElementById('searchInput').value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			resp=JSON.parse(xmlhttp.responseText);
			msg="";
			for(i=0;i<resp.length;i++){
				msg=msg+resp[i].id+"<br>";
				
				//msg=msg+'<a href="singleProduct.php?product_id='+ resp[i].id + '">' + resp[i].name + '</a>'+"<br>";
			//alert(msg);
			
			}
			document.getElementById("txtHint").innerHTML = msg;
			
			//document.getElementById("spinner").style.visibility= "hidden";
		}
	};		
		var url="jsondb.php?signal=readNAME&name="+str;
	//alert(url);
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

</script>
</head>
       <input type="text" id="searchInput" value="" onkeyup="showHint()">
		<p>Data from DB using JSON :</p><span id="txtHint"></span>
<br/>
<input type="button"  id="searchButton"   value="Search" onclick="showHint()"></br></br>
		</body>
</html>