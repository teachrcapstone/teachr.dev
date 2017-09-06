<script type="text/javascript">
        var client = filestack.init("A4e3fBA8JTkOq2h4hG7NDz");
        // client.pick({})
        document.getElementById("updateIcon").addEventListener("click", updateIcon);
        function updateIcon(){
        	console.log("Updating Icon...");
        	client.pick({
        		accept: "image/*",
        		maxFiles: 1,
        		fromSources: ['local_file_system', 'facebook', 'googledrive', 'webcam'],
        		maxSize: 400*400,
        	}).then(function(result){
        		console.log(JSON.stringify(result));
        		var handle = result.filesUploaded[0].handle;
        		console.log(handle);

        		var imageHandle = "<input type='hidden' value='"+handle+"' name='imageHandle'></input>"
        		$("#image").append(imageHandle);
        	});
        }
</script>