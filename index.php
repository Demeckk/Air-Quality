<?php

	/* index.php funciona como un router, redirecciona al controlador especificado en slug */

	// se inicia o se continua con la sesion
	session_start();

	/*< se incluyen las variables de entorno*/
	include_once 'env.php';

	/*< se incluyen las librerias para el envio de correo electrónico*/
	include 'lib/php-mailer/Mailer/src/PHPMailer.php';
	include 'lib/php-mailer/Mailer/src/SMTP.php';
	include 'lib/php-mailer/Mailer/src/Exception.php';

	// Carga del motor de plantillas en todos los controladores
	include_once 'lib/Tini/Tini.php';

	// por defecto se presenta landing
	$seccion = "landing";

	// Si slug tiene valor
	if(strlen($_GET['slug'])>0){
		$seccion = $_GET['slug'];	
	}

	// Se comprueba que exista el controlador
	if(!file_exists('controllers/'.$seccion.'Controller.php')){
		// No existe el controlador entonces lo llevamos al controlador de error
		$seccion = "error404";
	}

	// si esta logueado controladores permitidos
	$controller_user_connected = ["panel", "perfil", "logout", "abandonar"];
	// no esta logueado controladores permitidos
	$controller_user_anonymous = ["landing", "login", "register"];

	// Si la sesion esta iniciada
	if(isset($_SESSION["3901"]['usuario'])){
		// los controladores de anonimo no estan permitidos
		$controller_test = $controller_user_anonymous;
		// por defecto se lleva a panel
		$default_seccion = "panel";
	}else{ // sesión no iniciada
		// los controladores de conectado no estan permitidos
		$controller_test = $controller_user_connected;
		// por defecto se lleva a landing
		$default_seccion = "landing";
	}

	// Se analiza cuales controladores estan permitidos
	foreach ($controller_test as $key => $value) {
		// si coincide con un controlador que no deberia solicitar 
	 	if($value == $seccion){
	 		// se manda al controlador por defecto
	 		$seccion = $default_seccion;
	 		break;
	 	}
	}

	
	// Se carga el controlador especificado en seccion
	include_once 'controllers/'.$seccion.'Controller.php';

 ?>