function valid() {
	// body...
	var cpass = document.forms["form"]["cpass"].value;
	var npass = document.forms["form"]["npass"].value;
    var rpass = document.forms["form"]["rpass"].value;

	var flag = true;
    if(cpass===""){
    	document.getElementById('cpassError').innerHTML="Field required";
    	flag = false;
    }
    else{
        document.getElementById('cpassError').innerHTML="";
    }
     if(npass===""){
    	document.getElementById('npassError').innerHTML="Field required";
    	flag = false;
    }
    else{
        document.getElementById('npassError').innerHTML="";
    }
    if(rpass===""){
    	document.getElementById('rpassError').innerHTML="Field required";
    	flag = false;
    }
    else{
        document.getElementById('rpassError').innerHTML="";
    }
    return flag;
}
