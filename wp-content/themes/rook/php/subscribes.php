<?php

/* ---------------------------------------------------------------- */
/* Subscription part
/* ---------------------------------------------------------------- */

/* Config */

$myFile = "../subscriptions.txt";
$date = date( "F j, Y, g:i a" );

/* Code */
if ( ! empty( $_POST[ 'email' ] ) ) {
	$fh = fopen( $myFile, 'a' ) or die( "can't open file" );
	$stringData = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) . "            |              " . $date . "\r\n";
	if ( fwrite( $fh, $stringData ) )
		$result = '<div id="th_bg_subscribe_succes"><i class="fa fa-check"></i> Email successfully added!</div>';
	else
		$result = '<div id="th_bg_subscribe_error"><i class="fa fa-times"></i> Operation could not be completed.</div>';
	fclose( $fh );
}else {
	$result = '<div id="th_bg_subscribe_error"><i class="fa fa-times"></i> Enter email to subscribe</div>';
}
echo $result;
?>