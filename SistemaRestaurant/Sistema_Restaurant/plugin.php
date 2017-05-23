
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>  

<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<script src="../plugins/morris/morris.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> 
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../plugins/fullcalendar/prueba.js"></script>

<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
   <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

 <!--https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js
-->
<script src="../plugins/fullcalendar/fullcalendar.js"></script>

<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../plugins/chartjs/Chart.min.js"></script>

<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../plugins/notification/notification.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- AdminLTE for demo purposes -->



<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->


<!--<script src="/gabinete/upload/js/vendor/jquery.ui.widget.js"></script>
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-process.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-image.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-validate.js"></script>
<script src="/gabinete/upload/js/jquery.fileupload-ui.js"></script>-->





<script src="../dist/js/demo.js"></script>

<!-- Page script -->
<script>
  $(function () {
	  
	 //var j = jQuery.noConflict();	 
	
 
	  
	  
	  
	 	
	  
	  
    //Initialize Select2 Elements
    $(".select2").select2();
	
	  //Flat red color scheme for iCheck
   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

		<?php echo $plugin_adicional; ?>  

	
	 /*  $('input[type=checkbox]').change(function() {
		   
		 var valor=$(this).prop('checked')+";;;"+$(this).val();
		   
      CambiarEstadoEncuesta(valor);
    })*/

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
            'Este Mes': [moment().startOf('month'), moment().endOf('month')],
            'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
		   format: 'DD/MM/YYYY',
		  language: "es",
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      	autoclose: true,
	 	format: "dd/mm/yyyy",
    	weekStart: 1,
    	language: "es",
    	daysOfWeekDisabled: "0",
		
    });
	 $('#datepicker1').datepicker({
      autoclose: true,
	 	format: "dd/mm/yyyy",
    	weekStart: 1,
    	language: "es",
    	daysOfWeekDisabled: "0"
    });
	

  
  
    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false,
	  timeFormat: 'HH:mm:ss',
	  minuteStep: 5,
	  showMeridian: false,
    });
	$(".timepicker2").timepicker({
      showInputs: false,
	  timeFormat: 'HH:mm:ss',
	  minuteStep: 5,
	  showMeridian: false,
    });
	
  });
</script>
