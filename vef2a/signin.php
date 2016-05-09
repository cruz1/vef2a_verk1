 <!DOCTYPE html>
<html>
<head>
	<?php include_once("includes/title.php") ?>
  <?php include_once("includes/header.php") ?>
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
	<?php include_once("includes/menu.php") ?>

	<div class="container">

    <h1>Innskra</h1>
    		<form action="login.php" method="post" >

			<div class="form-group">
    			    <label for="email">Email</label>
    			    <input name="email" type="email" class="form-control" id="email">
    			</div>
    		<div class="form-group">
        			<label for="pwd">pwd:</label>
        			<input name="password" type="password" class="form-control" id="pwd">
			    </div>
    				<button type="submit" name="subinnskra" class="btn btn-success">login</button>
    		</form>
          <a href="tyntlykilord.php">buinn að tína lykilorði?</a>
    <h1>Nyskra</h1>
		<form action="create_user.php" method="post" >
      <div class="form-group">
          <label for="name">Name</label>
          <input type="name" class="form-control" id="name" name="name">
        </div>
			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email">
		    </div>
			<div class="form-group">
    			<label for="pwd">pwd:</label>
    			<input type="password" class="form-control" id="pwd" name="password">
			</div>

      <div class="g-recaptcha" data-sitekey="6LdBNxkTAAAAAEyr8FiSR8PT4Wv3EGYM5r4LcrBO"></div>

      <button type="submit" name="subnyskra" class="btn btn-success">Register</button>

</form>

	</div>


	<?php include_once("includes/footer.php") ?>
</body>
</html>
