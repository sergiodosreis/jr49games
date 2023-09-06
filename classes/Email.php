<?php


class Email
{
	private $mailer;

	function __construct()
	{
		$this->mailer = new PHPMailer;

		$this->mailer->isSMTP();                                      // Set mailer to use SMTP
		$this->mailer->Host = 'gator4133.hostgator.com';  // Specify main and backup SMTP servers
		$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
		$this->mailer->Username = 'admin@jr49games.com';                 // SMTP username
		$this->mailer->Password = '*jr57tecn';                           // SMTP password
		$this->mailer->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$this->mailer->Port = 465;                                    // TCP port to connect to

		$this->mailer->setFrom('admin@jr49games.com','JR 49 GAMES');
		
		$this->mailer->isHTML(true);                                  // Set email format to HTML


		$this->mailer->CharSet = 'UTF-8';
		
	}

	public function addAdress($email, $nome){
		$this->mailer->addAddress($email, $nome);     // Add a recipient
	}
	

	public function FormatEmail($info)
	{
		$this->mailer->Subject = $info['subject'];
		$this->mailer->Body = $info['Body'];
		//$this->mailer->AltBody = strip_tags($info['email','game','version', 'message']);

	}

	public function SendEmail(){
		if($this->mailer->send()){
			return true;
		}else{
			return false;
		}
	}

}



?>