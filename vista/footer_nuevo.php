       <!--BEGIN FOOTER-->
            <div id="footer" >
                <div class="copyright">Olimpiada Venezolana de Informática, Sistema de Entrenamiento Para Competencias Internaciónales de Programación 2017.</div>
            </div>
            <!--END FOOTER--></div>
        <!--END PAGE WRAPPER--></div>
</div>

<script type="text/javascript" src="libreria/bootstrap-3.3.6/js/bootbox.min.js"></script>
<!-- calendario con hora -->
<script type="text/javascript" src="libreria/datepicker_master/js/moment.js"></script>
<script type="text/javascript" src="libreria/datepicker_master/js/bootstrap-datetimepicker.min.js"></script>
<!--loading bootstrap js-->
<script src="libreria/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="libreria/combinado_footer.js.php"></script>
<script src="libreria/iCheck/icheck.min.js"></script>
<script src="libreria/iCheck/custom.min.js"></script>
<script type="text/javascript" src="js/jquery.menu.js.php"></script>
<script type="text/javascript" src="libreria/flot-chart/combinado_flot.js.php"></script>
<script src="libreria/calendar/zabuto_calendar.min.js"></script>

<script src="js/index.js"></script>
<!--Cargar notificaciones-->
<!--CORE JAVASCRIPT-->
<script src="js/main.js"></script>
<!--
<script>(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-145464-12', 'auto');
ga('send', 'pageview');
-->

	<?php
	if($lib_data_table){
		echo '
		<script type="text/javascript" src="libreria/DataTables-1.10.11/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/media/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/Buttons/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/jszip.min.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/pdfmake.min.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/vfs_fonts.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/Buttons/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/Buttons/js/buttons.print.min.js "></script>
		<script type="text/javascript" src="libreria/DataTables-1.10.11/extensions/Buttons/js/buttons.colVis.min.js "></script>
		';
	}
	?>
	
</body>
</html>
