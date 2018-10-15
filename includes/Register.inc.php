<?php
	include_once 'Connection.inc.php';
	/**
	 * 
	 */
	class Register
	{
		
		public static function logIn($username, $password)
		{
			# code...
			Connection::openConnection();
			$con = Connection::getConnection();
			if (isset($con)) {
				# code...
				$st = $con->prepare('SELECT * FROM employe WHERE name = :name AND password = :pass');
				$st->bindParam(':name',$username);
				$st->bindParam(':pass',$password);
				$st->execute();

				$rs = $st->fetch();

				if ($rs!=null) {
					# code...
					return $rs;
				}else{
					return false;
				}
			}
			Connection::close();
		}

		public static function registerNewUser($username, $password,$email){
			Connection::openConnection();
			$con = Connection::getConnection();
			if (isset($con)) {
				# code...
				$st = $con->prepare('INSERT INTO employe(name,password,email) VALUES(:name, :password, :email)');
				$st->bindParam(':name',$username);
				$hash = password_hash($password,PASSWORD_BCRYPT);
				$st->bindParam(':password',$password);
				$st->bindParam(':email',$email);

				if ($st->execute()) {
					# code...
					return true;
				}else{
					return false;
				}
			}
			Connection::close();
		}
	}

 ?>
