<?
include("db.php");

?>
<!DOCTYPE HTML>
</head>
<body>
<div class="col-sm-12 col-md-12 col-lg-12 container"> <br>


  <form id="fileupload"  method="POST" enctype="multipart/form-data">
  <input name="token_oculto" id="token_oculto" type="hidden" value="<?=$token;?>">
    <!-- Redirect browsers with JavaScript disabled to the origin page --> 
    
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="row fileupload-buttonbar">
      <div class="col-lg-9 col-md-11 col-sm-9"> 
        <!-- The fileinput-button span is used to style the file input field as button --> 
        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Agregar archivos...</span>
        <input type="file" name="files[]" multiple>
        </span>
        <button type="submit" class="btn btn-primary start"> <i class="glyphicon glyphicon-upload"></i> <span>Iniciar la subida</span> </button>
        <button type="reset" class="btn btn-warning cancel"> <i class="glyphicon glyphicon-ban-circle"></i> <span>Cancelar la subida</span> </button>
        
        <!-- The global file processing state --> 
        <span class="fileupload-process"></span> </div>
      
      <!-- The global progress state -->
      <div class="col-lg-9 col-md-11 col-sm-9 fileupload-progress fade"> 
        <!-- The global progress bar -->
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar progress-bar-success" style="width:0%;"></div>
        </div>
        <!-- The extended global progress state -->
        <div class="progress-extended">&nbsp;</div>
      </div>
    </div>
    
    <!-- The table listing the files available for upload/download -->
    

    
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="table-responsive" >
        <table role="presentation" class="table table-striped">
          <tbody class="files">
          </tbody>
        </table>
      </div>
    </div>
        
  </form>
  <br>
</div>
<script>

 $(function () {

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
	
 });

</script>
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Procesando...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Subir</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>


<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="gabinete/+{%=file.url%}" target="_blank" title="{%=file.name%}" ><img src="gabinete/+{%=file.thumbnailUrl%}" class="FotoUpload"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}

<a href="gabinete/+{%=file.url%}" target="_blank" title="gabinete/+{%=file.name%}">{%=file.name%}</a>

                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Eliminar</span>
                </button>
                
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--> 

<!--<link rel="stylesheet" href="/gabinete/upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="/gabinete/upload/css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="/gabinete/upload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="/gabinete/upload/css/jquery.fileupload-ui-noscript.css"></noscript>

<script src="/gabinete/upload/js/vendor/jquery.ui.widget.js"></script>
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-process.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-image.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-validate.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-ui.js"></script>--> 
<script src="/gabinete/upload/js/main2.js"></script>

</body>
</html