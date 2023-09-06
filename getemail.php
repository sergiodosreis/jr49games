

<?php

/*
*
*	Tratamento das informações coletadas no form SUBSCRIBERS 
*
*/

$dsn = 'mysql:dbname=jrfounin_jr49games;host=192.185.4.145';
$user = 'jrfounin_root';
$password = '*jr57tecn';

$pdo = new PDO($dsn, $user, $password);

// define variables and set to empty values
$email = "";
$emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
				
		if (empty($_POST["email"])) 
		{
	    echo '<script>alert("Email is required") </script>';
	  } 
	  else 
	  {
	    $email = test_input($_POST["email"]);  
	   
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	    {
	    		echo '<script>alert("Invalid email format") </script>';
	    }

			else
			{
          //TO DO: Incluir teste para ver se o email já existe no banco de dados

					$sql = $pdo->prepare("INSERT INTO `subscribers` VALUES (null, ?)");

					$sql->execute(array($email));
					echo '<script>alert("Thanks. Email has been sent.") </script>';
										
			}
		}
	
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<div class="getemail">
			
			<h2>Get notified of our game’s launch “PATH” on Steam !</h2>
			<p>Sign up with your email adress to receive news and updates.</p>
			
			<form class="getemail-wrapper" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
				<div class="wrapper-email">
				
					<label>E-mail*</label>
					<input type="text" name="email" required>
									
				</div><!--wrapper-email-->
				
				<input type="submit" name="subscribe" value="SUBSCRIBE">
						
			</form>
			
</div><!--getemail-->