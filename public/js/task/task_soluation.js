let upload_soluation_ = document.getElementById('upload_soluation'),
    file = document.getElementById('file'),
    button_cancel = document.getElementById('cancel'),
    name_file = document.getElementById('name_file');

var loadFile = function(event) {
	

	let acutal_name = file.value.split('\\');
	
     name_file.innerHTML = "Name of file: "+acutal_name[acutal_name.length -1];
     name_file.style.display = 'block';
     button_cancel.style.display = 'block';

};


button_cancel.onclick = function(){
	file.value = '';
	name_file.innerHTML = "";
	button_cancel.style.display = 'none';
};
