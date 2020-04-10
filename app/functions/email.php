<?php

//esta seria uma forma tradicional somente pelo php para enviar email
//porém não tem tratamento e provavelmente cairia em spam

// function send($data) {
// 	$to = 'sandro@schoninger.com.br';
// 	$subject = $data->subject;
// 	$message = $data->message;
// 	$headers = "From: {$data->email}" . "\r\n" .
// 	'Reply-To: contato@schoninger.com.br' . "\r\n" .
// 	'X-Mailer: PHP/' . phpversion();

// 	return mail($to, $subject, $message, $headers);
// }

// abaixo o tratamento feito pelo phpmailer/ além disso tem a dica de teste para usar este site abaixo
// o mailtrap.io cadastra-se  para ver se teu formulario esta funcionado corretamente

function send(array $data) {
	$email = new PHPMailer\PHPMailer\PHPMailer;
	$email->CharSet = 'UTF-8';
	$email->SMTPSecure = 'plain';//ssl
	$email->isSMTP();
	$email->Host = 'mail.schoninger.com.br';
	$email->Port = 587;
	$email->SMTPAuth = true;
	$email->Username = 'sandro@schoninger.com.br';
	$email->Password = 'Falcon40#';
	$email->isHTML(true);
	$email->setFrom('sandro@schoninger.com.br');
	$email->FromName = $data['quem'];
	$email->addAddress($data['para']);
	$email->Body = $data['mensagem'];
	$email->Subject = $data['assunto'];
	$email->AltBody = 'Para ver esse email tenha certeza de estar vendo em um programa que aceita ver HTML';
	$email->MsgHTML($data['mensagem']);

	return $email->send();

	//o metodo abaixo é para mostrar o erro 
	//ver na classe phpmailer
	//echo $email->ErrorInfo;
}

?>