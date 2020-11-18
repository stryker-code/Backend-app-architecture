<?php
if (!isset($_SERVER['PHP_AUTH_USER'])){
	header('WWW-Authenticate: Basic realm="My protected administration"');
	header('HTTP/1.0 401 Unathorized');
	echo 'You not enter your data';
    } else	{
		echo $_SERVER['PHP_AUTH_USER'];
	  }
