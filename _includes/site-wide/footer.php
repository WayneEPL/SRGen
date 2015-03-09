
			</div><!-- End of id="content-container" -->
		</div> <!-- End of id="container" -->
		<script src="js/foundation.min.js"></script>
		<script src="js/jquery.js"></script>
		<script type="text/javascript">
			$(function(){
			 $("#drop-box").click(function(){
			 	//console.log("clicks read");
			   $("#upl").click();
			 });

			 $(document).on('drop dragover', function (e) {
			    e.preventDefault();
			}); 

			// Add events
			$('input[type=file]').on('change', fileUpload);

			function fileUpload(event){

				$("#drop-box").html("<p>"+event.target.value+" uploading...</p>");
				files = event.target.files;
				var data = new FormData();
				var error = 0;
				for (var i = 0; i < files.length; i++) {
		  			var file = files[i];
		  			console.log(file.size);
					if(!file.type.match('pdf.*')) {
				   		$("#drop-box").html("<p> PDF files only. Select another file</p>");
				   		error = 1;
				   		$("#submitbutton").hide();
				  	}else if(file.size > 5242880){
				  		$("#drop-box").html("<p> Too large Payload. Select another file</p>");
				   		error = 1;
				   		$("#submitbutton").hide();
				  	}else{
				  		
				  		$("#drop-box").html("<p>"+file.name+"</p>");
				  		$("#submitbutton").show();
				  	}
			 	}

			}
			});
		</script>
	</body>
</html>