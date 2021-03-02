<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  
  <!-- body -->
   
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="#">Navbar</a>

<form class="container-fluid justify-content-start">

    <button type="submit"   formmethod="POST" formaction="<?= NEWTAB ?>" class="btn  btn-primary <?= !isset($_SESSION['logged']) ? 'disabled': "" ; ?>" style="margin-right: 20px;" type="button">New Card</button>
    <button class="btn  btn-secondary btn-sm align-middle  <?php if(!isset($_SESSION['logged'])){ echo 'disabled';} ?>" type="button">Remove Card</button>
 
  </form>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
<?php if(isset($_SESSION['logged'])): ?>    
  	<span class="navbar-text" style=" padding-right: 50px !important;">
     Hello <b> <?php echo $VARS['session_login']; ?> </b>
    </span>
<?php endif; ?>

    <form class="form-inline my-2 my-lg-0">
	
      <button class="btn btn-outline-success my-2 my-sm-0" formaction="<?php echo isset($_SESSION['logged']) ?  LOGOUT :  LOGIN; ?>"formmethod="POST" name='from_main' type="submit"><?php  echo (isset($_SESSION['logged'])) ? 'Выйти' : 'Войти'; ?></button>            
    </form>
  </div>
</nav>


<div class="container">
  
    <div class="row my-5">
<?php
  $c= 0;
  foreach ($VARS['cards'] as $card) {
      if ($c === 2)
      {
        ?>
          </div>
            <div class="row my-5">
        <?php

        $c = 0;
      }
   
      ?>
         <div class="col-sm-6">
           <div class="card">
             <div class="card-body">
               <h2> <?php echo htmlspecialchars(strtoupper( $card->title )); ?>   </h2> 
               <p class="card-text"> <?php echo strtoupper($card->text);   ?></p>
               <p>creator: <?php echo $card->creator; ?> </p>
               <span>link -> <a href="<?= $card->link; ?>"> <?= $card->link; ?> </a> </span> 
               <a href="<?php echo $card->link;   ?>"> <br> <br>
                 <button class="btn  btn-primary" style="margin-right: 20px;" type="button">Open</button>
               </a>
               
             </div>
           </div>
         </div>

      <?php
    $c++;
  }

  //TODO MAKE BUTTONS TO THE LINKS <a>
?>

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

