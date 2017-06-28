$(function()
{
	// Variable to store your files
	var files;
	//alert(ruta);
	
	$('input[id=file_upload_simple]').on('change', prepareUploadArancel);

	// Grab the files and set them to our variable
	function prepareUploadArancel(event)
	{
		files = event.target.files;
		uploadFilesArancel(event);
		//alert("hola4");
	}

	// Catch the form submit and upload the files
	function uploadFilesArancel(event)
	{
		event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening
        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
		
		
		
		var data = new FormData();
		$.each(files, function(key, value)
		{
			data.append(key, value);
		});
		
		var token_oculto=$("#token_oculto").val();
         
        $.ajax({
            url: 'upload_simple/submit_simple.php?files&token_oculto='+token_oculto,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			beforeSend: function () {
				
			    $("#CargaVistaArchivosSimple").html('<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>Subiendo Archivo');
				
			},
            success: function(data, textStatus, jqXHR)
            {
				if(data.extension=="jpg" || data.extension=="JPG" || data.extension=="jpeg" || data.extension=="JPEG" || data.extension=="png" || data.extension=="PNG")
				{
					CargarVistaSimple(data.files,data.files2);
					//$("#val_arancel" ).html(null);
				}
				else
				{
					showNotification("alert-danger", "Solo se pueden adjuntar archivos con extenci&oacute;n de imagen",'top','center',null,null);
					$("#CargaVistaArchivosSimple").html(null);
					
				}
				
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            	// Handle errors here
            	//console.log('ERRORS: ' + textStatus);
            	// STOP LOADING SPINNER
            }
        });
		
		
		
		
    }
	
	function CargarVistaSimple(files,files2)
	{
		var parametros = {             
		"files" : files,
		"files2" : files2,
		
	};
		
		$.ajax({
		data:  parametros,
		url:   'upload_simple/vista_archivos_simple.php',
		type:  'post',
		beforeSend: function () {
			   // $("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			
			$("#CargaVistaArchivosSimple").html(response);				
		
		}
	});
	}

    function submitForm(event, data)
	{
		// Create a jQuery object from the form
		$form = $(event.target);
		
		// Serialize the form data
		var formData = $form.serialize();
		
		// You should sterilise the file names
		$.each(data.files, function(key, value)
		{
			formData = formData + '&filenames[]=' + value;
		});
		

		$.ajax({
			url: 'submit.php',
            type: 'POST',
            data: formData,
            cache: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
            	if(typeof data.error === 'undefined')
            	{
            		// Success so call function to process the form
            		console.log('SUCCESS: ' + data.success);
            	}
            	else
            	{
            		// Handle errors here
            		console.log('ERRORS: ' + data.error);
            	}
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            	// Handle errors here
            	console.log('ERRORS: ' + textStatus);
            },
            complete: function()
            {
            	// STOP LOADING SPINNER
            }
		});
	}
});