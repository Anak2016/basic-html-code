
//print report 
var report = function(answer){

	document.getElementById("result").value=
	answer;

}

//check entry point
function check(entry){

	
	if( entry === ""){//check if entry is empty
		alert("Error: nothing was entered")
		document.getElementById("result").value ="";
		document.getElementById("input_text").value ="";
	}
	else if( entry.search(" ") > -1 ){ //check if more than 1 number is empty
		alert("Error:  more than 1 number was entered");
		document.getElementById("result").value = "";
		document.getElementById("input_text").value ="";
	}
	else if( isNaN(entry)== 1){// check if enry is a number
		alert("Error: only number must be entered")
		document.getElementById("result").value ="";
		document.getElementById("input_text").value ="";
	}
	else{
		return 1;
	}
}


//convert from inches to feet
function inchesTofeet(inches){
	return (inches/12) + " ft";
}
//convert from feet to yards
function feetToyards(feet){
	return (feet/3) + " yd";
}
//convert from inches to yards
function inchesToyards(inches){
	return (inches/36) + " yd";
}
//convert from feet to inches 
function feetToinches(feet){
	return (feet*12) + "\u2033";
}
//convert from yards to feet
function yardsTofeet(yards){
	return (yards * 3) + " ft";
}
//convert from yards to inches
function yardsToinches(yards){
	return (yards * 36) + "\u2033";
}

//convert and print report 
document.getElementById("i_to_f").onclick = function(){
	var i = document.getElementById("input_text").value;{
		var f = inchesTofeet(i);
		if( check(i) == 1){
			report(f);
		}else{
			return;
		}
	}
};

document.getElementById("f_to_y").onclick = function(){
	var f = document.getElementById("input_text").value;{
		var y = feetToyards(f);
		if( check(f) == 1){
			report(y);
		}else{
			return;
		}
	}
};

document.getElementById("i_to_y").onclick = function(){
	var i = document.getElementById("input_text").value;{
		var y = inchesToyards(i);
		if( check(i) == 1){
			report(y);
		}else{
			return;
		}
	}
};

document.getElementById("f_to_i").onclick = function(){
	var f = document.getElementById("input_text").value;{
		var i = feetToinches(f);
		if( check(f) == 1){
			report(i);
		}else{
			return;
		}
	}
};

document.getElementById("y_to_f").onclick = function(){
	var y = document.getElementById("input_text").value;{
		var f = yardsTofeet(y);
		if( check(y) == 1){
			report(f);
		}else{
			return;
		}
	}
};

document.getElementById("y_to_i").onclick = function(){
	var y = document.getElementById("input_text").value;{
		var i = yardsToinches(y);
		if( check(y) == 1){
			report(i);
		}else{
			return;
		}
	}
};
