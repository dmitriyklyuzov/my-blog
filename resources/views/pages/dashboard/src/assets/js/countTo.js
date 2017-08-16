function countTo(to, element){
	
	var i=0;
	
	while(i<to){
		setTimeout(
			function(){
				// element.html(i);
				i++;
			},
			1000);
		}
	}
}

// countTo(0, 20, $('#user-number'));