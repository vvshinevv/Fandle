<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function alert($msg='이동합니다', $url='') {
	$CI =& get_instance();
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
	echo "
		<script type='text/javascript'>
			alert('".$msg."');
			location.replace('".$url."');			
		</script>
		";
	exit;
}

function alert_close($msg) {
	$CI =& get_instance();

	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
	echo "
		<script type='text/javascript'>
			alert('".$msg."');
			window.close();
		</script>
	";

	exit;
}

function alert_only($msg, $exit=TRUE) {
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
	echo "
		<script type='text/javascript'> 
			alert('".$msg."'); 
		</script>
	";
}

function replace($url='/') {

	echo "<script type='text/javascript'>";
	if($url)
		echo "window.location.replace('".$url."');";
	echo "</script>";

	exit; 
}