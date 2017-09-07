<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script type="text/javascript">
        var client = filestack.init("A4e3fBA8JTkOq2h4hG7NDz");
        document.getElementById("updateIcon").addEventListener("click", updateIcon);
        function updateIcon(){
        	console.log("Updating Icon...");
        	client.pick({
        		accept: "image/*",
        		maxFiles: 1,
        		fromSources: ['local_file_system', 'facebook', 'googledrive', 'webcam'],
        		imageMax: [400,400],
        	}).then(function(result){
        		console.log(JSON.stringify(result));
        		var handle = result.filesUploaded[0].handle;
        		console.log(handle);

        		$('input[name=image]').val(handle);

                $("#filestackConfirm").after(function(){
                    return "<p>Image successfully uploaded!</p>";
                });

        	});
        }

                document.getElementById("lessonPlan").addEventListener("click", lessonPlan);
                function lessonPlan(){
                	console.log("Updating Lesson...");
                	client.pick({
                		accept: [".doc", ".docx", ".pdf"],
                		maxFiles: 1,
                		fromSources: ['local_file_system', 'googledrive', 'gmail', 'dropbox',],
                		maxSize: 1024*1024
                	}).then(function(result){
                		console.log(JSON.stringify(result));
                		var handle = result.filesUploaded[0].handle;
                		console.log(handle);



                	});
                }
</script>