<?php
require_once("phpmailer/class.phpmailer.php");
	
	$mail_obj = new PHPMailer();
	
	$mail_obj->IsSMTP();  // telling the class to use SMTP
	$mail_obj->SMTPAuth = true;
	$mail_obj->Host = "smtpout.europe.secureserver.net";
	$mail_obj->Port = 80;
	$mail_obj->Username = "rca@chess-teacher.com";
	$mail_obj->Password = "harirca123";

	$mail_obj->SetFrom('noreply@chess-teacher.com', 'Chess Teacher');
	$mail_obj->Subject = "Remote Chess Acadmy";
	$mail_obj->MsgHTML($message);
	$mail_obj->AddAddress($email, $name);

	if($mail_obj->Send()) {
		return true;	
	} else {
		return false;
	}
	

?>