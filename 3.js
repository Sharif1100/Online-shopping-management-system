function test3(){
	var v3=document.forms[0].phone.value;
	if(v3.length==11){
		document.getElementById("value3").style.color="green";
	document.getElementById("value3").innerHTML="okk";	
}
	else{
document.getElementById("value3").style.color="red";
	document.getElementById("value3").innerHTML="your phone number should have 11 digit";	
	}
}
function test4(){
	var v4=document.forms[0].email.value;
	
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3,4})+$/;  
if(v4.match(mailformat))  
{  
document.getElementById("value4").style.color="green";
	document.getElementById("value4").innerHTML="okk"; 
}  
else  
{  
document.getElementById("value4").style.color="red";
document.getElementById("value4").innerHTML="you must provide a valid email";
 }  
}
function test5(){
	var v5=document.forms[0].gender.value;
	if((v5==1)||(v5==2)){
		document.getElementById("value5").style.color="green";
	document.getElementById("value5").innerHTML="okk";	
}
}
function test6(){
	var v6=document.forms[0].password.value;
		if(v6.length>7){
		document.getElementById("value6").style.color="green";
	document.getElementById("value6").innerHTML="okk";	
}
	else{
document.getElementById("value6").style.color="red";
	document.getElementById("value6").innerHTML="password must contain 8 letter";	
	}
}
function test7(){
	var v7=document.forms[0].conpass.value;
	var v8=document.forms[0].password.value;
		if(v7.length>7&&v7==v8){
		document.getElementById("value7").style.color="green";
	document.getElementById("value7").innerHTML="match";	
}
	else{
document.getElementById("value7").style.color="red";
	document.getElementById("value7").innerHTML="don't match";	
	}
}
function check(){
	flag=true;
	var c=document.forms[0].gender.value;
	var d=document.forms[0].phone.value;
	var e=document.forms[0].email.value;
	var f=document.forms[0].password.value;
	var g=document.forms[0].conpass.value;
	if(c==""||d==""||e==""||f==""||g==""){
	flag=false;
	
		alert("Error in form");
		return false;
	}
else{
		
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
var pass= f.length;
 //var pass2=g.length;
		if((c) && (d.length==11)&& (e.match(mailformat)) && (f==g) && (f=pass>7)){
		document.forms[0];
		
		}
		else{
	alert("you must provide valid info");
		return false;		
		}

	
}
}