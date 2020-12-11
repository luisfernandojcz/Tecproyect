<?php

	   $user = $_GET['user'];
	   $password = $_GET['password'];
	    
	   $user1 = "administrador";
	   $pass1 = "nimda";
	   $user2 = "cliente";
	   $pass2 = "tneilc";
	    
	   $error_notif = "¡Contraseña o usuario incorrecto!" . '<a href="'.$_SERVER['HTTP_REFERER'].'">Volver</a>';
	 
	   switch ($user) {
	      case $user1:
	         if ($password == $pass1) {
	            echo "" . $user;
                    include 'index-1.html.';
	         } else {
	            echo $error_notif;
	         }
	      break;
	      case $user2:
	         if ($password == $pass2) {
	            echo "" .$user;
                    include 'productos.php'; 
	         } else {
	            echo $error_notif;
	         }
	      break;
	      default:
	         echo $error_notif;
	   }
  
	?>