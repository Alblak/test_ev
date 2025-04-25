<?php

	session_start();
	try {
		
	$connexion=new PDO('mysql:dbname=biblio; host=localhost', 'root', '');
	
	} catch (Exception $e) {
		print $e->getMessage();
	}
