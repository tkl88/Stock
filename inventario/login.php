<?php

if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    
    require_once("libraries/password_compatibility_library.php");
}

require_once("config/db.php");


require_once("classes/Login.php");


$login = new Login();


if ($login->isUserLoggedIn() == true) {
    
   header("location: stock.php");

} else {
   
    ?>
	<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">	
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/login2.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
		<div class="card card-container">
			<?php
				
				if (isset($login)) {
					if ($login->errors) {
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						    <strong>Error!</strong> 
						
						<?php 
						foreach ($login->errors as $error) {
							echo $error;
						}
						?>
						</div>
						<?php
					}
					if ($login->messages) {
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
						    <strong>Aviso!</strong>
						<?php
						foreach ($login->messages as $message) {
							echo $message;
						}
						?>
						</div> 
						<?php 
					}
				}
				?>
              <div class="simple-login-container">
    <h2>Login</h2>
    <div class="row">
        <div class="col-md-12 form-group">
            <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required >
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input  class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
		<button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submits">Iniciar Sesión</button>
        </div>
    </div>
</div>
</div>
</body>
</html>

	<?php
}


