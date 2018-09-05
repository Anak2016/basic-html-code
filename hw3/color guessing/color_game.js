var colors = [
	"rgb(255, 0, 0)",
	"rgb(255, 255, 0)",
	"rgb(255, 0, 255)",
	"rgb(0, 255, 0)",
	"rgb(0, 255, 255)",
	"rgb(0, 0, 255)"
	]

var squares = document.querySelectorAll(".square");
var pickedColor = colors[3];
var colorDisplay = document.getElementById("colorDisplay");
var message = document.querySelector("#message");

// colorDisplay.textContent = pickedColor;


for(var i =0; i< squares.length; i++){
	squares[i].style.backgroundColor = colors[i];

	squares[i].addEventListener("click", function(){
		var clickedColor = this.style.backgroundColor;
		if (clickedColor == pickedColor){
			message.textContent = "Correct!";
			changeColor(clickedColor);
			// for(var i=0;i <squares.length; i++){
			// 	colors[i].style.backgroundColor = pickedColor;
			// }
		}else{
			this.style.backgroundColor = "#232323";	
			message.textContent = "Try Again";
		}
	});	
}

func	tion changeColor(color){	
	for(var i=0;i <squares.length; i++){
		squares[i].style.backgroundColor = color;
	}
}

