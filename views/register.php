<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    
    
    <style>
      html, body, .container, .row {
          height: 100%;
      }
      
    
    </style>
  </head>
  <body>
  
  <!-- body -->
  
  <div class="container" >

 <div class="row justify-content-md-center align-items-center">
 
 <div class="col-md-3 .col-sm-4">
 <form action="<?php echo REGISTER; ?>" method="POST">
 	<input type="hidden" name="register_form_mark">
    <div class="form-group">
			<label for="login">Логин</label>
			<input class="form-control" type="text" name="login" id="login" placeholder="Login">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Пароль</label>
			<input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
   		<div class="form-group">
			<label for="exampleInputPassword2">Пароль повторно</label>
			<input type="password" name="password2"class="form-control" id="exampleInputPassword2" placeholder="Password">
		</div>
	
		<button type="submit" class="btn btn-primary">Регистрация</button>
		<button class="btn btn-secondary" formaction="<?php echo LOGIN; ?>">Войти</button>
			<?php
				if (isset($VARS['session_registration_error']))
				{
					?>
						<div class="form-group">
						<span style="color: red;"> <?php echo $VARS['session_registration_error']; ?> </span>
						</div>
			<?php
			}
		?>

	</form>
 </div>
 
 </div>
 </div>
	
 
<!-- body -->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>