 //all li in ul is cross/uncross when clicked on
$("ul").on("click", "li", function(){
	$(this).toggleClass("completed");
});

//all span in u is removed when clicked on
$("ul").on("click", "span", function(event){
	//fade out for 500 ms before it is removed. 
	$(this).parent().fadeOut(500, function(){
		$(this).remove();
	});
	//stop event bubbling
	event.stopPropagation();
});


//append a text to a list and empty a text when press enter.
$("input[type='text']").keypress(function(event){
	//true if press enter
	if(event.which === 13){	
		//grabbing new todo text from input
		var todoText = $(this).val(); 
		//reset to empty
		$(this).val("");
		//create a new li and add to ul
		$("ul").append("<li><span><i class='fas fa-trash-alt'></i></span> " + todoText + "</li>")
	}
});

