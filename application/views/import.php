<div id="right"> 
	<div class="box">
		
		<div class="title" style="width:97%; margin:auto; margin-botton:50px;">
			<h3>Businesses</h3> 	
		</div>
		
		<div class="table">
			<form id="uploadexcel" action="#" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="submit">
			</form>
			<div id="demo">

			</div>
		</div>


	</div>
	
	<script>

var xhttp = new XMLHttpRequest();
var formsubmit = document.getElementById("uploadexcel");
var form = new FormData(formsubmit);
var imageFile = document.getElementById("fileToUpload");

	
	
	
formsubmit.addEventListener("submit", function(event){
		form.append("file",imageFile.files[0]);
		form.append("import",1);
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("demo").innerHTML = this.responseText;
				//alert(this.responseText);
			}
		};
			
		xhttp.open("POST", "<?php echo base_url();?>/actions/upload", true);
		xhttp.send(form);
		event.preventDefault();
});
 
</script>

	


