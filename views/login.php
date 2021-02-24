<!DOCTYPE html>
<html>

	<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


		<title>
			Test Title
		</title>

		<style>
			#form input {
				padding: 10px;
				margin-bottom: 15px;
			}
		</style>
		
		
	</head>

	<body style ="
		width: 100vw;
		height: 100vh;
	">

		<div style = "
			width: 100%;
			height: 100%;
			
			display: flex;
			justify-content: center;
			align-items: center;
		">
			
	<form action="<?php echo $VARS['login_page']; ?>" method="POST">

		<input type="hidden" name="form_mark">
		<div class="form-group">
			<label for="login" >Login</label>
			<input class="form-control" name="login"  type="text" id="login" placeholder="Login">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1"  >Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-check">
		  <input class="form-check-input" name="remember_me_mark" type="checkbox" value="1" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
			Запомнить меня
		  </label>
		</div>
		<button type="submit" class="btn btn-primary" >Войти</button>
		<button type="submit" class="btn btn-secondary"   formaction="<?php echo $VARS['register_page']; ?>">Регистрация</button>
		<?php
			if (isset($VARS['session_login_error']))
			{
				?>
					<div class="form-group">
					<span style="color: red;"> <?php echo $VARS['session_login_error']; ?> </span>
					</div>
				<?php
			}
		?>
		

</small>

	</form>

			
		
		</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>


</html>


