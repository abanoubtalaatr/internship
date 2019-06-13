let	 file 	 = document.getElementById('file'),
     button  =document.getElementById('save_image'),
     real_image = document.getElementById('real_image').getAttribute('src'),
     delete_image = document.getElementById('delete_image'); 


// this for preview image before send it to server
var loadFile = function(event) {
var real_image = document.getElementById('real_image');
real_image.src = URL.createObjectURL(event.target.files[0]);
};

// this for send the new image to controller ImageController to save it in data base
button.onclick = function (evt){
   evt.preventDefault();

	if(file.value !==''){
		
		ajaxRequest = new XMLHttpRequest();
		ajaxRequest.onreadystatechange = function() {
		  if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){
		  	  if(ajaxRequest.response ==''){
		  	    console.log('yes');  	
		  	  } 
				   		   
			}// end if is set response
		  }//onchange
		
		let dataForm = new FormData(this.parentNode);
		ajaxRequest.open('POST',"handle_image",true);
		
		ajaxRequest.send(dataForm);
	
	}//end if 
	
}// button to send photo

// this to delete image or reset to default image
// delete_image.onclick = function(evt){
//    evt.preventDefault();

//    ajaxRequest = new XMLHttpRequest();
// 		ajaxRequest.onreadystatechange = function() {
// 		  if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200){
// 		  	  if(ajaxRequest.response ==''){
		  	   	
// 		  	  } 
				   		   
// 			}// end if is set response
// 		  }//onchange
		
		
// 		ajaxRequest.open('POST',"image",true);
// 		ajaxRequest.send(dataForm);


// }//end delete image



