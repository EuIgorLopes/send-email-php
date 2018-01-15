<?php
	class Email{
		public function Send_Email(
			String $name = "", 
			String $email_from = "", 
			String $subject = "", 
			String $text = ""
		){
			$name = stripslashes(trim($name));
			$email_from = stripslashes(trim($email_from));
			$subject = trim($subject);
			$text = str_replace("\r\n", "</p><p>", addslashes(trim($text)));
			//this replace is necessary for continue paragrafy created in simple textarea

			$message="
			<html>
				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<title>". $subject ."</title>
				</head>
				<body>
					<p>". $text ."</p>
					<p>Sent by: ". $name .".</p>
				</body>
			</html>";
			
			$sender  = "MIME-Version: 1.0"."\n";
			$sender .= "Content-type: text/html; charset=utf-8"."\n";
			$sender .= "From: ". $email_from;
			
			$email_to="contact@site.com";
			
			mail($email_to, $subject, $message, $sender);
		}
	}