<?php
include_once '../includes/Register.inc.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	# code...
	if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
		# code...

		if (Register::registerNewUser($_POST['username'], 
										$_POST['password'], 
											$_POST['email'])) {
			# code...
			$response['error'] = false;
			$response['message'] = "Registro realizado";

		}else{
			$response['error'] = true;
			$response['message'] = "Registro realizado";
		}

	}else{
		$response['error'] = true;
		$response['message'] = "Falta completar alguno de los campos requeridos";
	}

}else{
	$response['error'] = true;
	$response['message'] = "Consulta invalida";
}

echo json_encode($response);