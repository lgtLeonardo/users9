<?php
include_once '../includes/Register.inc.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	# code...
	if (isset($_POST['username']) && isset($_POST['password'])) {
		# code...
		$user = Register::logIn($_POST['username'], $_POST['password']);
		if (!$user) {
			# code...
			$response['error'] = true;
			$response['message'] = "nombre de usuario o clave inexistentes";

		}else{
			$response['error'] = false;
			$response['id'] = $user['id'];
			$response['name'] = $user['name'];
			$response['password'] = $user['password'];
			$response['email'] = $user['email'];
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