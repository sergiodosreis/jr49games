<?php require 'header.php';?>

<?php


/*
*
* Tratamento das informações dos Forms Bug e Message
*
*/ 

//Tratamento do Bug-form
		
		
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{//Apertei o submit e envie o formulário

		//Se o form for o Bug
		if($_POST['identificador'] == 'bugform')
		{
			$email = test_input($_POST["bugform-email"]);  
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		    {
		    	echo '<script>alert("Invalid email format") </script>';
		    }
			$email = test_input($_POST["bugform-email"]);
			$game = $_POST["bugform-games"];
			$version = $_POST["bugform-version"];
			$message = $_POST["bugform-message"];

			$sendMail = new Email();
			$sendMail->addAdress('admin@jr49games.com', 'JR 49 GAMES');
			$info = array('subject' => 'Bug Report', 'Body' => "<h2>Meu email é: ".$email." </h2> <h2>Game: ".$game." </h2><h2>Version: ".$version." </h2><h2>Message: ".$message." </h2>");
			$sendMail->FormatEmail($info);
			
			if($sendMail->SendEmail()){
				echo '<script>alert("Email has been sent.") </script>';
			}else{
				echo '<script>alert("Sorry. Email has not been set. Please, try later.") </script>';
			}
  		}

  		//Se o form for o Message
		if($_POST['identificador'] == 'messageform')
		{
			$email2 = test_input($_POST["messageform-email"]);  
		    if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) 
		    {
		    	echo '<script>alert("Invalid email format") </script>';
		    }
			$email2 = test_input($_POST["messageform-email"]);
			
			$message2 = $_POST["messageform-message"];

			$sendMail2 = new Email();
			$sendMail2->addAdress('admin@jr49games.com', 'JR 49 GAMES');
			$info2 = array('subject' => 'New Message', 'Body' => "<h2>Meu email é: ".$email2." </h2> <h2>Message: ".$message2." </h2>");
			$sendMail2->FormatEmail($info2);
			
			if($sendMail2->SendEmail()){
				echo '<script>alert("Email has been sent.") </script>';
			}else{
				echo '<script>alert("Sorry. Email has not been set. Please, try later.") </script>';
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


	
	<section class="content8">
		<div class="center path">
			<div class="company align">
				<a href="index.php"><img src="images/logo.png" style="width:200px; padding: 20px;"></a>
				<p>JR 49 GAMES is an independent game studio located in Ontário, Canadá with a keen interest in handcrafted puzzles and adventure type games.</p>
			</div><!--company-->
		</div><!--center path-->
	</section><!--content8-->

	<br>

	<section class="content9">

		<div class="form2 center">			    
				<div class="form2-wrapper">
					<h2>CONTACT US</h2>
					<p>For report bugs, please use the form below.</p>


					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						
						<label>Email <span style="color: red; font-size:18px">*</span></label>
						<input type="text" name="bugform-email" placeholder="Your Email" required>
						
						<label for="games">Game<span style="color: red; font-size:18px">*</span></label>
	  						<select id="games" name="bugform-games">
	    						<option value="path">PATH</option>
	    					</select>
						
						<label>Version<span style="color: red; font-size:18px">*</span></label>
						<input style="width: 20%;" type="text" name="bugform-version" required>
						
						<label>Message<span style="color: red; font-size:18px">*</span></label>
						<textarea name="bugform-message" placeholder="Your Message" required></textarea>
						
						<input type="hidden" name="identificador" value="bugform">

						<input type="submit" name="" value="SUBMIT">
					</form>

				
					<p>For other questions or feedback, use the following form.</p>

					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						
						<label>Email<span style="color: red; font-size:18px">*</span></label>
						<input type="text" name="messageform-email" placeholder="Your Email">
						<label>Message<span style="color: red; font-size:18px">*</span></label>
						<textarea name="messageform-message" placeholder="Your Message" required></textarea>
						
						<input type="hidden" name="identificador" value="messageform">

						<input type="submit" name="message-message" value="SUBMIT">
					
					</form>



				</div>
		
		</div><!--form2 center-->	

	</section><!--content9-->

	<br>

<?php require 'footer.php';?>

	
		
