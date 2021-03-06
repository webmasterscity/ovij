<?php
	
	header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	// ########################## INCLUDE BACK-END ###########################
	require_once (dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'bootstrap.php');
	require_once (dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . AC_FOLDER_INCLUDES . DIRECTORY_SEPARATOR . 'init.php');
	require_once (dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions_send.php');

	// ########################### GET POST DATA #############################
	$status 	= get_var('status');

	// ######################### START POST STATUS ###########################
	if (!empty($_POST['status'])) 
	{
		$db->execute("
			INSERT INTO chat_status (
				userid,
				status
			) 
			VALUES (
				'" . $db->escape_string($userid) . "',
				'" . $db->escape_string(sanitize($status)) . "'
			) 
			ON DUPLICATE KEY 
				UPDATE status = '" . $db->escape_string(sanitize($status)) . "'
		");

		if ($status == 'offline') 
		{
			$_SESSION['chat_sessionvars']['buddylist'] = 0;
		}

		echo "1";
		close_session();
		exit(0);
	}

?>
