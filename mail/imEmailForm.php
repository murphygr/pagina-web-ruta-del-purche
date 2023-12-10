<?php
	$settings['imEmailForm_0_4'] = array(
		"owner_email_from" => "info@rutadelpurche.es",
		"owner_email_to" => "info@rutadelpurche.es",
		"customer_email_from" => "info@rutadelpurche.es",
		"customer_email_to" => "",
		"owner_message" => "Buenos días, solicito información sobre Ruta del Purche según las preferencias recogidas en el formulario.


Gracias.",
		"customer_message" => "Gracias por contactar con nosotros, en breve le informaremos de todo lo que nos ha solicitado en el formulario.

Saludos.",
		"owner_subject" => "Solicitud de información",
		"customer_subject" => "Solicitud de información recibida",
		"owner_csv" => False,
		"customer_csv" => False,
		"confirmation_page" => "../home.html"
	);

	if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
		include "../res/x5engine.php";

		$answers = array(
		);

		$form_data = array(
			array('label' => 'Nombre', 'value' => $_POST['imObjectForm_4_1']),
			array('label' => 'Apellidos', 'value' => $_POST['imObjectForm_4_2']),
			array('label' => 'Teléfono', 'value' => $_POST['imObjectForm_4_3']),
			array('label' => 'e-mail', 'value' => $_POST['imObjectForm_4_4']),
			array('label' => 'Dirección', 'value' => $_POST['imObjectForm_4_5']),
			array('label' => 'Población', 'value' => $_POST['imObjectForm_4_6']),
			array('label' => 'Provincia', 'value' => $_POST['imObjectForm_4_7']),
			array('label' => 'País', 'value' => $_POST['imObjectForm_4_8']),
			array('label' => 'Interesado en:', 'value' => $_POST['imObjectForm_4_9']),
			array('label' => 'Reservar', 'value' => $_POST['imObjectForm_4_10']),
			array('label' => 'CONDICIONES', 'value' => $_POST['imObjectForm_4_11'])
		);

		$files_data = array(
		);

		if(@$_POST['action'] != "check_answer") {
			if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != "jsactive")
				die(imPrintJsError());
			if(isset($_POST['imSpProt']) && $_POST['imSpProt'] != "")
				die(imPrintJsError());
			$email = new imSendEmail();
			$email->sendFormEmail($settings['imEmailForm_0_4'], $form_data, $files_data);
			@header('Location: ' . $settings['imEmailForm_0_4']['confirmation_page']);
		} else {
			if(@$_POST['id'] == "" || @$_POST['answer'] == "" || strtolower(trim($answers[@$_POST['id']])) != strtolower(trim(@$_POST['answer'])))
				echo "0";
			else
				echo "1";
		}
	}

// End of file
